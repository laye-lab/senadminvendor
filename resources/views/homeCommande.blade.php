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
                <button type="submit" class="btn btn-danger">  {{$servicedr}}</button>
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
                    <th>Responsable</th>
                    <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                            @foreach($agent as $agent_collaborateur)

                                      <td>
                                        {{$agent_collaborateur->Matricule_Agent}}
                                      </td>

                                      <td>
                                        {{$agent_collaborateur->Nom_Agent}}
                                      </td>
                                      <td>
                                        {{$agent_collaborateur->fonction}}
                                      </td>
                                      <td>
                                        {{$agent_collaborateur->Statut}}
                                      </td>
                                      <td>
                                        {{$agent_collaborateur->Affectation}}
                                      </td>
                                      <td>
                                        {{$agent_collaborateur->Direction}}
                                      </td>
                                      <td>
                                        {{$agent_collaborateur->Etablissement}}
                                      </td>
                                      <td>
                                        <form method="POST" action="{{'Commandeindex'}}">
                                          @csrf
                                        <input type="hidden" name="id"  value="{{$agent_collaborateur->Matricule_Agent}}">
                                        <input type="hidden" name="servicedr"  value="{{$servicedr}}">
                                          <button type="submit" class="btn btn-danger">Commander</button>
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
