@extends('layouts.backend.my')
@section('content')
<style>
        .button-lgn {
            color:white;
            background-color: #164863;
            border-radius:8px;
            border: none;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
        }

        .button-lgn:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
            color: #FFFFFF;
        }
</style>
<!-- content start -->
    <div class="container-fluid p-0 home-content">
        <!-- banner start -->
        <div class="subpage-slide-blue">
            <div class="container">
                <h1>Subscription Status</h1>
            </div>
        </div>
        <!-- banner end -->

         <!-- breadcrumb start -->
            <div class="breadcrumb-container">
                <div class="container">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Class Status</li>
                  </ol>
                </div>
            </div>
        
        <!-- breadcrumb end -->
        
        
        <article class="container not-found-block">
            <div class="row">
               <div class="col-12 not-found-col">
                    @if($status == "success")
                        <span><i class="fas fa-thumbs-up"></i></span>
                        <h6 class="my-3">you have successfully taken this class  @if($transId !=0){{ ' and your class id is '.$transId }} @endif</h6>
                        <button>
                            <a href="{{ route('course.learn', $course->course_slug) }}" class="button-lgn mt-3">Go to course learn page</a>
                        </button>
                    @else
                        <span><i class="fas fa-thumbs-down"></i></span>
                        <h6 class="my-3">Sorry! Your transaction was failed...</h6>
                        <a href="{{ route('course.view', $course->course_slug) }}" class="btn btn-ulearn-cview mt-3">Return to course</a>
                    @endif
               </div>
            </div>
        </article>
        
        
    <!-- content end -->
@endsection
