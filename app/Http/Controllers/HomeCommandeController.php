<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
class HomeCommandeController extends Controller
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

            $etablissement_user=DB::table('agent')
            ->select('etablissement')
            ->where('agent.Matricule_Agent', '=',$user)
            ->distinct('Matricule_agent')
            ->first();
            $etablissement_direction=DB::table('agent')
            ->select('Direction')
            ->where('agent.Matricule_Agent', '=',$user)
            ->distinct('Matricule_agent')
            ->first();

            if ($etablissement_user->etablissement === "Centre de Hann"){

             $Affectation=DB::table('agent')
             ->select('Affectation')
             ->where('agent.Direction', '=',$etablissement_direction->Direction)
             ->distinct('Affectation')
             ->get();
            }
            else{
             $Affectation=DB::table('agent')
             ->select('Affectation')
             ->where('agent.Etablissement', '=',$etablissement_user->etablissement)
             ->distinct('Affectation')
             ->get();
            }


            $role_account=DB::table('Role_Account')
            ->join('users','users.id' ,'=', 'Role_Account.AccountID')
            ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
            ->join('agent','agent.Matricule_Agent' ,'=','users.id')
            ->select('Matricule_agent','Fonction','Statut','Direction','Role.Nom','Nom_Agent','etablissement')
            ->get();

             /**
         *print_r($service)
         *
         */
        return view('homeCommandeindex')->with([

            'role_account'=> $role_account,
            'Affectation'=> $Affectation
        ]
        );
        }
        public function showForm()
        {
            $user=auth()->user()->id;

            $servicedr=request('service');


            $role_account=DB::table('Role_Account')
            ->join('users','users.id' ,'=', 'Role_Account.AccountID')
            ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
            ->join('agent','agent.Matricule_Agent' ,'=','users.id')
            ->select('Matricule_agent','Fonction','Statut','Direction','Role.Nom','Nom_Agent','etablissement')
            ->get();

            $agent=DB::table('agent')
            ->where([
                ['agent.affectation', '=', $servicedr],
                ['agent.Statut', '<>', 'CAD']
                ])
            ->distinct('Affectation')
            ->get();

            return view('homeCommande')->with([
                'servicedr'=> $servicedr,
                'agent'=> $agent,
                'role_account'=>$role_account
            ]
            );
        }
}



