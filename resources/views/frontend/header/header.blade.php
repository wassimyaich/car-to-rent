  {{-- //////////////////////// --}}
  <script src="frontend/searchcss/js/modernizr.js"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/searchcss/css/vendor.css')}}">
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<!--Bootstrap ================================================== -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">


{{-- <link rel="stylesheet" type="text/css" href="{{asset('frontend/searchcss/style.css')}}"> --}}


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&family=Raleway:wght@400;700&display=swap"
   rel="stylesheet">

  {{-- //////////////////////////// --}}
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style="margin-top: -0.4cm;">
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
{{-- start login   --}}
@auth
<div class="dropdown">
  <button class="btn btn-outline-primary nav-button mx-3 dropdown-toggle" type="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
      {{ Auth::user()->name }}
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <li>
          <a class="dropdown-item" href="#" 
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
          </a>
      </li>
  </ul>
</div>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
  @csrf
</form>
@endauth

@guest
<div class="d-flex mt-5 mt-lg-0 ps-xl-5 align-items-center justify-content-center ">
  <ul class="navbar-nav justify-content-end align-items-center">
      <li class="nav-item">
          <a class="nav-link px-3" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Login </a>
      </li>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                          aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="tabs-listing">
                          <nav>
                              <div class="nav nav-tabs d-flex justify-content-center border-0"
                                  id="nav-tab" role="tablist">
                                  <button
                                      class="btn btn-outline-primary text-uppercase me-3 active"
                                      id="nav-sign-in-tab" data-bs-toggle="tab"
                                      data-bs-target="#nav-sign-in" type="button" role="tab"
                                      aria-controls="nav-sign-in" aria-selected="true">Log
                                      In</button>
                                  <button class="btn btn-outline-primary text-uppercase"
                                      id="nav-register-tab" data-bs-toggle="tab"
                                      data-bs-target="#nav-register" type="button" role="tab"
                                      aria-controls="nav-register" aria-selected="false">Sign
                                      Up</button>
                              </div>
                          </nav>
                          <div class="tab-content" id="nav-tabContent">
                              <div class="tab-pane fade active show" id="nav-sign-in"
                                  role="tabpanel" aria-labelledby="nav-sign-in-tab">
                                  <form id="form1" class="form-group flex-wrap p-3 "action="{{ route('postlogin') }}" method="POST">
                                    @csrf
                                      <div class="form-input col-lg-12 my-4">
                                          <label for="exampleInputEmail1"
                                              class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                              Address</label>
                                          <input type="text" id="exampleInputEmail1" name="email"
                                              placeholder="Email" class="form-control ps-3">
                                      </div>
                                      <div class="form-input col-lg-12 my-4">
                                          <label for="inputPassword1"
                                              class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                          <input type="password" id="inputPassword1" name="password"
                                              placeholder="Password" class="form-control ps-3"
                                              aria-describedby="passwordHelpBlock">
                                          <div id="passwordHelpBlock"
                                              class="form-text text-center">
                                              <a href="#" class=" password">Forgot Password ?</a>
                                          </div>

                                      </div>
                                      <label class="py-3">
                                          <input type="checkbox" required="" class="d-inline">
                                          <span class="label-body text-black">Remember Me</span>
                                      </label>
                                      <div class="d-grid my-3">
                                          <button
                                              class="btn btn-primary btn-lg btn-dark text-uppercase btn-rounded-none fs-6">Log
                                              In</button>
                                      </div>
                                  </form>
                              </div>
                              <div class="tab-pane fade" id="nav-register" role="tabpanel"
                                  aria-labelledby="nav-register-tab">
                                  <form id="form2" class="form-group flex-wrap p-3 "action="{{ route('postregister') }}" method="POST">
                                    @csrf
                                    <div class="form-input col-lg-12 my-4">
                                      <label for="name"
                                          class="form-label fs-6 text-uppercase fw-bold text-black">Name
                                          </label>
                                      <input type="text" id="name" name="name"
                                          placeholder="Name" class="form-control ps-3">
                                  </div>
                                      <div class="form-input col-lg-12 my-4">
                                          <label for="exampleInputEmail2"
                                              class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                              Address</label>
                                          <input type="text" id="exampleInputEmail2" name="email"
                                              placeholder="Email" class="form-control ps-3">
                                      </div>
                                      <div class="form-input col-lg-12 my-4">
                                          <label for="inputPassword2"
                                              class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                          <input type="password" id="inputPassword2"
                                              placeholder="Password" class="form-control ps-3"
                                              aria-describedby="passwordHelpBlock">
                                      </div>
                                      <label class="py-3">
                                          <input type="checkbox" required="" class="d-inline">
                                          <span class="label-body text-black">I agree to the <a
                                                  href="#"
                                                  class="text-black password border-bottom">Privacy
                                                  Policy</a>
                                          </span>
                                      </label>
                                      <div class="d-grid my-3">
                                          <button
                                              class="btn btn-primary btn-lg btn-dark text-uppercase btn-rounded-none fs-6">Sign
                                              Up</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </ul>
  <button type="button" class="btn btn-outline-primary nav-button mx-3" data-bs-toggle="modal"
      data-bs-target="#exampleModal2"> Sign in </button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                      aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="tabs-listing">
                      <nav>
                          <div class="nav nav-tabs d-flex justify-content-center border-0"
                              id="nav-tab2" role="tablist">
                              <button class="btn btn-outline-primary text-uppercase me-4 "
                                  id="nav-sign-in-tab2" data-bs-toggle="tab"
                                  data-bs-target="#nav-sign-in2" type="button" role="tab"
                                  aria-controls="nav-sign-in2" aria-selected="false">Log
                                  In</button>
                              <button class="btn btn-outline-primary text-uppercase active"
                                  id="nav-register-tab2" data-bs-toggle="tab"
                                  data-bs-target="#nav-register2" type="button" role="tab"
                                  aria-controls="nav-register2" aria-selected="true">Sign
                                  Up</button>
                          </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent1">
                          <div class="tab-pane fade " id="nav-sign-in2" role="tabpanel"
                              aria-labelledby="nav-sign-in-tab2">
                              <form id="form3" class="form-group flex-wrap p-3 "action="{{ route('postlogin') }}" method="POST">
                                @csrf
                                  <div class="form-input col-lg-12 my-4">
                                      <label for="exampleInputEmail3"
                                          class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                          Address</label>
                                      <input type="text" id="exampleInputEmail3" name="email"
                                          placeholder="Email" class="form-control ps-3">
                                  </div>
                                  <div class="form-input col-lg-12 my-4">
                                      <label for="inputPassword3"
                                          class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                      <input type="password" id="inputPassword3" name="password"
                                          placeholder="Password" class="form-control ps-3"
                                          aria-describedby="passwordHelpBlock">
                                      <div id="passwordHelpBlock2" class="form-text text-center">
                                          <a href="#" class=" password">Forgot Password ?</a>
                                      </div>

                                  </div>
                                  <label class="py-3">
                                      <input type="checkbox" required="" class="d-inline">
                                      <span class="label-body text-black">Remember Me</span>
                                  </label>
                                  <div class="d-grid my-3">
                                      <button
                                          class="btn btn-primary btn-lg btn-dark text-uppercase btn-rounded-none fs-6">Log
                                          In</button>
                                  </div>
                              </form>
                          </div>
                          <div class="tab-pane fade active show" id="nav-register2"
                              role="tabpanel" aria-labelledby="nav-register-tab2">
                              <form id="form4" class="form-group flex-wrap p-3 " action="{{ route('postregister') }}" method="POST">
                               @csrf
                                <div class="form-input col-lg-12 my-4">
                                  <label for="name"
                                      class="form-label fs-6 text-uppercase fw-bold text-black">Name
                                      </label>
                                  <input type="text" id="name" name="name"
                                      placeholder="Name" class="form-control ps-3">
                              </div>
                                  <div class="form-input col-lg-12 my-4">
                                      <label for="exampleInputEmail4"
                                          class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                          Address</label>
                                      <input type="text" id="exampleInputEmail4" name="email"
                                          placeholder="Email" class="form-control ps-3">
                                  </div>
                                  <div class="form-input col-lg-12 my-4">
                                      <label for="inputPassword4"
                                          class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                      <input type="password" id="inputPassword4" name="password"
                                          placeholder="Password" class="form-control ps-3"
                                          aria-describedby="passwordHelpBlock">
                                  </div>
                                  <label class="py-3">
                                      <input type="checkbox" required="" class="d-inline">
                                      <span class="label-body text-black">I agree to the <a
                                              href="#"
                                              class="text-black password border-bottom">Privacy
                                              Policy</a>
                                      </span>
                                  </label>
                                  <div class="d-grid my-3">
                                      <button
                                          class="btn btn-primary btn-lg btn-dark text-uppercase btn-rounded-none fs-6">Sign
                                          Up</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endguest
{{-- end login  --}}
    </div>
  </nav>

 <!-- script new ================================================== -->
 <script src="{{asset('frontend/searchcss/js/jquery-1.11.0.min.js')}}"></script>
 <script src="{{asset('frontend/searchcss/js/plugins.js')}}"></script>
 <script src="{{asset('frontend/searchcss/js/script.js')}}"></script>
 <script src="{{asset('frontend/searchcss/js/modernizr.js')}}"></script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
     crossorigin="anonymous"></script>
 <script
     src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>


<!-- END nav --> 
 {{-- <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
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
</nav> --}}
<!-- END nav -->

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
