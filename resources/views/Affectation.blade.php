@extends('layouts.template_dashbord')

@section('content')
 <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                        <h3>Modification Affectation agent </h3>
                        <center>
                            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('erreur'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            @endif
                    @if ($errors->any())


                    @foreach ($errors->all() as $error)

                        <div class="alert alert-danger  col-6 " role="alert">
                        {{ $error }}
                        </div>
                    @endforeach

                @if ($errors->has('email'))
                @endif

            @endif

                        </center>
                    </div>

                    </div>
                </div><!-- /.container-fluid -->
                </section>
                <!-- Main content -->

            <center>
            <div class="col-md-10">
            <div class="card card-dark">
            <div class="card-header">
               <h4> Affectation</h4>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form  class="form-horizontal" method="POST" action="{{ route('Saisiestore') }}">
                @csrf
                @foreach ($data as $datas)
                <div class="card-body">

                    <div class="form-group row">


                            <label for="example-datetime-local-input" class="col-sm-3 col-form-label">Matricule</label>
                                <div class="col-sm-8">
                                    <input class="form-control type="text" name="matricule" disabled value="{{$datas->Matricule_Agent}}" id="example-date-input">
                                </div>

                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>

                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-3 col-form-label">Nom et Prenom</label>
                            <div class="col-sm-8">
                                <input class="form-control " type="text"  name="nom" disabled  value="{{$datas->Nom_Agent}}" id="example-date-input">
                            </div>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>

                    </div>
                    <div class="form-group row" >
                        <label for="example-text-input"  name="Observations" class="col-3 col-form-label">Etablissement</label>
                            <div class="col-sm-8">

                        <select  class="form-control"  name="etablissement" id="">
                            <option value="{{$datas->Etablissement}}">{{$datas->Etablissement}}</option>
                            @foreach ($etablissement as $etablissements)
                            <option value="{{$etablissements->etablissement}}">{{$etablissements->etablissement}}</option>
                            @endforeach
                        </select>
                    </div>

                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    </div>
                    <div class="form-group row">
                    <label for="example-week-input" class="col-3 col-form-label">Direction</label>
                        <div class="col-sm-8">

                            <select  class="form-control"  name="direction" id="">
                                <option value="{{$datas->Direction}}">{{$datas->Direction}}</option>
                                @foreach ($Direction as $Directions)
                                <option value="{{$Directions->Direction}}">{{$Directions->Direction}}</option>
                                @endforeach
                            </select>
                        </div>

                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    </div>

                    <div class="form-group row">
                        <label for="example-week-input" class="col-3 col-form-label">Equipe</label>
                            <div class="col-sm-8">

                                <select  class="form-control"   name="equipe" id="">
                                    <option value="{{old('affectation',$datas->Affectation)}}">{{$equipe_agent->Code_Equipe}}</option>
                                    @foreach ($equipe as $equipes)
                                    <option value="{{$equipes->Code_Equipe}}">{{$equipes->Code_Equipe}}</option>
                                    @endforeach
                                </select>
                            </div>

                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        </div>

                    <div class="form-group row" >
                        <label for="example-text-input" class="col-3 col-form-label">Affectation</label>
                        <div class="col-sm-8">
                        <select  class="form-control"  name="affectation" id="">
                            <option value="{{old('affectation',$datas->Affectation)}}">{{$datas->Affectation}}</option>
                            @foreach ($Affectation as $Affectations)
                            <option value="{{$Affectations->Affectation}}">{{$Affectations->Affectation}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group row" >
                        <label for="example-text-input" class="col-3 col-form-label">Statut</label>
                    <div class="col-sm-8">
                        <select  class="form-control  name="statut" id="">
                            <option value=" {{old('statut',$datas->Statut)}}">{{$datas->Statut}}</option>
                            @foreach ($Statut as $Statuts)
                            <option value="{{$Statuts->Statut}}">{{$Statuts->Statut}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <center>  <center> <button class=" btn btn-lg btn-dark">Valider</button></center>
                </div>
                <!-- /.card-footer -->
            </form>
            </div>
            @endforeach
            </center>
            @endsection
