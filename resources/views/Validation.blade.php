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
    @foreach($role_account as $role)
    @if(Auth::user()->id == $role->Matricule_agent)
    @switch($role->Nom)
    @case('n+2')
    @foreach($agent_attribut as $agent_unite)
                              
                              @foreach($heurre_a_faire as $heure)
    
                                      @if($agent_unite->Matricule_agent ==$heure->Matricule_agent and $heure->Statut==2 and $heure->nom==$role->etablissement )    
                                      
                                      <section class="content">
                                        <div class="card">
                                          <div class="card-header">
                                            <h3 class="card-title"> Details</h3>
                                          </div>
                                          <div class="card-body">
                                            <div class="row">
                                              <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                                <div class="row">
                                                  <div class="col-12 col-sm-4">
                                                    <div class="info-box bg-info">
                                                      <div class="info-box-content">
                                                        @foreach($nbr_heure as $nbr_heures)
    
                                                        @if($agent_unite->Matricule_agent ==$nbr_heures->Agent_Matricule_Agent ) 
                                                        <span class="info-box-text text-center ">Nombre d'heures</span>
                                                        <span class="info-box-number text-center mb-0">  {{$nbr_heures->nbr_heure}}</span>
                                                        @break
                                                      @endif
                                                      @endforeach
                                                     
                                  </div>
                                </div>
                              </div>
                              <form method="POST" action="{{'Validationstore'}}" class="col-12 col-sm-4" style="position:relative;left:80%; top:100px;" >
                                @csrf
                              <input type="hidden" name="id"  value="{{$heure->id_heure_a_faire}}">
                              <input type="hidden" name="role"  value="{{$role->Nom}}">
                              <input type="hidden" name="etablissement"  value="{{$role->etablissement}}">
                              <button style=" background-color:white; /* Green */
                              border: none;
                              color: white;">
                                <div class="info-box bg-danger" style="width:100%;">
                                  <div class="info-box-content">
                                    <span class="info-box-text text-center ">Valider</span>
                                    <span class="info-box-number text-center mb-0">Heure supplémentaire</span>
                                  </div>
                                </div>
                              </button>
                            </form>
                            </div>   
                            <div class="row">
                              <div class="col-12">
                              <h4>{{$agent_unite->Nom_Agent}}</h4>
                                <div class="card-body table-responsive p-0">
                                  <table class="table table-hover text-nowrap">
                                    <thead>
                                      <tr>
                                        <th>Date</th>
                                        <th>De</th>
                                        <th>A</th>
                                        <th>Travaux réalisés</th>
                                        <th>Observations</td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                  
                          </tbody>
                        </table>
                      </div>
                      
                  </div>
                </div>
              
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    
        </section>
  
                                           
    
        @endforeach
    @break
        @case('n+1')
        @foreach($agent_attribut as $agent_unite)

        @if($agent_unite->n_plus_un ==Auth::user()->id )  
      
                                      @foreach($heurre_a_faire as $heure)
            
                                              @if($agent_unite->Matricule_agent ==$heure->Matricule_agent and $heure->Statut==1 )    
                                              
                                              <section class="content">
                                                <div class="card">
                                                  <div class="card-header">
                                                    <h3 class="card-title"> Details</h3>
                                                  </div>
                                                  <div class="card-body">
                                                    <div class="row">
                                                      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                                        <div class="row">
                                                          <div class="col-12 col-sm-4">
                                                            <div class="info-box bg-info">
                                                              <div class="info-box-content">
                                                                @foreach($nbr_heure as $nbr_heures)
            
                                                                @if($agent_unite->Matricule_agent ==$nbr_heures->Agent_Matricule_Agent ) 
                                                                <span class="info-box-text text-center ">Nombre d'heures</span>
                                                                <span class="info-box-number text-center mb-0">  {{$nbr_heures->nbr_heure}}</span>
                                                                @break
                                                              @endif
                                                              @endforeach
                                          </div>
                                        </div>
                                      </div>
                                      <form method="POST" action="{{'Validationstore'}}" class="col-12 col-sm-4" style="position:relative;left:80%; top:100px;" >
                                        @csrf
                                      <input type="hidden" name="id"  value="{{$heure->id_heure_a_faire}}">
                                      <input type="hidden" name="role"  value="{{$role->Nom}}">
                                      <button style=" background-color:white; /* Green */
                                      border: none;
                                      color: white;">
                                        <div class="info-box bg-danger" style="width:100%;">
                                          <div class="info-box-content">
                                            <span class="info-box-text text-center ">Valider</span>
                                            <span class="info-box-number text-center mb-0">Heure supplémentaire</span>
                                          </div>
                                        </div>
                                      </button>
                                    </form>
                                    </div>   
                                    <div class="row">
                                      <div class="col-12">
                                      <h4>{{$agent_unite->Nom_Agent}}</h4>
                                        <div class="card-body table-responsive p-0">
                                          <table class="table table-hover text-nowrap">
                                            <thead>
                                              <tr>
                                                <th>Date</th>
                                                <th>De</th>
                                                <th>A</th>
                                                <th>Travaux réalisés</th>
                                                <th>Observations</td>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($heurre_a_faire as $heure)
            
                                              @if($agent_unite->Matricule_agent ==$heure->Matricule_agent)    
                                              <tr>     
                                                <td>
                                                  {{$heure->Date_Heure}}
                                                </td>
                                                <td>
                                                  {{$heure->heure_debut}}
                                                </td>
                                                <td>
                                                  {{$heure->heure_fin}}
                                                </td>
                                                <td>
                                                  {{$heure->travaux_effectuer}}
                                                </td>
                                                <td>
                                                  {{$heure->observations}}
                                                </td>
                                            </tr>
                                              @endif
                                    @endforeach
                                    @break
                                            @endif
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                              
                          </div>
                        </div>
                      
                      
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            
                </section>
          
                                                   
                @endif  
                @endforeach
            @break
           
            @case('n+3' or 'dto' or 'dcm')
            @foreach($agent_attribut as $agent_unite)
    
          
                                          @foreach($heure_supp as $heure)
                
                                                  @if($agent_unite->Matricule_agent ==$heure->Agent_Matricule_Agent and $heure->Statut ==3 )    
                                                  
                                                  <section class="content">
                                                    <div class="card">
                                                      <div class="card-header">
                                                        <h3 class="card-title"> Details</h3>
                                                      </div>
                                                      <div class="card-body">
                                                        <div class="row">
                                                          <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                                            <div class="row">
                                                              <div class="col-12 col-sm-4">
                                                                <div class="info-box bg-info">
                                                                  <div class="info-box-content">
                                                                    @foreach($nbr_heure as $nbr_heures)
            
                                                                    @if($agent_unite->Matricule_agent ==$nbr_heures->Agent_Matricule_Agent ) 
                                                                    <span class="info-box-text text-center ">Nombre d'heures</span>
                                                                    <span class="info-box-number text-center mb-0">  {{$nbr_heures->nbr_heure}}</span>
                                                                    @break
                                                                  @endif
                                                                  @endforeach
                                                                 
                                              </div>
                                            </div>
                                          </div>
                                          <form method="POST" action="{{'Validationstore'}}" class="col-12 col-sm-4" style="position:relative;left:80%; top:100px;" >
                                            @csrf
                                          <input type="hidden" name="id"  value="{{$heure->id_heure_a_faire}}">
                                          <input type="hidden" name="role"  value="{{$role->Nom}}">
                                          <button style=" background-color:white; /* Green */
                                          border: none;
                                          color: white;">
                                            <div class="info-box bg-danger" style="width:100%;">
                                              <div class="info-box-content">
                                                <span class="info-box-text text-center ">Valider</span>
                                                <span class="info-box-number text-center mb-0">Heure supplémentaire</span>
                                              </div>
                                            </div>
                                          </button>
                                        </form>
                                        </div>   
                                        <div class="row">
                                          <div class="col-12">
                                          <h4>{{$agent_unite->Nom_Agent}}</h4>
                                            <div class="card-body table-responsive p-0">
                                              <table class="table table-hover text-nowrap">
                                                <thead>
                                                  <tr>
                                                    <th>Date</th>
                                                    <th>De</th>
                                                    <th>A</th>
                                                    <th>Travaux réalisés</th>
                                                    <th>Observations</td>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($heurre_a_faire as $heure)
            
                                                  @if($agent_unite->Matricule_agent ==$heure->Matricule_agent and $heure->Statut==3)    
                                                  <tr>     
                                                    <td>
                                                      {{$heure->Date_Heure}}
                                                    </td>
                                                    <td>
                                                      {{$heure->heure_debut}}
                                                    </td>
                                                    <td>
                                                      {{$heure->heure_fin}}
                                                    </td>
                                                    <td>
                                                      {{$heure->travaux_effectuer}}
                                                    </td>
                                                    <td>
                                                      {{$heure->observations}}
                                                    </td>
                                                </tr>
                                                  @endif
                                        @endforeach
                                        @break
                                        
                                                @endif
                                        @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                                  
                              </div>
                            </div>
                          
                          
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                
                    </section>
              
                                                       
                  
                    @endforeach
                @break
                    @default
           
                <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-md-8">
                          <div class="card">
                              <div class="card-header">{{ __('Dashboard') }}</div>
              
                              <div class="card-body">
              
                                  {{ __('Pas de commande a valider pour le moment') }}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
    

            @endswitch
            @break
            @endif
            @endforeach
                                                   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
