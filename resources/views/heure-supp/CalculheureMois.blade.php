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
                <h3 class="card-title">
                  <button class=" btn btn-lg btn-danger">Heures supplémentaires</button>

                </h3>

                <a class=" btn btn-lg btn-success"  style="position:relative; left:100px;"  href="{{route('exportheure')}}">

                    <i class="fas fa-file-excel"></i>
                </a>


                    <form method="POST"  action="{{route('PrintCalculheureMois')}}">
                    @csrf
                    <input type="hidden" name="month" value="{{$mois}}">
                    <button  style="position:relative; left:400px;bottom:47px;" class=" btn btn-lg btn-dark ">

                        <i class="fa fa-print" aria-hidden="true"></i>
                    </button>
                    </form>


              </div>
              <!-- /.card-header -->
              <div class="card-body">

                @include('Calculheuremoistable',$data )


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
