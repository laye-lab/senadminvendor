@extends('layouts.template_dashbord')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
            <h4>Commande heure supplémentaire</h4>
            <center>
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
    <div class="card card-info">
      <div class="card-header">
        @foreach($agent_etablissement as $agent_etablissements)

            @if($agent_etablissements->Matricule_agent  ==  $collab)
            <button class=" btn btn-lg btn-info" name="collab">{{$agent_etablissements->Nom_Agent}}</button>
            @break
            @endif
        @endforeach
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form  class="form-horizontal" method="POST" action="{{ route('Commandestore') }}">
        @csrf
        <div class="card-body">


    <div class="form-group row">


      <label for="example-datetime-local-input" class="col-3 col-form-label">Date de début</label>
      <div class="col-8">
          <input class="form-control"  type="date" name="Date_debut"  value="{{ old('Date_debut') }}" id="example-date-input">
      </div>

            </div>
                  <div class="form-group row">
                    <label for="example-datetime-local-input" class="col-3 col-form-label">Date de fin</label>
                    <div class="col-8">
                        <input class="form-control"  type="date" name="Date_fin"  value="{{ old('Date_fin') }}" id="example-date-input">
                    </div>
            </div>
            <div class="form-group row">
              <label for="example-datetime-local-input" class="col-3 col-form-label">Nombre d'heure</label>
              <div class="col-8">
                  <input class="form-control " type="number" name="nbr_heure"  value="{{ old('nbr_heure') }}" id="example-date-input">
              </div>

            </div>

            <div class="form-group row" >
              <label for="example-datetime-local-input" class="col-3 col-form-label">Travaux à éffectuer </label>
              <div class="col-8">
                  <input class="form-control"  type="text" name="travaux_effectuer"  value="{{ old('travaux_effectuer') }}" id="example-date-input">
              </div>
            </div>
            <div class="form-group row" >
              <label for="example-datetime-local-input" class="col-3 col-form-label">Observations</label>
              <div class="col-8">
                  <input class="form-control"  type="text" name="Observations"  value="{{ old('Observations') }}" id="example-date-input">
              </div>

            </div>
            <input class="form-control"  type="hidden"   name="commandeur" value="{{old('commandeur', Auth::user()->id) }}"  id="example-text-input">
            <input class="form-control"  type="hidden"   name="collaborateur" value="{{old('collaborateur', $collab) }}"  id="example-text-input">
            <input class="form-control" type="hidden"   name="servicedr" value="{{old('servicedr', $servicedr) }}"id="example-text-input">
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <center>  <center> <button class=" btn btn-lg btn-info">Valider</button></center>
                </div>
                <!-- /.card-footer -->
              </form>
    </div>
    </center>

@endsection
