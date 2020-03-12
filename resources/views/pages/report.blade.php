@extends('layouts.master')

@section('content')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="/report">Dashboard/Report</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>{{$id}}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="/logout">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
<div class="row">
    <div class="col-lg-6 col-md-12">
      <div class="card">
        <div class="card-header card-header-tabs card-header-rose">
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <span class="nav-tabs-title">Reports:</span>
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#assets" data-toggle="tab">
                    <i class="material-icons">info</i> Assets
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#sessions" data-toggle="tab">
                    <i class="material-icons">schedule</i> Sessions
                    <div class="ripple-container"></div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="assets">
                <h4>Assets Recorded</h4>
                <hr>
                <form action="{{url('report/assets')}}">                    
                    <div class="form-group">
                    <button type="submit" class="btn btn-fill btn-rose">GENERATE</button>
                    </div>
                  </form>
                
            </div>
            <div class="tab-pane" id="sessions">
              <h4>Asset Usage Report</h4>
                <hr>
                <form action="{{url('report/complete')}}">
                    <div class="form-group">
                    <label>From (date and time):</label>
                    <input type="datetime-local" name="from" required>
                    </div>

                    <div class="form-group">
                    <label>To (date and time):</label>
                    <input type="datetime-local" name="to" required>
                    </div>
                    
                    <div class="form-group">
                    <button type="submit" class="btn btn-fill btn-rose">GENERATE</button>
                    </div>
                </form>
                <hr>
                <h4>Incomplete Lab Sessions Report</h4>
                <hr>
                <div class="form-group">
                  <a href="{{url('report/incomplete')}}"><button type="submit" class="btn btn-fill btn-rose">GENERATE</button></a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection