
 <div class="card card-info">
    <div class="card-header col-md-5">
      <h3 class="card-title">Choisissez l'agent</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form role="form">
        <div class="row">
          <div class="col-sm-12">
              {{$searchmatricule}}
            <!-- text input -->
            <label for="">Indiquez le matricule</label>

            <div class="input-group mb-3 col-md-12">

                <input type="text" wire:model.lazy="searchmatricule" class="form-control" placeholder="exemple : 12345"
                aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="off">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2"><i class="fas fa-user"></i></span>
                </div>
              </div>

          </div>
      </form>
      </div>

      </div>
  </div>

@foreach ($agents as $agent)



        <div class="card ">
            <div class="card-body">
                <button class="btn btn-info card-title " style="position:relative left:30px;">{{$agent->Nom_Agent}}</button>
                <br><br>

                <form method="POST" action="{{'Affectation'}}">
                    @csrf
                    <input type="hidden" name="matricule"  value="{{$agent->Matricule_Agent}}">

      <p class="card-title" > {{$agent->Matricule_Agent}}  {{$agent->Direction}}  {{$agent->Etablissement}}  </p>
      <button type="submit" class="btn btn-primary " style="position:relative bottom:100px;">Modifier Affectation</button>
    </form>
    </div>
  </div>

@endforeach

</div>
