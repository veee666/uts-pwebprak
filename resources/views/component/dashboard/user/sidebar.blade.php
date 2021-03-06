<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color:mediumpurple">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('dashboard-user',Auth::user()->id) }}" style="color: #fafafa">
            <span data-feather="home"></span>
            Profile
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('edit-profile',Auth::user()->id) }}" style="color: #fafafa">
            <span data-feather="file"></span>
            Edit Profile
          </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('landing') }}" style="color: #fafafa">
                <span data-feather="file"></span>
                Back to Landing
            </a>
        </li>
    </ul>
    </div>
</nav>