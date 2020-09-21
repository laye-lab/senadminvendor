<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;

class AffectationController extends Controller
{
            public function index()
            {
                $user=auth()->user()->id;




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
            return view('affectationindex')->with([

                'role_account'=> $role_account,

            ]
            );
            }
            public function showForm()
            {  if (null== request('matricule')) {
                return back();
            }
                $user=auth()->user()->id;
                $matricule= request('matricule');

                $data =DB::table('agent')
                ->where('agent.Matricule_agent', '=',$matricule)
                ->get();

                $equipe_agent =DB::table('equipe')
                ->where('agentMatricule_Agent', '=',$matricule)
                ->select('Code_Equipe')
                ->first();


                $equipe =DB::table('equipe')
                ->select('Code_Equipe')
                ->distinct('Code_Equipe')
                ->get();


                $etablissement=DB::table('agent')
                ->select('etablissement')
                ->distinct('etablissement')
                ->get();

                $Direction=DB::table('agent')
                ->select('Direction')
                ->distinct('Direction')
                ->get();

                $Statut=DB::table('agent')
                ->select('Statut')
                ->distinct('Statut')
                ->get();

                $Fonction=DB::table('agent')
                ->select('Fonction')
                ->distinct('Fonction')
                ->get();

                $Affectation=DB::table('agent')
                ->select('Affectation')
                ->distinct('Affectation')
                ->get();

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
            return view('affectation')->with([

                'role_account'=> $role_account,
                'data'=> $data,
                'Affectation'=> $Affectation,
                'etablissement'=> $etablissement,
                'Direction'=> $Direction,
                'Statut'=> $Statut,
                'equipe_agent'=> $equipe_agent,
                'equipe'=> $equipe ,
                'Fonction'=> $Fonction


            ]
            );
            }

            public function store()
            {

                $user=auth()->user()->id;
                $matricule= request('matricule');

                $data =DB::table('agent')
                ->where('agent.Matricule_agent', '=',$matricule)
                ->get();

                $equipe_agent =DB::table('equipe')
                ->where('agentMatricule_Agent', '=',$matricule)
                ->select('Code_Equipe')
                ->first();


                $equipe =DB::table('equipe')
                ->select('Code_Equipe')
                ->distinct('Code_Equipe')
                ->get();


                $etablissement=DB::table('agent')
                ->select('etablissement')
                ->distinct('etablissement')
                ->get();

                $Direction=DB::table('agent')
                ->select('Direction')
                ->distinct('Direction')
                ->get();

                $Statut=DB::table('agent')
                ->select('Statut')
                ->distinct('Statut')
                ->get();

                $Fonction=DB::table('agent')
                ->select('Fonction')
                ->distinct('Fonction')
                ->get();

                $Affectation=DB::table('agent')
                ->select('Affectation')
                ->distinct('Affectation')
                ->get();

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
            return view('affectation')->with([

                'role_account'=> $role_account,
                'data'=> $data,
                'Affectation'=> $Affectation,
                'etablissement'=> $etablissement,
                'Direction'=> $Direction,
                'Statut'=> $Statut,
                'equipe_agent'=> $equipe_agent,
                'equipe'=> $equipe ,
                'Fonction'=> $Fonction


            ]
            );
            }

}
