@extends('layouts.master')

@section('content')
<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="/home">Dashboard</a>
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
      <!-- upload courses card -->
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info</i>
              </div>
              <h4 class="card-title">Add asset</h4>
            </div>
            <!-- Display notification messages here -->
            <div class="container" style="padding-top:10px;">
              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
              </div>
              @endif
            </div>

            <div class="card-body ">
              <form method="post" action="{{url('/asset/upload')}}" enctype="multipart/form-data">
              {{ csrf_field() }}

              <br>
              <div class="form-group">
                <label class="bmd-label-floating">Asset Name</label>
                  <input type="text" name="name" class="form-control" required>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">Serial Number</label>
                  <input type="text" name="serial" class="form-control" required>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">Description</label>
                  <input type="text" name="description" class="form-control" required>
              </div>                                                          
              <div class="card-footer ">
                <button type="submit" class="btn btn-fill btn-rose">Save</button>
              </div>
              </form>
            </div>

            <!-- Display the courses available in the database -->
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <div class="material-datatables">

              <table id="datatables01" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                  <td>Asset Name</td>
                  <td>Serial Number</td>
                  <td>Asset Description</td>
                  <td>Image url</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($assets as $asset)
                <tr>
                <td>{{$asset->assetName}}</td>
                <td>{{$asset->serialNumber}}</td>
                <td>{{$asset->description}}</td>
                <td>{{$asset->qrCode_url}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td>Asset Name</td>
                    <td>Serial Number</td>
                    <td>Asset Description</td>
                    <td>Image url</td>
                </tr>
                </tfoot>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
         </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info</i>
              </div>
              <h4 class="card-title">Asset</h4>
            </div>
            <!-- Display notification messages here -->
            <div class="container" style="padding-top:10px;">
              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
              </div>
              @endif
            </div>

            <!-- Display the courses available in the database -->
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <div class="material-datatables">

              <table id="datatables02" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                  <td>Asset Name</td>
                  <td>Serial Number</td>
                  <td>Asset Description</td>
                  <td class="disabled-sorting text-right">Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($assets as $asset)
                <tr>
                <td>{{$asset->assetName}}</td>
                <td>{{$asset->serialNumber}}</td>
                <td>{{$asset->description}}</td>              
                <td class="text-right">
                    <form method="post" action="" enctype="multipart/form-data" name="deleteForm">
                        {{ csrf_field() }}
                        <input type="submit"  class="btn btn-danger btn-sm" value="DELETE">
                      </form>
                </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td>Asset Name</td>
                    <td>Serial Number</td>
                    <td>Asset Description</td>
                    <td class="disabled-sorting text-right">Action</td>
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