<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Murid extends Model
{
    protected $table = 'course_taken';
    protected $guarded = array();

    
    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'user_id', 'id');
    }

    public static function metrics($student_id)
    {
        // $metrics = array();
        // $metrics['courses'] = \DB::table('course_taken')->where('user_id', $student_id)->count();
        // $metrics['lectures'] = \DB::table('course_taken')
        //                         ->where('course_taken.user_id', $student_id)
        //                         ->leftJoin('curriculum_sections', 'curriculum_sections.course_id', '=', 'courses.id')                       
        //                         ->leftJoin('curriculum_lectures_quiz', 'curriculum_lectures_quiz.section_id', '=', 'curriculum_sections.section_id')
        //                         ->count();
        // $metrics['taken'] = \DB::table('course_taken')
        //                         ->where('course_taken.user_id', $student_id)
        //                         ->leftJoin('course_taken', 'course_taken.id', '=', 'courses.id')                       
        //                         ->count();
    }

    public static function admin_metrics()
    {
        $metrics = array();
        $metrics['courses'] = \DB::table('courses')->count();
        $metrics['students'] = \DB::table('users')
                                ->where('roles.name', 'student')
                                ->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
                                ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')                       
                                ->count();
        $metrics['instructors'] = \DB::table('users')
                                ->where('roles.name', 'instructor')
                                ->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
                                ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')                       
                                ->count();
        return $metrics;
    }
}
