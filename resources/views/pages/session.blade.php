@extends('layouts.master')

@section('content')
<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="/session">Sessions</a>
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
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="/logout">Log out</a>
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
      <!-- sessions card -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info</i>
                  </div>
                  <h4 class="card-title">Asset Usage</h4>
                </div>
            <div class="card-body ">
            <!-- Display the sessions from the database -->
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <div class="material-datatables">

              <table id="datatables01" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                  <td>User</td>
                  <td>Asset</td>
                  <td>SessionStart</td>
                  <td>SessionStop</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($sessions as $session)
                <tr>
                <td>{{$session->userId}}</td>
                <td>{{$session->assetid}}</td>
                <td>{{$session->sessionStart}}</td>
                <td>{{$session->sessionStart}}</td>
                <td>{{$session->sessionStop}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                  <td>User</td>
                  <td>Asset</td>
                  <td>SessionStart</td>
                  <td>SessionStop</td>
                </tr>
                </tfoot>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
         </div>
        </div>
    </div>
  </div>
</div>
@endsection