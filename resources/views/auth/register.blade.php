@include('layouts.header')

<body class="off-canvas-sidebar">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
        <div class="container">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="/">Login</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a href="/register" class="nav-link">
                  <i class="material-icons">person_add</i> Register
                </a>
              </li>
              <li class="nav-item">
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
                        <form class="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
            
                          <div class="card card-login card-hidden">
                            <div class="card-header card-header-rose text-center">
                              <h4 class="card-title">Registration Form</h4>
                            </div><br>
                            <div class="card-body ">
                              <span class="bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="material-icons">face</i>
                                    </span>
                                  </div>
                                  <input type="text" name="id" class="form-control" placeholder="Employee id..." required>
                                </div>
                              </span><br>
                              <span class="bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="material-icons">account_circle</i>
                                    </span>
                                  </div>
                                  <input type="text" name="fname" class="form-control" placeholder="First Name..." required>
                                </div>
                              </span><br>
                              <span class="bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="material-icons">face</i>
                                    </span>
                                  </div>
                                  <input type="text" name="surname" class="form-control" placeholder="Surname..." required>
                                </div>
                              </span><br>
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
                                      <i class="material-icons">phone</i>
                                    </span>
                                  </div>
                                  <input type="text" name="phoneNumber" class="form-control" placeholder="Phone Number..." required>
                                </div>
                              </span><br>
                              <span class="bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="material-icons">computer</i>
                                    </span>
                                  </div>
                                  <select class="" name="lab" id="">
                                    <option value="" disabled selected>Select Computer lab</option>
                                    <option value="1">Computer Lab 1</option>
                                    <option value="2">Computer Lab 2</option>
                                    <option value="3">Computer Lab 3</option>
                                    <option value="4">Computer Lab 4</option>
                                    <option value="5">Computer Lab 5</option>
                                  </select>
                                </div>
                              </span><br>
                            </div>
                            <div class="card-footer justify-content-center">
                                <div class="card-footer ">
                                 <button type="submit" class="btn btn-fill btn-rose">Register</button>
                                </div>
                            </div>
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
    </body>
</html>