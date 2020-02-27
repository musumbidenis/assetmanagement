
@include('layouts.header')

<body class="off-canvas-sidebar">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="/">Login Page</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a href="/register" class="nav-link">
              <i class="material-icons">person_add</i> Register
            </a>
          </li>
          <li class="nav-item  active ">
            <a href="/" class="nav-link">
              <i class="material-icons">fingerprint</i> Login
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('../../assets/img/form.jpeg')">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form class="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

              <div class="card card-login">
                <div class="card-header card-header-rose text-center">
                  <h4 class="card-title">Login Form</h4>
                </div><br>
                <div class="card-body ">
                  @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
                </div>
                  @endif
                  @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
                </div>
                  @endif
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">email</i>
                        </span>
                      </div>
                      <input type="email" name="email" class="form-control" placeholder="Email..." required>
                    </div>
                  </span><br>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input type="text" name="id" class="form-control" placeholder="Employee id..." required>
                    </div>
                  </span>
                </div>
                <div class="card-footer justify-content-center">
                    <div class="card-footer ">
                     <button type="submit" class="btn btn-fill btn-rose">Login</button>
                    </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>