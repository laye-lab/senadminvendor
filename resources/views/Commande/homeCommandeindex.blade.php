@extends('layouts.template_dashbord')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->


<center>
<section class="content" >
  <div class="container-fluid">

    <div class="row" style="position:relative; top:100px; left:30%;">
      <!-- left column -->
      <div class="col-md-6" >
        <form method="POST" action="{{ route('homeCommandepost') }}">
          @csrf
        <!-- general form elements disabled -->
        <div class="card card-info">
          <div class="card-header col-md-5">
            <h3 class="card-title">Choisissez le secteur</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form role="form">
              <div class="row">
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <select class="form-control" name="service" id="">
                      @foreach($Affectation as $Affectations)

                          <option value=" {{$Affectations->Affectation}}">
                            {{$Affectations->Affectation}}
                          </option>

                      @endforeach
                        </select>
                        <input class="form-control"  name="commandeur" type="hidden" value="{{Auth::user()->id }}"" id="example-text-input">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">



                    <button class=" btn  btn-lg btn-info form-control">Passer commande </button>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </form>
      </div>

    </div>
  </div>
</section>
</center>
@endsection
