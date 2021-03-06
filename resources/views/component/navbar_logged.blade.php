<link rel="stylesheet" href="/asset/navbar.css">
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo"><img src="/asset/img/logo black.svg" alt="logo"></label>
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/about">About us</a></li>
      <li><a href="/service">Services</a></li>
      <li><a href="#">Contact US</a></li>
      <li><a href="#"> 
        <div class="dropdown">
          <button onclick="myFunction()" class="btn-primary">
            @if(! $username==0)
            Hello {!! $username !!}!
            @endif
          </button>
          <div id="myDropdown" class="dropdown-content">
            @if(Auth::user()->admin == true)
            <a href="{{ route('dashboard-admin') }}">Dashboard</a>
            @else
            <a href="{{ route('dashboard-user',Auth::user()->id) }}">Profile</a>
            @endif
            <a href="{{ route('auth.logout') }}">Log Out</a>
          </div>
        </div>
      </a></li>
    </ul>
</nav>

