@extends('../../layouts.template_dashbord_collapsed')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Liste des agents</h1>
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
                  <button type="submit" class="btn btn-danger">Choisissez un agent et affectez lui des heures supplémentaires </button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped table-responsive-md btn-table">

                  <thead>
                    <tr>
                      <th>Matricule</th>
                    <th>Prenom et Nom</th>
                    <th>Fonction</th>
                    <th>Statut</th>
                    <th>Secteur/Service</th>
                    <th>Direction</th>
                    <th>Etablissemt</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Travaux a éffectuer </th>

                    <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>

                            @foreach($agent_attribut as $agent_attributs)


                                      <td>
                                        {{$agent_attributs->Matricule_agent}}
                                      </td>

                                      <td>
                                        {{$agent_attributs->Nom_Agent}}
                                      </td>
                                      <td>
                                        {{$agent_attributs->fonction}}
                                      </td>
                                      <td>
                                        {{$agent_attributs->Statut}}
                                      </td>
                                      <td>
                                        {{$agent_attributs->Affectation}}
                                      </td>
                                      <td>
                                        {{$agent_attributs->Direction}}
                                      </td>
                                      <td>
                                        {{$agent_attributs->etablissement}}
                                      </td>
                                      <td>
                                        {{$agent_attributs->Date_debut}}
                                      </td>
                                      <td>
                                        {{$agent_attributs->Date_fin}}
                                      </td>
                                      <td>
                                        {{$agent_attributs->travaux_effectuer}}
                                      </td>




                                    <td>
                                      <form method="POST" action="{{'Saisie'}}">
                                        @csrf
                                        <input type="hidden" name="Date_debut"  value="{{$agent_attributs->Date_debut}}">
                                        <input type="hidden" name="Date_fin"  value=" {{$agent_attributs->Date_fin}}">
                                        <input type="hidden" name="nbr_heure"  value=" {{$agent_attributs->nbr_heure}}">
                                      <input type="hidden" name="id"  value="{{$agent_attributs->Matricule_agent}}">
                                      <input type="hidden" name="nom"  value=" {{$agent_attributs->Nom_Agent}}">
                                      <input type="hidden" name="id_heure"  value=" {{$agent_attributs->ID}}">

                                      <input type="hidden" name="servicedr"  value="{{$agent_attributs->Affectation}}">
                                        <button type="submit" class="btn btn-primary">Saisir</button>
                                      </form>

                                    </td>

                                  </tr>



                              @endforeach

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
