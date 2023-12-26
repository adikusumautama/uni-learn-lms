@extends('layouts.backend.my')
@section('content')
<style>
  .gradient-custom {
/* fallback for old browsers */
background: #f6d365;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
}
</style>
<div class="page-header">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('std.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Profile</li>
  </ol>
  <h1 class="page-title">Profile User</h1>
</div>

<div class="page-content">

<!-- <div class="panel"> -->
        
        <!-- <div class="panel-body">
          <table class="table table-hover table-striped w-full">
            <thead>
              <tr> -->
                <!-- <th>Sl.no</th> -->
                <!-- <th>First Name</th>
                <th>Last Name</th>
                <th>Email ID</th> -->
                <!-- <th>Roles</th> -->
                <!-- <th>Status</th> -->
                <!-- <th>Actions</th> -->
              <!-- </tr>
            </thead>
            <tbody>
              
              <tr> -->
                <!-- <td>{{ Auth::user()->id }}</td> -->
                <!-- <td>{{ Auth::user()->first_name }}</td>
                <td>{{ Auth::user()->last_name }}</td>
                <td>{{ Auth::user()->email }}</td> -->
               
              
                <!-- <td>
                  <a href="{{ url('student/user-form/'.Auth::user()->id) }}" class="btn btn-xs btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit">
                    <i class="icon wb-pencil" aria-hidden="true"></i>
                  </a>
                </td>
              </tr>
              
            </tbody>
          </table>
          
          <div class="float-right">
            {{ $users->appends(['search' => Request::input('search')])->links() }}
          </div> -->
          
          
        <!-- </div> -->
      <!-- </div> -->
      <section class="vh-70" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
              <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                  <div class="col-md-4 gradient-custom text-center text-white"
                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img src="/img/uni-learn.png" alt="Avatar" style="width: 130px;" />
                    <h5 style="margin-top:2px;">Student In <br> <b>Universe Learning</b></h5>
                    <a href="{{ url('student/user-form/'.Auth::user()->id) }}" data-toggle="tooltip"
                      data-original-title="Edit">
                      <i class="far fa-edit" style="color:black"></i>
                    </a>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body p-4">
                      <h6>Profile Info</h6>
                      <hr class="mt-0 mb-4">
                      <div class="row pt-1">
                        <div class="col-6 mb-3">
                          <h6>First Name :</h6>
                          <p class="text-muted">{{ Auth::user()->first_name }}</p>
                        </div>
                        <div class="col-6 mb-3">
                          <h6>Last Name :</h6>
                          <p class="text-muted">{{ Auth::user()->last_name }}</p>
                        </div>
                        <div class="col-6 mb-3">
                          <h6>Email :</h6>
                          <p class="text-muted">{{ Auth::user()->email }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Panel Basic -->
</div>

@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function()
    { 
        
    });
</script>
@endsection