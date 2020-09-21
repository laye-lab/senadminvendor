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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
          <button class=" btn btn-lg btn-danger">Heures supplémentaires</button>
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
