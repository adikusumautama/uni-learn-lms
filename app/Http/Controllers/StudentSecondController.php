<?php

namespace App\Http\Controllers;

use URL;
use Crypt;
use Image;
use Session;
use SiteHelpers;
use App\Models\Role;
use App\Models\User;


use App\Models\Murid;
use App\Models\Course;
use App\Models\Credit;
use App\Models\Category;
use App\Models\Instructor;
use App\Models\CourseTaken;
use Illuminate\Http\Request;
use App\Mail\ContactInstructor;
use App\Models\WithdrawRequest;
use App\Models\InstructionLevel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudentSecondController extends Controller
{
    public function index(Request $request)
    {
        $paginate_count = 10;
        if($request->has('search')){
            $search = $request->input('search');
            $users = User::whereHas('RoleUser', function ($query) {
                                $query->where('role_id', '<>', 3);
                            })
                           ->where(function ($q) use ($search) {
                            $q->where('first_name', 'LIKE', '%' . $search . '%')
                               ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                               ->orWhere('email', 'LIKE', '%' . $search . '%');
                           })
                           ->paginate($paginate_count);
        }
        else {
            $users = User::whereHas('RoleUser', function ($query) {
                $query->where('role_id', '<>', 3);
            })->paginate($paginate_count);
        }
        
        return view('student.profile.profil', compact('users'));
    }

    public function getForm($user_id='', Request $request)
    {
        if($user_id) {
            $user = User::find($user_id);
        }else{
            $user = $this->getColumnTable('users');
        }
        return view('student.profile.form', compact('user'));
    }

    public function saveUser(Request $request)
    {
        // echo '<pre>';print_r($_POST);exit;
        $user_id = $request->input('user_id');

        //validation rules
        if ($user_id) {
            
            $validation_rules = [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'roles' => 'required'
            ];

        } else {
            
            $validation_rules = [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'roles' => 'required'
            ];

        }

        $validator = Validator::make($request->all(),$validation_rules);

        // Stop if validation fails
        if ($validator->fails()) {
            return $this->return_output('error', 'error', $validator, 'back', '422');
        }

        if ($user_id) {
            $user = User::find($user_id);
            // Detach all roles for the existing user to update new roles...
            $user->roles()->detach();
            $success_message = 'User updated successfully';
        } else {
            $user = new User();
            $success_message = 'User added successfully';
        }

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');

        $password = $request->input('password');
        if($password) {
            $user->password = bcrypt($password);
        }
        

        $user->is_active = $request->input('is_active');
        $user->save();

        if($request->exists('roles')) {
            $roles = $request->input('roles');
            foreach ($roles as $role_name) {
                $role = Role::where('name', $role_name)->first();
                $user->roles()->attach($role);
            }

        }
        
        
        return $this->return_output('flash', 'success', $success_message, 'student/dashboard/profile', '200');
    }

    public function getData()
    {
        return DataTables::eloquent(User::query())
                            ->addColumn(
                                'user',
                                function (User $user) {
                                    return '<span class="badge badge-primary">Primary</span>';
                                }
                            )
        ->make(true);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function instructorList()
    {
        $paginate_count = 8;

        $instructors = DB::table('instructors')->groupBy('instructors.id')->paginate($paginate_count);
        return view('site.instructors', compact('instructors'));

    }

    public function instructorView($instructor_slug = '', Request $request)
    {
        $instructor = Instructor::where('instructor_slug', $instructor_slug)->first();
        $metrics = Murid::metrics($instructor->id);
        return view('student.dashboard.student_dashboard', compact('instructor', 'metrics'));
    }

    public function viewDashboard($course_slug = '', Request $request)
    {
        // INST
        $instructor_id = \Auth::user()->id;
        $coursesClass = DB::table('courses')
                        ->select('courses.*', 'categories.name as category_name')
                        ->leftJoin('categories', 'categories.id', '=', 'courses.category_id')
                        ->where('courses.instructor_id', $instructor_id)
                        ->paginate(5);
        $metrics = Instructor::metrics($instructor_id);
        
        // INST - Class
        $paginate_count = 9;
        $query = DB::table('courses')
                ->select('courses.*', 'instructors.first_name', 'instructors.last_name')
                ->selectRaw('AVG(course_ratings.rating) AS average_rating')
                ->leftJoin('course_ratings', 'course_ratings.course_id', '=', 'courses.id')
                ->join('instructors', 'instructors.id', '=', 'courses.instructor_id')
                ->where('courses.is_active',1)->count();
        // $coursesClassCount = $query->groupBy('courses.id')->paginate($paginate_count);
        // $coursesClassCount = $query->count();

        // STD
        $user_id = \Auth::user()->id;
        $courses = DB::table('courses')
                    ->select('courses.*', 'instructors.first_name', 'instructors.last_name')
                    ->join('instructors', 'instructors.id', '=', 'courses.instructor_id')
                    ->join('course_taken', 'course_taken.course_id', '=', 'courses.id')
                    ->where('course_taken.user_id',$user_id)->count();
        $coursesTaken = DB::table('courses')
                    ->select('courses.*', 'instructors.first_name', 'instructors.last_name')
                    ->join('instructors', 'instructors.id', '=', 'courses.instructor_id')
                    ->join('course_taken', 'course_taken.course_id', '=', 'courses.id')
                    ->where('course_taken.user_id',$user_id)->get();
        // ------------------------
        // ---------------------------------
        $paginate_count = 9;
        $categories = Category::where('is_active', 1)->get();
        $instruction_levels = InstructionLevel::get();

        $category_search = $request->input('category_id');
        $instruction_level_id = $request->input('instruction_level_id');
        $prices = $request->input('price_id');
        $sort_price = $request->input('sort_price');
        $keyword = $request->input('keyword');

        $kueri = DB::table('courses')
            ->select('courses.*', 'instructors.first_name', 'instructors.last_name')
            ->selectRaw('AVG(course_ratings.rating) AS average_rating')
            ->leftJoin('course_ratings', 'course_ratings.course_id', '=', 'courses.id')
            ->join('instructors', 'instructors.id', '=', 'courses.instructor_id')
            ->where('courses.is_active', 1);
        //filter categories as per user selected                
        if ($category_search) {
            $kueri->whereIn('courses.category_id', $category_search);
        }
        //filter courses as per keyword
        if ($keyword) {
            $kueri->where('courses.course_title', 'LIKE', '%' . $keyword . '%');
        }

        //filter instruction levels as per user selected                
        if ($instruction_level_id) {
            $kueri->whereIn('courses.instruction_level_id', $instruction_level_id);
        }

        //filter price as per user selected
        if ($prices) {
            $price_count = count($prices);
            $is_greater_500 = false;
            // echo $price_count;exit;
            foreach ($prices as $p => $price) {
                $p++;
                $price_split = explode('-', $price);

                if ($price_count == 1) {
                    $from = $price_split[0];
                    if ($price == 500) {
                        $is_greater_500 = true;
                    } else {
                        $to = $price_split[1];
                    }

                } elseif ($p == 1) {
                    $from = $price_split[0];
                } elseif ($p == $price_count) {

                    if ($price == 500) {
                        $is_greater_500 = true;
                    } else {
                        $to = $price_split[1];
                    }

                }

            }
            $kueri->where('courses.price', '>=', $from);
            if (!$is_greater_500) {
                $kueri->where('courses.price', '<=', $to);
            }
        }


        //filter categories as per user selected                
        if ($sort_price) {
            $kueri->orderBy('courses.price', $sort_price);
        }

        $kursus = $kueri->groupBy('courses.id')->paginate($paginate_count);
        return view('student.dashboard.student_dashboard', compact('courses', 'coursesTaken', 'coursesClass', 'metrics', 'query', 'kursus'));
    }



    public function contactInstructor(Request $request)
    {
        $instructor_email = $request->instructor_email;
        Mail::to($instructor_email)->send(new ContactInstructor($request));
        return $this->return_output('flash', 'success', 'Thanks for your message, will contact you shortly', 'back', '200');
    }
    public function becomeInstructor(Request $request)
    {
        if (!\Auth::check()) {
            return $this->return_output('flash', 'error', 'Please login to become an Instructor', 'back', '422');
        }

        $instructor = new Instructor();

        $instructor->user_id = \Auth::user()->id;
        $instructor->first_name = $request->input('first_name');
        $instructor->last_name = $request->input('last_name');
        $instructor->contact_email = $request->input('contact_email');

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');

        //create slug only while add
        $slug = $first_name . '-' . $last_name;
        $slug = str_slug($slug, '-');

        $results = DB::select(DB::raw("SELECT count(*) as total from instructors where instructor_slug REGEXP '^{$slug}(-[0-9]+)?$' "));

        $finalSlug = ($results['0']->total > 0) ? "{$slug}-{$results['0']->total}" : $slug;
        $instructor->instructor_slug = $finalSlug;

        $instructor->telephone = $request->input('telephone');
        $instructor->paypal_id = $request->input('paypal_id');
        $instructor->biography = $request->input('biography');
        $instructor->save();

        $user = User::find(\Auth::user()->id);

        $role = Role::where('name', 'instructor')->first();
        $user->roles()->attach($role);

        return redirect()->route('instructor.dashboard');
    }

    public function getProfile(Request $request)
    {
        $instructor = Instructor::where('user_id', \Auth::user()->id)->first();
        // echo '<pre>';print_r($instructor);exit;
        return view('instructor.profile', compact('instructor'));
    }

    public function saveProfile(Request $request)
    {
        // echo '<pre>';print_r($_FILES);exit;
        $validation_rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact_email' => 'required|string|email|max:255',
            'telephone' => 'required|string|max:255',
            // 'paypal_id' => 'required|string|email|max:255',
            'biography' => 'required',
        ];

        $validator = Validator::make($request->all(), $validation_rules);

        // Stop if validation fails
        if ($validator->fails()) {
            return $this->return_output('error', 'error', $validator, 'back', '422');
        }

        $instructor = Instructor::where('user_id', \Auth::user()->id)->first();
        $instructor->first_name = $request->input('first_name');
        $instructor->last_name = $request->input('last_name');
        $instructor->contact_email = $request->input('contact_email');

        $instructor->telephone = $request->input('telephone');
        $instructor->mobile = $request->input('mobile');

        $instructor->link_facebook = $request->input('link_facebook');
        $instructor->link_linkedin = $request->input('link_linkedin');
        $instructor->link_twitter = $request->input('link_twitter');
        // $instructor->link_googleplus = $request->input('link_googleplus');

        // $instructor->paypal_id = $request->input('paypal_id');
        $instructor->biography = $request->input('biography');


        if (Input::hasFile('course_image') && Input::has('course_image_base64')) {
            //delete old file
            $old_image = $request->input('old_course_image');
            if (Storage::exists($old_image)) {
                Storage::delete($old_image);
            }

            //get filename
            $file_name = $request->file('course_image')->getClientOriginalName();

            // returns Intervention\Image\Image
            $image_make = Image::make($request->input('course_image_base64'))->encode('jpg');

            // create path
            $path = "instructor/" . $instructor->id;

            //check if the file name is already exists
            $new_file_name = SiteHelpers::checkFileName($path, $file_name);

            //save the image using storage
            Storage::put($path . "/" . $new_file_name, $image_make->__toString(), 'public');

            $instructor->instructor_image = $path . "/" . $new_file_name;

        }

        $instructor->save();

        return $this->return_output('flash', 'success', 'Profile updated successfully', 'instructor-profile', '200');

    }

    public function credits(Request $request)
    {
        $credits = Credit::where('instructor_id', \Auth::user()->instructor->id)
            ->where('credits_for', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('instructor.credits', compact('credits'));
    }

    public function withdrawRequest(Request $request)
    {
        $withdraw_request = new WithdrawRequest();

        $withdraw_request->instructor_id = \Auth::user()->instructor->id;
        $withdraw_request->paypal_id = $request->input('paypal_id');
        $withdraw_request->amount = $request->input('amount');
        $withdraw_request->save();

        return $this->return_output('flash', 'success', 'Withdraw requested successfully', 'instructor-credits', '200');
    }

    public function listWithdrawRequests(Request $request)
    {
        $withdraw_requests = WithdrawRequest::where('instructor_id', \Auth::user()->instructor->id)
            ->paginate(10);

        return view('instructor.withdraw_requests', compact('withdraw_requests'));
    }
}
