<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
class HomeSaisieController extends Controller
{
  /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */

        public function index()
        {
            $user=auth()->user()->id;
            $role_account=DB::table('Role_Account')
            ->join('users','users.id' ,'=', 'Role_Account.AccountID')
            ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
            ->join('agent','agent.Matricule_Agent' ,'=','users.id')
            ->select('Matricule_agent','Fonction','Statut','Direction','Role.Nom','Nom_Agent','etablissement')
            ->get();
            try {

                $agent_attribut=DB::table('agent_Heures_supp_a_faire')
                ->join('equipe','equipe.agentMatricule_Agent','=','agent_Heures_supp_a_faire.agentMatricule_Agent')
                ->join('agent','agent.Matricule_Agent','=','agent_Heures_supp_a_faire.agentMatricule_Agent')
                ->join('Heures_supp_a_faire','Heures_supp_a_faire.ID','=','agent_Heures_supp_a_faire.Heures_supp_a_faireID')
                ->where('n_plus_un', '=',$user)
                ->distinct('Matricule_agent')
                ->select('agent.Matricule_agent','Nom_Agent','n_plus_un','Statut','Direction','etablissement'
                ,'fonction','Affectation','Date_debut','Date_fin','travaux_effectuer','nbr_heure','Heures_supp_a_faire.ID')
                ->get();

            } catch (Throwable $e) {
                report($e);

            }

                return view('homesaisie')->with([
                    'agent_attribut'=> $agent_attribut,
                    'role_account'=> $role_account
                ]);



        }
        public function showForm()
        {
            $servicedr=request('service');
            $role_account=DB::table('Role_Account')
            ->join('users','users.id' ,'=', 'Role_Account.AccountID')
            ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
            ->join('agent','agent.Matricule_Agent' ,'=','users.id')
            ->select('Matricule_agent','Fonction','Statut','Direction','Role.Nom','Nom_Agent','etablissement')
            ->get();

                $agent_attribut=DB::table('agent')
                ->join('equipe','equipe.agentMatricule_Agent','=','agent.Matricule_Agent')
                ->join('agent_Heures_supp_a_faire','agent_Heures_supp_a_faire.agentMatricule_Agent','=','agent.Matricule_Agent')
                ->distinct('Matricule_agent')
                ->select('agent.Matricule_agent','Nom_Agent','n_plus_un','Statut','Direction','etablissement','fonction','Affectation')
                ->get();
            $users=User::all();



            $service=DB::table('Affectation')
            ->join('agent','agent.Matricule_Agent','=','affectation.agentMatricule_Agent')
            ->join('Direction','Direction.agentMatricule_Agent','=','affectation.agentMatricule_Agent')
            ->join('Fonction','Fonction.agentMatricule_Agent','=','affectation.agentMatricule_Agent')
            ->select('Matricule_agent','Nom_Agent','Libelle_Fonction','Statut','Libelle_Affectation','Direction','Etablissemt_nom')
            ->distinct('Matricule_agent')
            ->get();

            return view('homeCommande')->with([
                'service'=> $service,
                'users'=>$users,
                'agent_etablissement'=>$agent_etablissement,
                'role_account'=> $role_account,
                'servicedr'=> $servicedr

            ]
            );
        }
}



