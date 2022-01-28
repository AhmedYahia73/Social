@yield('nav')
<nav class="navbar py-1 navbar-expand-lg navbar-dark bg-dark">
  <div class="container d-flex justify-content-between">
    <div class="mr-5">
      <i class="fab fa-forumbee text-primary"></i>
    <span class="navbar-brand  text-warning">Social</span>
  </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">
            <i class="mr-1 fas fa-home"></i>
             Home 
             <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/About1">
            <i class="fas mx-1 fa-info"></i>
            About
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Services1">
            <i class="fab mx-1 fa-servicestack"></i>
          Services
        </a>
        </li>
      </ul>
      <a class="btn btn-outline-success btn-log mx-2" href="/log">
      <i class="fas fa-sign-in-alt mx-1"></i>
      Sign In
      </a>
      <a class="btn btn-outline-success btn-reg" href="/reg">
        <i class="far mx-1 fa-clipboard"></i>
        Register
      </a>
    </div>
  </div>
  </nav>