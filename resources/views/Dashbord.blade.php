@extends('layouts.template_dashbord_acceuil')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Acceuil</h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>
<center>
            <section class="content">
                <div class="container-fluid">
                <!-- Info boxes -->

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3" style="position:relative; left:10%;">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-clock"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Total heure mois en cour </span>
                        <span class="info-box-number">
                            {{$total_current_month}}
                            <small>heures</small>
                        </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3"  style="position:relative; left:45%;">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-clock"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">total heure année</span>
                        <span class="info-box-number">
                            {{$total_current_year}}
                            <small>heures</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->


                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <center>
                    <div class="container">
                                <div class="row">


                    <form method="POST" action="{{route('Dashbord')}}" style="position:relative; left:40%;bottom:100px;">
                        @csrf
                    <!-- general form elements disabled -->
                    <div class="card card-success">
                        <div class="card-header col-md-12">
                        <h3 class="card-title card-info"> Courbe par établissement </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <form role="form">
                            <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">

                                <select class="form-control" name="mois" id="">
                                    <option value="Dakar1">Dakar 1</option>
                                    <option value="Dakar2">Dakar 2</option>
                                    <option value="Hann">Centre Hann</option>
                                    <option value="Diourbel">Diourbel</option>
                                    <option value="Kaolack">Kaolack</option>
                                    <option value="Louga">Louga</option>
                                    <option value="Petite_Cote">Petite Cote</option>
                                    <option value="Rufisque">Rufisque</option>
                                    <option value="Saint_Louis">Saint Louis</option>
                                    <option value="Thies"> Thies</option>
                                    <option value="Tambacounda">Tambacounda</option>
                                    <option value="Ziguinchor"></option>
                                </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                <button class=" btn  btn-lg btn-success form-control"> Generer </button>
                                </div>
                            </div>
                            </div>

                        </form>
                        </div></div>

                    </center>
                    </div>
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <button class=" btn btn-lg btn-danger">Heures supplémentaires par établissements et par taux</button>

                            </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table ">
                                <thead>
                                <tr>
                                    <th>Affectation</th>
                                    <th>Taux à 15%</th>
                                    <th>Taux à 40%</th>
                                    <th>Taux à 60%</th>
                                    <th>Taux à 100%</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($data as  $datass)


                                        <tr>
                                                <td>{{$datass->Affectations}}</td>
                                                <td>{{$datass->sum15}}</td>
                                                <td>{{$datass->sum40}}</td>
                                                <td>{{$datass->sum60}}</td>
                                                <td>{{$datass->sum100}}</td>
                                                <td><button class=" btn btn-lg btn-danger">{{$datass->total}}</button></td>
                                        </tr>

                                @endforeach

                                </tbody>

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
                    </div>

                    @if ($mois)

                        <section class="content" >



                            <div class="row" style="background-color:white">
                            <div class="col-8">

                                    <div class="card-body py-3 px-3">
                                        {!! $usersChart->container() !!}
                                    </div>

                            </div>


                            <div class="col-4">

                                    <div class="card-body py-3 px-3">
                                        {!!$usersChartband->container() !!}
                                    </div>
                                </div>
                            </div>



                        <div class="row" style="background-color:white">
                            <div class="col-8">

                                    <div class="card-body py-3 px-3">
                                        {!! $usersChartMois->container() !!}
                                    </div>

                            </div>


                            <div class="col-4">

                                    <div class="card-body py-3 px-3">
                                        {!!$usersChartbandetablissement->container() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                            </section>

                                @else
                                <section class="content" >



                                    <div class="row" style="background-color:white">
                                        <div class="col-8">

                                                <div class="card-body py-3 px-3">
                                                    {!! $usersChart->container() !!}
                                                </div>

                                        </div>


                                        <div class="col-4">

                                                <div class="card-body py-3 px-3">
                                                    {!!$usersChartband->container() !!}
                                                </div>
                                            </div></div>

                                    </div>

                                </div>

                            </section>
@endif
                  @endsection
