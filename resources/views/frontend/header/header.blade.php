{{-- 
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Car<span>Book</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="about" class="nav-link">About</a></li>
          <li class="nav-item"><a href="services" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="pricing" class="nav-link">Pricing</a></li>
          <li class="nav-item"><a href="car.html" class="nav-link">Cars</a></li>
          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
<!-- END nav --> --}}
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.html">Car<span>Book</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
        <li class="nav-item"><a href="{{ url('/services') }}" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="{{ url('/pricing') }}" class="nav-link">Pricing</a></li>
        <li class="nav-item"><a href="{{ url('/car') }}" class="nav-link">Cars</a></li>
        <li class="nav-item"><a href="{{ url('/blog') }}" class="nav-link">Blog</a></li>
        <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>

        <!-- Authentication Links -->
        @guest
          <!-- Show login/register if the user is not authenticated -->
          <li class="nav-item"><a href="" class="nav-link">Login</a></li>
          @if (Route::has('register'))
              <li class="nav-item"><a href="" class="nav-link">Register</a></li>
          @endif
        @else
          <!-- Show username and logout if the user is authenticated -->
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href=""
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  Logout
              </a>

              <form id="logout-form" action="" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
<!-- END nav -->
