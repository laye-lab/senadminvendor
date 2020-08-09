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
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <!-- Main content -->
     
<center>
<div class="col-md-6">
<div class="card card-dark">
  <div class="card-header">

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
<input class="form-control"  name="commandeur" type="hidden" value="{{Auth::user()->id }}"" id="example-text-input">
<input class="form-control"  name="collaborateur"  type="hidden" value="{{$collab}}"  id="example-text-input">
<input class="form-control"  name="servicedr" type="hidden" value="{{$servicedr}}" id="example-text-input">
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
