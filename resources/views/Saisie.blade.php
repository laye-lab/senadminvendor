@extends('layouts.template_dashbord')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
            <h1>Saisir heure</h1>
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
            <div class="col-md-6">
            <div class="card card-dark">
            <div class="card-header">
                @foreach($agent_etablissement as $agent_etablissements)

                @if($agent_etablissements->Matricule_agent  ==  $collab)
                <button  name="collab" class=" btn btn-lg btn-dark">{{old('collab',$agent_etablissements->Nom_Agent)}}</button>
                @break
                @endif
            @endforeach
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  class="form-horizontal" method="POST" action="{{ route('Saisiestore') }}">
                @csrf
                <div class="card-body">
            <div class="form-group row">


            <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-10">
            <input class="form-control  @error ('Date_debut') @enderror" type="date" name="Date_Heure"  value="" id="example-date-input">
            </div>
            @error('Date_debut')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
            <div class="form-group row">
            <label for="example-date-input" class="col-2 col-form-label">De</label>
            <div class="col-sm-10">
            <input class="form-control @error ('Date_fin') @enderror" type="time"  name="heure_debut"  value="" id="example-date-input">
            </div>
            @error('Date_fin')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror

            </div>
            <div class="form-group row">
            <label for="example-week-input" class="col-2 col-form-label">À </label>
            <div class="col-sm-10">
            <input class="form-control @error ('nbr_heure') @enderror" type="time" name="heure_fin"  value="2011-W33" id="example-week-input">
            </div>
            @error('nbr_heure')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>

            <div class="form-group row" >
            <label for="example-text-input" class="col-2 col-form-label">Travaux réalisés</label>
            <div class="col-sm-10">
            <input class="form-control" type="text"  name="travaux_effectuer" value="" id="example-text-input">
            </div>
            </div>
            <div class="form-group row" >
            <label for="example-text-input"  name="Observations" class="col-2 col-form-label">Observations</label>
            <div class="col-sm-10">
            <input class="form-control  @error ('Observations')"@enderror" name="Observations" type="text" value="" id="example-text-input">
            </div>
            @error('Observations')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
            <input type="hidden" name="Date_debut"  value="{{old('Date_debut',$Date_debut)}}">
            <input type="hidden" name="Date_fin"  value=" {{old('Date_fin',$Date_fin)}}">
            @foreach($equipe as $equipes)

                    @if($equipes->agentMatricule_Agent  ==  Auth::user()->id))
                    <input class="form-control"  name="commandeur" type="text" value="{{old('commandeur',$equipes->n_plus_un)}}"" id="example-text-input">
                    @break
                @endif
            @endforeach
            <input class="form-control"  name="collaborateur"  type="hidden" value="{{old('collaborateur',$collab)}}"  id="example-text-input">
            <input class="form-control"  name="nbr_heure"  type="hidden" value="{{old('nbr_heure',$nbr_heure)}}"  id="example-text-input">
            <input class="form-control"  name="id_heure"  type="hidden" value="{{old('id_heure',$id_heure)}}"  id="example-text-input">
            <input class="form-control"  name="servicedr" type="hidden" value="{{old('servicedr',$servicedr)}}" id="example-text-input">


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <center>  <center> <button class=" btn btn-lg btn-dark">Valider</button></center>
                </div>
                <!-- /.card-footer -->
            </form>
            </div>
            </center>
            @endsection
