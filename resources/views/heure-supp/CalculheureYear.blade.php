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
    <section class="content" >
      <div class="container-fluid">
       
        <div class="row" >
          
          <!-- left column -->
          <div class="col-md-3" >
            <form method="POST" action="{{route('Calculheure')}}">
              @csrf
           
            <!-- general form elements disabled -->
            <div class="card card-dark" style="position:relative;left:25%">
              <div class="card-header col-md-5">
                <h3 class="card-title"> Par Année </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <select class="form-control" name="" id="">
                          @foreach ($anne as $annes)
                          <option value="{{$annes->year}}">{{$annes->year}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                  
                        <button class=" btn  btn-lg btn-dark form-control">Lister</button>
                      </div>
                    </div>
                  </div>
             
                </form>
              </div>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
         
            <!-- /.card -->

         
            <!-- Input addon -->
          
           
           
            <!-- /.card -->

          </div>
      
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-3">
            <form method="POST" action="{{route('CalculheureSecteur')}}">
              @csrf
           
            <!-- general form elements disabled -->
            <div class="card card-info" style="position:relative;left:100%">
              <div class="card-header col-md-5">
                <h3 class="card-title card-info"> Par secteur </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      
                        <select class="form-control" name="etablissement" id="">
                          @foreach ($etablissement as $etablissements)
                          <option value="{{$etablissements->nom}}">{{$etablissements->nom}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                      
                        <button class=" btn  btn-lg btn-info form-control">  Lister </button>
                      </div>
                    </div>
                  </div>
             
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </center>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Heures supplémentaires</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped table-responsive-md btn-table">

                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Mois</th>
                      <th>Nom agent</th>
                      <th>Matricule</th>
                      <th>Taux à 15%</th>
                      <th>Taux à 40%</th>
                      <th>Taux à 60%</th>
                      <th>Taux à 100%</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                 
                    @foreach ($data as  $datas)         
                         @if ($datas->month == $mois)
                             
                       
                                    </tr>
                                    <td>{{$datas->year}}</td>
                                    <td>{{$datas->month}}</td>
                                    <td>{{$datas->Nom}}</td>
                                    <td>{{$datas->agent}}</td>
                                    <td>{{$datas->sum15}}</td>
                                    <td>{{$datas->sum40}}</td>
                                    <td>{{$datas->sum60}}</td>
                                    <td>{{$datas->sum100}}</td>
                                    <td><button class=" btn btn-lg btn-danger">{{$datas->total}}</button></td>
                                    </tr>
                           @endif
                     @endforeach
                    
                                    
                        </tr>
                </table>
              </div>
              <!-- /.card-body 
            <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> -->
            </div>
          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
