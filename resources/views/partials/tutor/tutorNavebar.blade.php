<!-- Navbar --> -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>
  <!-- SEARCH FORM -->
  
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link"  href="http://localhost:8000/chat">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">{{Auth::user()->messages1->where('is_read', '=', false)->count() }}</span>
      </a>
    </li>
    
    
  
    <!-- Friend Request Dropdown menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user-friends"></i>
        <span class="badge badge-warning navbar-badge">
          
        {{Auth::user()->friends1->where('approved', '=', false)->count() }}
        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item dropdown-Header bg-info pt-3, pb-3">Enrollment Requests</a>
        
        
        <!-- Message Start -->
          @foreach (Auth::user()->friends1->where('approved', '=', false) as $friend1)
        <div class="dropdown-item">
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
              <div class="media">
                <img src="/images/avatar/{{ $friend1->user1->avatar }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              </div>
              <div class="media-body">
                <h6 class="mb-0 ">{{$friend1->user1->name}}</h6>
                <p class="mb-0"></p>
              </div>
            </div>
            <span class="mx-3">
              <a href="{{url('accept-request',$friend1->user1->id)}}" class="pr-2 btn btn-success rounded" data-userid="{{$friend1->user1->id}}">Confirm</a>
              <a href="{{url('delete-request',$friend1->user1->id)}}" class="pr-2 btn btn-danger rounded">Delete</a>
            </span>
          </div>
        </div>
        <div class="dropdown-divider"></div>
        <!-- Message End -->
         @endforeach

         @if(Auth::user()->friends1->where('approved', '=', false)->count() ==0)

         <h5 class="text-center pt-2 pb-2">You don't have any request</h5>
         @endif


        <div class="dropdown-divider"></div>
        <a href="student-request" class="dropdown-item dropdown-footer">View More</a>
      </div>
    </li>
   
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
    <li class="nav-item dropdown">
     


      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      <img src="/images/avatar/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:0px; left:0px; border-radius:50%">
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

       <a href="{{ url('tutor-profile') }}" class="dropdown-item "><i class="fa fa-btn fa-user pr-2"></i>Profile</a>
        <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt pr-2"></i>
          {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar