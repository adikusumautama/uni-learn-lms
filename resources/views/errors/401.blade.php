@extends('layouts.frontend.index')
@section('content')
<style>
    .button-x {
  --color: #0077ff;
  background-color:#52D3D8;
  font-family: inherit;
  display: inline-block;
  width: 8em;
  height: 2.6em;
  line-height: 2.5em;
  overflow: hidden;
  margin: 20px;
  font-size: 17px;
  z-index: 1;
  color: var(--color);
  border: 2px solid white;
  border-radius: 6px;
  position: relative;
}

.button-x::before {
  position: absolute;
  content: "";
  background: var(--color);
  width: 200px;
  height: 200px;
  z-index: -1;
  border-radius: 50%;
}

.button-x:hover {
  color:#fff;
}

.button-x:before {
  top: 100%;
  left: 100%;
  transition: .3s all;
}

.button-x:hover::before {
  top: -30px;
  left: -30px;
}
</style>
<!-- content start -->
    <div class="container-fluid p-0 home-content">
        <!-- banner start -->
        <div class="subpage-slide-blue">
            <div class="container">
                <h1>401 Error</h1>
            </div>
        </div>
        <!-- banner end -->

         <!-- breadcrumb start -->
            <div class="breadcrumb-container">
                <div class="container">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">401 Error</li>
                  </ol>
                </div>
            </div>
        
        <!-- breadcrumb end -->
        
        
        <article class="container not-found-block">
            <div class="row">
               <div class="col-12 not-found-col">
                    <span><b>4<span style="color:#0077ff;">0</span>1</b></span>
                    <h3>Sorry! You are not allowed to access this page</h3>
                    <button class="button-x">
                        <a href="{{ route('home') }}" style="color:#EEF5FF">Go to ulearn homepage</a>
                    </button>
               </div>
            </div>
        </article>
    </div>    
        
    <!-- content end -->
@endsection