@extends('../../layouts.template_dashbord_collapsed')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Heures supplémentaires</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <center>


    <section class="content" style="position:relative; top:100px;">
      <div class="container-fluid">

        <div class="row" >
          <!-- left column -->
          <div class="col-md-6" >
            <form method="POST" action="{{route('CalculheureMois')}}">
              @csrf
            <!-- general form elements disabled -->
            <div class="card card-dark">
              <div class="card-header col-md-5">
                <h3 class="card-title"> Par Mois </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <select class="form-control" name="month" id="">
                            <option value="1">Janvier</option>
                            <option value="2">Février</option>
                            <option value="3">Mars</option>
                            <option value="4">Avril</option>
                            <option value="5">Mai</option>
                            <option value="6">Juin</option >
                            <option value="7">Juillet</option>
                            <option value="8">Août</option>
                            <option value="9">Septembre</option>
                            <option value="10">Octobre</option>
                            <option value="11">Novembre</option>
                            <option value="12">Décembre</option>
                            </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">



                        <button class=" btn  btn-lg btn-dark form-control">Lister</button>
                      </div>
                    </div>
                  </div>

              </div>
            </div>
          </form>
          </div>

          <!--/.col (left) -->
          <!-- right column -->
           <!--    <div class="col-md-4">
         <form method="POST" action="">



            <div class="card card-secondary" >
              <div class="card-header col-md-6">
                <h3 class="card-title card-info"> Par Etablissememt</h3>
              </div>

              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">

                      <div class="form-group">

                        <select class="form-control" name="etablissement" id="">

                          <option value=""></option>

                      </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">

                        <button class=" btn  btn-lg btn-secondary form-control">  Lister </button>
                      </div>
                    </div>
                  </div>

                </form>
              </div>


            </div>

          </div>-->
          <div class="col-md-6">
            <form method="POST" action="{{route('CalculheureSecteur')}}">
              @csrf
            <!-- general form elements disabled -->
            <div class="card card-danger">
              <div class="card-header col-md-5">
                <h3 class="card-title card-info"> Par Année </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">

                        <select class="form-control" name="year" id="">
                          @foreach ($anne as $annes)
                          <option value="{{$annes->year}}">{{$annes->year}}</option>
                          @endforeach
                      </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">

                        <button class=" btn  btn-lg btn-danger form-control">  Lister </button>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
        </div>
      </div>
    </section>
  </center>
    <!-- Main content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
