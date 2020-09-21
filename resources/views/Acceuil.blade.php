



@extends('layouts.template_dashbord_acceuil')


@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Acceuil</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
    @foreach($role_account as $role)
                @if(Auth::user()->id == $role->Matricule_agent)
                        @if($role->Nom == 'n+3')
                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <!-- Small boxes (Stat box) -->

                                <div class="col-lg-5 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                    <div class="inner">
                                        <h5>Valider heure supplementaire</h5>

                                        <p></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>

                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-5 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h5>Saisir heure supplementaire</h5>

                                        <p></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>

                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h5>Consulter Agent</h5>

                                        <p>Unique Visitors</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                @break
                                <!-- ./col -->
                            @endif

                            @if($role->Nom === 'n+2')
                                <!-- Main content -->
                                <section class="content" style="position:relative;left:100px;">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-3" style="position:relative; left:10%;">
                                              <div class="info-box">
                                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-clock"></i></span>

                                                <div class="info-box-content">
                                                  <span class="info-box-text">Total heure <br> mois en cour </span>
                                                  <span class="info-box-number">
                                                    {{$total_current_month_dr}}
                                                    <small>heures</small>
                                                  </span>
                                                </div>
                                                <!-- /.info-box-content -->
                                              </div>
                                              <!-- /.info-box -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-12 col-sm-6 col-md-3"  style="position:relative; left:25%;">
                                              <div class="info-box mb-3">
                                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-clock"></i></span>

                                                <div class="info-box-content">
                                                  <span class="info-box-text">total heure année</span>
                                                  <span class="info-box-number">
                                                    {{$total_current_year_dr}}
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
                                        <!-- Small boxes (Stat box) -->
                                        <div class="row">
                                            <a href="{{route('homeCommandeindex')}}" class="small-box-footer">
                                            <div class="col-lg-5 col-9" style="position:relative;left:110px;" >
                                            <!-- small box -->
                                            <div>
                                                <img class="small-box container border border-success"  style="height:150px;width:300px; background-color:white;"  src="{{asset('../../dist/img/commandes.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>

                                        <a href="{{route('Validation')}}" class="small-box-footer">
                                            <div class="col-lg-5 col-6" style="position:relative;left:200px;">
                                            <!-- small box -->
                                            <div>
                                                <img class="small-box container border border-success"  style="height:150px;width:300px; background-color:white;"  src="{{asset('../../dist/img/valid.png')}}" alt="">
                                                </div>

                                            </div>

                                            <!-- ./col -->
                                        </a>
                                        </div>

                                        <a href="{{route('homeSaisie')}}" class="small-box-footer">
                                            <div class="col-lg-5 col-6" style="position:relative;left:230px;">
                                                <!-- small box -->
                                                <div>
                                                    <img class="small-box container border border-success"  style="height:150px;width:300px; background-color:white;"  src="{{asset('../../dist/img/saisir.png')}}" alt="">
                                                    </div>

                                                </div>

                                        </a>


                                            @break
                                            <!-- ./col -->
                                        @endif
                            @if($role->Nom === 'n+1')
                            <!-- Main content -->
                            <section class="content" style="position:relative;left:100px;">
                                <div class="container-fluid">
                                    <!-- Small boxes (Stat box) -->
                                    <div class="row">
                                        <a href="{{route('homeSaisie')}}" class="small-box-footer">
                                            <div class="col-lg-5 col-6" style="position:relative;left:100px;">
                                                <!-- small box -->
                                                <div>
                                                    <img class="small-box container border border-success"  style="height:150px;width:300px; background-color:white;"  src="{{asset('../../dist/img/saisir.png')}}" alt="">
                                                    </div>

                                                </div>

                                        </a>

                                    <a href="{{route('Validation')}}" class="small-box-footer">
                                        <div class="col-lg-5 col-6" style="position:relative;left:150px;">
                                        <!-- small box -->
                                        <div>
                                            <img class="small-box container border border-success"  style="height:150px;width:300px; background-color:white;"  src="{{asset('../../dist/img/valid.png')}}" alt="">
                                            </div>

                                        </div>

                                        <!-- ./col -->
                                    </a>
                                    </div>
                                        @break
                                        <!-- ./col -->
                                    @endif
                                        @if($role->Nom === 'dto')
                                        <!-- Main content -->
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


                                    <form method="POST" action="{{route('Acceuil')}}" style="position:relative; left:40%;bottom:100px;">
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
                                              <button class=" btn btn-lg btn-danger">Heures supplémentaires par affectation et par taux</button>

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




                                                    @break
                                                    @endif
                                                    @if($role->Nom === 'dcm')
                                                    <!-- Main content -->
                                                    <section class="content" style="position:relative;left:100px;">
                                                        <div class="container-fluid">
                                                            <!-- Small boxes (Stat box) -->
                                                            <div class="row">


                                                             <a href="{{route('Validation')}}" class="small-box-footer">
                                                                <div class="col-lg-5 col-6" style="position:relative;left:40px;">
                                                                <!-- small box -->
                                                                <div class="small-box bg-danger container border border-success" style="height:200px;width:350px;">
                                                                    <div class="inner" >
                                                                    <h5 class="nav-link">Valider heure supplementaire</h5></u>
                                                                     <p class="font-italic" style="color:lightred;">Choix collaborateur <br> validation heure </p>                                                 </div>
                                                                    <div class="icon">
                                                                    <i class="ion ion-stats-bars" style="zoom:2.0;"></i>
                                                                    </div>

                                                                </div>
                                                                </div>
                                                                <!-- ./col -->
                                                            </a>
                                                            <a href="">
                                                                <div class="col-lg-5 col-9 " style="position:relative;left:60px;">
                                                                <!-- small box -->
                                                                <div class="small-box bg-secondary container border border-success" style="height:200px;width:350px;">
                                                                    <div class="inner">
                                                                    <h5>Saisir heure supplementaire</h5>
                                                                        <p class="font-italic" style="color:lightblue;">
                                                                            choix collaborateur  <br> Saisie heure </p>
                                                                    <p></p>
                                                                    </div>
                                                                    <div class="icon">
                                                                    <i class="ion ion-person-add" style="zoom:2.0;"></i>
                                                                    </div>

                                                                </div>
                                                                </div>
                                                            </a>
                                                            <div class=" container" style="height:000px;width:300px;"></div>
                                                            <a href="">
                                                                <div class="col-lg-5 col-9" style="position:relative;top:40px;left:250px;">
                                                                    <div class="small-box bg-white container border border-success" style="height:200px;width:350px;">
                                                                        <div class="inner">
                                                                        <h5>Consulter Agent</h5>

                                                                        <p class="font-italic" style="color:lightdark;">Consultez les agents qui peuvent faire<br> des heures supplémentaires </p>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <i class="ion ion-pie-graph" style="zoom:2.0;" ></i>
                                                                    </div>

                                                                    </div>
                                                                </div>
                                                            </a>

                                                                @break
                                                                @endif
                                                                @if($role->Nom === 'drh')
                                                             <center>   <h2>Heures supplémentaires en cours de traitement</center>

                    <section class="content" style="position:relative;">
                        <div class="container-fluid">

                        <div class="row" >
                            <!-- left column -->

                            @foreach ($data_drh as  $datas)


                        @if ($datas->statut==3)
                        <div class="col-md-3" >
                        <form method="POST" action="{{route('CalculheureMois')}}">
                            @csrf
                        <!-- general form elements disabled -->
                        <div class="card card-dark">
                            <div class="card-header col-md-10">
                            <h3 class="card-title">{{$datas->Nom}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <form role="form">
                                <div class="row">
                                    <section class="content">
                                        <div class="container-fluid">

                                        <!-- Timelime example  -->
                                        <div class="row">
                                            <div class="col-md-12">
                                            <!-- The time line -->
                                            <div class="timeline">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                <span class="bg-red">{{$datas->agent}}</span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                <div>
                                                <i class="fas fa-envelope bg-blue"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                        validation centre   <a href="#" class="btn btn-sm bg-danger">X</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fas fa-user bg-green"></i>
                                                    <i class="nav-icon fas fa-check-double bg-grey"></i>
                                                    <div class="timeline-item">
                                                        <div class="timeline-body">
                                                    validation direction<a href="#" class="btn btn-sm bg-success">√</a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div>
                                                <i class="fas fa-user bg-green"></i>
                                                <i class="nav-icon fas fa-check-double bg-grey"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    validation secteur  <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>

                                                <i class="nav-icon far fa-calendar-check bg-green"" ></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    Saisie   <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                <i class="nav-icon fas fa-user-plus bg-yellow"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    Commande  <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline time label -->

                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        </div>
                                        <!-- /.timeline -->

                                    </section>
                                </div>

                            </div>

                        </div>
                        </form>
                        </div>
                        @endif
                        @if ($datas->statut==2)



                        <div class="col-md-3" >
                        <form method="POST" action="{{route('CalculheureMois')}}">
                            @csrf
                        <!-- general form elements disabled -->
                        <div class="card card-dark">
                            <div class="card-header col-md-10">
                            <h3 class="card-title">{{$datas->Nom}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <form role="form">
                                <div class="row">
                                    <section class="content">
                                        <div class="container-fluid">

                                        <!-- Timelime example  -->
                                        <div class="row">
                                            <div class="col-md-12">
                                            <!-- The time line -->
                                            <div class="timeline">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                <span class="bg-red">{{$datas->agent}}</span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                <div>
                                                <i class="fas fa-envelope bg-blue"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                        validation centre   <a href="#" class="btn btn-sm bg-danger">X</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fas fa-user bg-green"></i>
                                                    <i class="nav-icon fas fa-check-double bg-grey"></i>
                                                    <div class="timeline-item">
                                                        <div class="timeline-body">
                                                    validation direction <a href="#" class="btn btn-sm bg-danger">X</a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                <i class="fas fa-user bg-green"></i>
                                                <i class="nav-icon fas fa-check-double bg-black"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    validation secteur <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>

                                                <i class="nav-icon far fa-calendar-check bg-green"" ></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    Saisie  <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                <i class="nav-icon fas fa-user-plus bg-yellow"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    Commande   <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline time label -->

                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        </div>
                                        <!-- /.timeline -->

                                    </section>
                                </div>

                            </div>

                        </div>
                        </form>
                        </div>
                        @endif
                        @if ($datas->statut==1)



                        <div class="col-md-3" >
                        <form method="POST" action="{{route('CalculheureMois')}}">
                            @csrf
                        <!-- general form elements disabled -->
                        <div class="card card-dark">
                            <div class="card-header col-md-10">
                            <h3 class="card-title">{{$datas->Nom}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <form role="form">
                                <div class="row">
                                    <section class="content">
                                        <div class="container-fluid">

                                        <!-- Timelime example  -->
                                        <div class="row">
                                            <div class="col-md-12">
                                            <!-- The time line -->
                                            <div class="timeline">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                <span class="bg-red">{{$datas->agent}}</span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                <div>
                                                <i class="fas fa-envelope bg-blue"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                        validation centre  <a href="#" class="btn btn-sm bg-danger">X</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                <i class="fas fa-user bg-green"></i>
                                                <i class="nav-icon fas fa-check-double bg-grey"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    validation direction      <a href="#" class="btn btn-sm bg-danger">X</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fas fa-user bg-green"></i>
                                                    <i class="nav-icon fas fa-check-double bg-grey"></i>
                                                    <div class="timeline-item">
                                                        <div class="timeline-body">
                                                    validation secteur  <a href="#" class="btn btn-sm bg-danger">X</a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>

                                                <i class="nav-icon far fa-calendar-check bg-green"" ></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    Saisie    <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline item -->
                                                <div>
                                                <i class="nav-icon fas fa-user-plus bg-yellow"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                    Commande   <a href="#" class="btn btn-sm bg-success">√</a>
                                                    </div>

                                                </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline time label -->

                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        </div>
                                        <!-- /.timeline -->

                                    </section>
                                </div>

                            </div>

                        </div>
                        </form>
                        </div>
                        @endif
                            @endforeach
                                                                                    @break
                                                                                    @endif
                                                @endif
                            @endforeach
                    @endsection
