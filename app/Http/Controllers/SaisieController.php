<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use App\Heures_supp;
use App\Step;
use DateTime;
use StdClass;
use Carbon\Carbon;
use App\Http\Requests\StoreSaisieRequest;
use App\Http\Requests\UpdateSaisie;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Validator;


class SaisieController extends Controller
{ public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {

        $user=auth()->user()->id;

        $Date_debut=request('Date_debut');

        $Date_fin=request('Date_fin');

        $collab=request('id');

        $nbr_heure=request('nbr_heure');

        $id_heure=request('id_heure');

        $nom=request('nom');

        $servicedr=request('servicedr');

        $role_account=DB::table('Role_Account')
        ->join('users','users.id' ,'=', 'Role_Account.AccountID')
        ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
        ->join('agent','agent.Matricule_Agent' ,'=','users.id')
        ->select('Matricule_agent','Fonction','Statut','Direction','Role.Nom','Nom_Agent','etablissement')
        ->get();
        $agent_etablissement=DB::table('agent')
        ->select('agent.Matricule_agent','Nom_Agent','Fonction','agent.Statut'
        ,'Direction','Etablissement','Affectation')
        ->get();
        $equipe=DB::table('equipe')
        ->get();

       return view('Saisie')->with([
                'role_account'=>$role_account,
                'collab'=>$collab,
                'nom'=>$nom,
                'agent_etablissement'=>$agent_etablissement,
                'servicedr'=>$servicedr,
                'Date_debut'=>$Date_debut,
                'Date_fin'=>$Date_fin,
                'equipe'=>$equipe,
                'nbr_heure'=>$nbr_heure,
                'id_heure'=>$id_heure,

                ] );
    }

    public function Updateindex(Request $request)
    {

        $role_account=DB::table('Role_Account')
        ->join('users','users.id' ,'=', 'Role_Account.AccountID')
        ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
        ->join('agent','agent.Matricule_Agent' ,'=','users.id')
        ->select('Matricule_agent','Fonction','Statut','Direction','Role.Nom','Nom_Agent','etablissement')
        ->get();
        $heure=DB::table('Heures_supp_a_faire')
        ->get();

        $id=request('id');

        return view('ModifSaisie')->with([
            'id' =>  $id,
            'role_account' =>  $role_account,
            'heure' =>$heure
            ]);

    }

    public function Update(UpdateSaisie $request)
    {


        $heure_debut=request('heure_debut');
        $Date_Heure=request('Date_Heure');
        $heure_fin=request('heure_fin');
        $collab=request('id');
        $travaux_effectuer=request('travaux_effectuer');
        $Observations=request('Observations');

        $Heures_supp=DB::table('heures_supp')
        ->where('id', '=', $id )
        ->update([
            'Date_Heure' =>  $Date_Heure,
            'heure_debut' => $heure_debut,
            'heure_fin' => $heure_fin,
            'travaux_effectuer' => $travaux_effectuer,
            'Observations' => $Observations,

            ]);

       return back();
    }






    public function store(StoreSaisieRequest $request)
    {



    $date1=strtotime(request('Date_Heure'));
    $date=date('Y-m-d',$date1);
    $semaine=date('W',$date1);

    $heure_debut1 =strtotime(request('heure_debut'));
    $heure_debut=date('H',$heure_debut1);
    $heure_fin1 =strtotime(request('heure_fin'));
    $heure_fin=date('H',$heure_fin1);
    $collaborateur=request('collaborateur');
    $id_heure=request('id_heure');

    $nbr_heure=request('nbr_heure');

    $servicedr=request('servicedr');
    $heuresaisie = DB::table('heures_supp')

    ->sum('total_heures_saisie');
    $role_account=DB::table('Role_Account')
    ->join('users','users.id' ,'=', 'Role_Account.AccountID')
    ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
    ->join('agent','agent.Matricule_Agent' ,'=','users.id')
    ->select('Matricule_agent','Fonction','Statut','Direction','Role.Nom','Nom_Agent','etablissement')
    ->get();


        $service=DB::table('Affectation')
        ->select('Libelle_Affectation','Etablissemt_nom','agentMatricule_Agent')
        ->distinct('Libelle_Affectation')
        ->select('Libelle_Affectation','Etablissemt_nom')
        ->get();
        $affectation=DB::table('Affectation')
        ->select('Libelle_Affectation','Etablissemt_nom','agentMatricule_Agent')
        ->get();

        $jours_ferie = array(
            'Jour de l\'an'=>'2019-01-01',
            'Fête Nationale'=>'2019-04-04',
            'Lundi Paques'=>'2019-04-22',
            'Fête du Travail'=>'2019-05-01',
            'Ascension'=>'2019-05-30',
            'Korite'=>'2019-11-09',
            'Pentecote'=>'2019-06-05',
            'Tabaski'=>'2019-08-12',
            'Assomption'=>'2019-08-15',
            'Tamkharit'=>'2019-11-09',
            'Magal de Touba'=>'2019-10-18',
            'Toussaint'=>'2019-11-01',
            'Maouloud'=>'2019-11-09',
            'Noël'=>'2019-12-25',
            'Noël'=>'2020-08-16'
        );

    $total_heure_latest=DB::table('heures_supp')
    ->select('total_heures_saisie')
    ->where([
        ['Agent_Matricule_Agent','=',$collaborateur],
        ['semaine','=',$semaine],
    ])
    ->sum('total_heures_saisie');
    $total_heure_latest_total=DB::table('heures_supp')
    ->select('total_heures_saisie')
    ->where([
        ['Agent_Matricule_Agent','=',$collaborateur],
    ])
    ->sum('total_heures_saisie');
if ($heure_debut>$heure_fin) {
    if (($total_heure_latest_total + ($heure_debut - $heure_fin ))>=  $nbr_heure) {

        return back()->with('erreur','Vous avez depassé le total d\'heure commandé ');
    }
}
else{
    if (($total_heure_latest_total + ($heure_fin - $heure_debut))>=  $nbr_heure) {

        return back()->with('erreur','Vous avez depassé le total d\'heure commandé ');
    }

}



        $id_heure=DB::table('agent_Heures_supp_a_faire')
    ->select('Heures_supp_a_faireID')
    ->where('agentMatricule_Agent','=',$collaborateur)
    ->latest('Heures_supp_a_faireID')->first();


            $id_heure=DB::table('agent_Heures_supp_a_faire')
        ->select('Heures_supp_a_faireID')
        ->where('agentMatricule_Agent','=',$collaborateur)
		->latest('Heures_supp_a_faireID')->first();
		Carbon::setWeekStartsAt(Carbon::SUNDAY);
        $Heures_supp = new Heures_supp;

        $Heures_supp->Date_Heure =$date;
        $Heures_supp->heure_debut =$heure_debut;
        $Heures_supp->heure_fin =$heure_fin;
        $Heures_supp->Agent_Matricule_Agent =$collaborateur;
        $Heures_supp->travaux_effectuer =request('travaux_effectuer');
        $Heures_supp->Observations =request('Observations');
        $Heures_supp->Statut =1;
		$Heures_supp->commandeur =request('commandeur');
        $Heures_supp->semaine =$semaine;
        $Heures_supp->id_step =1;
		$Heures_supp->id_heure_a_faire= $id_heure->Heures_supp_a_faireID;

				$total_taux_15=0;
				$total_taux_40=0;
				$total_taux_60=0;
				$total_taux_100=0;
				$Total=0;

                if(in_array($date, $jours_ferie))
									{
                                        if($heure_debut>=5 && $heure_fin<=23 && $heure_fin>$heure_debut)/// si on est  le matin
                                                             {
                                                                $diff_heure =$heure_fin-$heure_debut;

                                                                        $nbre_taux_15   =0;
                                                                        $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                                                        $nbre_taux_40   = 0;
                                                                        $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                                                        $nbre_taux_60   = $diff_heure;
                                                                        $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                                                        $nbre_taux_100  = 0;
                                                                        $total_taux_100 = $total_taux_100 + $nbre_taux_100;

                                                                        $total_heures_saisie = $nbre_taux_15 + $nbre_taux_40 + $nbre_taux_60 + $nbre_taux_100;
                                                                        $Total  +=$total_heure_latest+$diff_heure;

                                                                        $Heures_supp->total_taux_15 =$total_taux_15;
                                                                        $Heures_supp->total_taux_40 =$total_taux_40;
                                                                        $Heures_supp->total_heures_saisie =$total_heures_saisie;
                                                                        $Heures_supp->total_taux_60 =$total_taux_60;
                                                                        $Heures_supp->total_taux_100 =$total_taux_100;
                                                                        $Heures_supp->Total =$Total;
                                                                        $Heures_supp->save();
                                                             }




                                          if($heure_debut >=0 && $heure_fin<=5   && $heure_fin>$heure_debut)/// si  on est le soir
                                        {

                                            $diff_heure =$heure_fin-$heure_debut;


                                            $diff_heure =$heure_fin-$heure_debut;

                                            $nbre_taux_15   =0;
                                            $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                            $nbre_taux_40   = 0;
                                            $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                            $nbre_taux_60   = 0;
                                            $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                            $nbre_taux_100  = $diff_heure;
                                            $total_taux_100 = $total_taux_100 + $nbre_taux_100;

                                            $total_heures_saisie = $nbre_taux_15 + $nbre_taux_40 + $nbre_taux_60 + $nbre_taux_100;
                                            $Total  +=$total_heure_latest+$diff_heure;

                                            $Heures_supp->total_taux_15 =$total_taux_15;
                                            $Heures_supp->total_taux_40 =$total_taux_40;
                                            $Heures_supp->total_heures_saisie =$total_heures_saisie;
                                            $Heures_supp->total_taux_60 =$total_taux_60;
                                            $Heures_supp->total_taux_100 =$total_taux_100;
                                            $Heures_supp->Total =$Total;
                                            $Heures_supp->save();
                                }



                                if($heure_debut >=5 && $heure_debut<=22 && $heure_fin>=0 && $heure_fin<=5  && $heure_fin<$heure_debut)/// si on est dans le matin et le soir  et on est le soir
                                {

                                    $diff_heure =$heure_debut-$heure_fin;


                                                $nbre_taux_15   = 0;
                                                $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                                $nbre_taux_40   =0 ;
                                                $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                                $nbre_taux_60   =22 - $heure_debut;
                                                $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                                $nbre_taux_100  = (24+$heure_fin) - $heure_debut;
                                                $total_taux_100 = $total_taux_100 + $nbre_taux_100;

                                                $total_heures_saisie = $total_taux_100+$nbre_taux_60+ $nbre_taux_40+ $nbre_taux_15 ;
                                                                $Total  = $diff_heure;
                                                                $Heures_supp->total_taux_15 =$total_taux_15;
                                                                $Heures_supp->total_taux_40 =$total_taux_40;

                                                                $Heures_supp->total_taux_60 =$total_taux_60;
                                                                $Heures_supp->total_taux_100 =$total_taux_100;
                                                                $Heures_supp->total_heures_saisie =$total_heures_saisie ;

                                                                $Heures_supp->Total = $diff_heure;
                                                                $Heures_supp->save();

                                            }
                                            if($heure_debut >=0 && $heure_debut<=5 && $heure_fin>=5 && $heure_fin<=22 && $heure_fin>$heure_debut)/// debut dans le matin et fin dans le soir avec soir date de debut
                                            {

                                                $diff_heure =$heure_fin-$heure_debut;
                                                if(!isset($total_heure_latest)){
                                                $total_heure_latest =new StdClass;
                                                $total_heure_latest=0;
                                                    }

                                                            $nbre_taux_15   =0;
                                                            $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                                            $nbre_taux_40   =0 ;
                                                            $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                                            $nbre_taux_60   =$heure_fin-(5-$heure_debut);
                                                            $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                                            $nbre_taux_100  =  $diff_heure -  $nbre_taux_60 ;
                                                            $total_taux_100 = $total_taux_100 + $nbre_taux_100;

                                                            $total_heures_saisie = $total_taux_100+$nbre_taux_60+ $nbre_taux_40+ $nbre_taux_15 ;
                                                                            $Total  = $diff_heure;
                                                                            $Heures_supp->total_taux_15 =$total_taux_15;
                                                                            $Heures_supp->total_taux_40 =$total_taux_40;

                                                                            $Heures_supp->total_taux_60 =$total_taux_60;
                                                                            $Heures_supp->total_taux_100 =$total_taux_100;
                                                                            $Heures_supp->total_heures_saisie =$total_heures_saisie ;

                                                                            $Heures_supp->Total = $diff_heure;
                                                                            $Heures_supp->save();

                                        }



                                 }
/// fin jour ferie



                                            if($heure_debut >=0 && $heure_debut <=5  && $heure_fin>=0  && $heure_fin<=7   && $heure_fin>$heure_debut)/// si on est dans un jour ourable et on est le soir
                                            {

                                                $diff_heure =$heure_fin-$heure_debut;
                                                if(!isset($total_heure_latest)){
                                                $total_heure_latest =new StdClass;
                                                $total_heure_latest=0;
                                                    }

                                                            if($heure_fin<=5){
                                                                $nbre_taux_15=0;
                                                            }else{
                                                                $nbre_taux_15   = $heure_fin-$heure_debut-(5-$heure_debut);
                                                            }
                                                            $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                                            $nbre_taux_40   = 0;
                                                            $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                                            if($heure_fin<=5){$nbre_taux_60 = $heure_fin-$heure_debut;}else{$nbre_taux_60   = 5-$heure_debut;}
                                                            $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                                            $nbre_taux_100  = 0;
                                                            $total_taux_100 = $total_taux_100 + $nbre_taux_100;

                                                            $total_heures_saisie = $nbre_taux_15 + $nbre_taux_40 + $nbre_taux_60 + $nbre_taux_100;
                                                            $Total  =$total_heure_latest+$diff_heure;
                                                            $Heures_supp->total_taux_15 =$total_taux_15;
                                                            $Heures_supp->total_taux_40 =$total_taux_40;

                                                            $Heures_supp->total_taux_60 =$total_taux_60;
                                                            $Heures_supp->total_taux_100 =$total_taux_100;
                                                            $Heures_supp->total_heures_saisie =$total_heures_saisie ;

                                                            $Heures_supp->Total =$Total;
                                                            $Heures_supp->save();
                                                            if($heure_debut>5 && $heure_fin<=7)
                                                            {
                                                                if($total_heure_latest<=8)
                                                                {
                                                                $diff_heure =$heure_fin-$heure_debut;

                                                                $nbre_taux_15   = $diff_heure;
                                                                $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                                                $nbre_taux_40   = 0;
                                                                $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                                                $nbre_taux_60   = 0;
                                                                $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                                                $nbre_taux_100  = 0;
                                                                $total_taux_100 = $total_taux_100 + $nbre_taux_100;

                                                                $total_heures_saisie = $nbre_taux_15 + $nbre_taux_40 + $nbre_taux_60 + $nbre_taux_100;
                                                                $Total  =$total_heure_latest+$diff_heure;
                                                                $Heures_supp->total_taux_15 =$total_taux_15;
                                                                $Heures_supp->total_taux_40 =$total_taux_40;

                                                                $Heures_supp->total_taux_60 =$total_taux_60;
                                                                $Heures_supp->total_taux_100 =$total_taux_100;
                                                                $Heures_supp->total_heures_saisie =$total_heures_saisie ;

                                                                $Heures_supp->Total =$Total;
                                                                $Heures_supp->save();
                                                                }
                                                                else {
                                                                    $diff_heure =$heure_fin-$heure_debut;

                                                                    $nbre_taux_40   = $diff_heure;
                                                                    $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                                                    $nbre_taux_15   = 0;
                                                                    $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                                                    $nbre_taux_60   = 0;
                                                                    $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                                                    $nbre_taux_100  = 0;
                                                                    $total_taux_100 = $total_taux_100 + $nbre_taux_100;
                                                                    $total_heures_saisie = $nbre_taux_15 + $nbre_taux_40 + $nbre_taux_60 + $nbre_taux_100;
                                                                    $Total  =$total_heure_latest+$diff_heure;
                                                                    $Heures_supp->total_taux_15 =$total_taux_15;
                                                                    $Heures_supp->total_taux_40 =$total_taux_40;

                                                                    $Heures_supp->total_taux_60 =$total_taux_60;
                                                                    $Heures_supp->total_taux_100 =$total_taux_100;
                                                                    $Heures_supp->total_heures_saisie =$total_heures_saisie ;

                                                                    $Heures_supp->Total =$Total;
                                                                    $Heures_supp->save();
                                                                }
                                                            }
                                            }


				if($heure_debut>=5 && $heure_fin<=23 && $heure_fin>$heure_debut)/// si on est dans un jour ourable et on est le matin
				{
                                        $diff_heure =$heure_fin-$heure_debut;
                                        if(!isset($total_heure_latest)){
                                        $total_heure_latest =new StdClass;
                                        $total_heure_latest=0;
                                            }

                                            if($total_heure_latest<=8)
                                            {
                                            if (8-$total_heure_latest>= $diff_heure) {
                                                # code...
                                                $nbre_taux_15   = $diff_heure;
                                                $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                                $nbre_taux_40   = 0;
                                                $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                            }
                                            else {
                                                $nbre_taux_15   =  $diff_heure - (8-$total_heure_latest);
                                            $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                            $nbre_taux_40   = $diff_heure - $nbre_taux_15 ;
                                            $total_taux_40  = $total_taux_40 + $nbre_taux_40;
                                            }
                                                $nbre_taux_60   = 0;
                                                $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                                $nbre_taux_100  = 0;
                                                $total_taux_100 = $total_taux_100 + $nbre_taux_100;

                                                $total_heures_saisie = $nbre_taux_15 + $nbre_taux_40 + $nbre_taux_60 + $nbre_taux_100;
                                                $Total  +=$total_heure_latest+$diff_heure;

                                                $Heures_supp->total_taux_15 =$total_taux_15;
                                                $Heures_supp->total_taux_40 =$total_taux_40;
                                                $Heures_supp->total_heures_saisie =$total_heures_saisie;
                                                $Heures_supp->total_taux_60 =$total_taux_60;
                                                $Heures_supp->total_taux_100 =$total_taux_100;
                                                $Heures_supp->Total =$Total;
                                                $Heures_supp->save();
                                            }


                                        if($total_heure_latest>8)
                                        {


                                            if($heure_fin<=22 && $heure_fin>$heure_debut)
                                            {
                                                $nbre_taux_15   = 0;
                                                $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                                $nbre_taux_40   = $diff_heure;
                                                $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                                $nbre_taux_60   = 0;
                                                $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                                $nbre_taux_100  = 0;
                                                $total_taux_100 = $total_taux_100 + $nbre_taux_100;
                                                $total_heures_saisie = $nbre_taux_15 + $nbre_taux_40 + $nbre_taux_60 + $nbre_taux_100;
                                                $Total  =$total_heure_latest+$diff_heure;
                                                $Heures_supp->total_taux_15 =$total_taux_15;
                                                $Heures_supp->total_taux_40 =$total_taux_40;

                                                $Heures_supp->total_taux_60 =$total_taux_60;
                                                $Heures_supp->total_taux_100 =$total_taux_100;
                                                $Heures_supp->total_heures_saisie =$total_heures_saisie ;

                                                $Heures_supp->Total =$Total;
                                                $Heures_supp->save();
                                            }
                                            if($heure_fin=23 && $heure_fin>$heure_debut)
                                            {
                                                $nbre_taux_15   = 0;
                                                $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                                $nbre_taux_40   = $diff_heure -1;
                                                $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                                $nbre_taux_60   = 1;
                                                $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                                $nbre_taux_100  = 0;
                                                $total_taux_100 = $total_taux_100 + $nbre_taux_100;
                                                $total_heures_saisie = $nbre_taux_15 + $nbre_taux_40 + $nbre_taux_60 + $nbre_taux_100;
                                                $Total  =$total_heure_latest+$diff_heure;
                                                $Heures_supp->total_taux_15 =$total_taux_15;
                                                $Heures_supp->total_taux_40 =$total_taux_40;

                                                $Heures_supp->total_taux_60 =$total_taux_60;
                                                $Heures_supp->total_taux_100 =$total_taux_100;
                                                $Heures_supp->total_heures_saisie =$total_heures_saisie ;

                                                $Heures_supp->Total =$Total;
                                                $Heures_supp->save();
                                            }
                                        }

                                    /*if($heure_debut >=0 && $heure_fin<=5)
                                    {
                                        $diff_heure =$heure_fin-$heure_debut;

                                        $nbre_taux_15   = 0;
                                        $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                        $nbre_taux_40   = 0;
                                        $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                        $nbre_taux_60   = $diff_heure;
                                        $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                        $nbre_taux_100  = 0;
                                        $total_taux_100 = $total_taux_100 + $nbre_taux_100;

                                        $Total_Heures   = $nbre_taux_15 + $nbre_taux_40 + $nbre_taux_60 +$nbre_taux_100;
                                        $Total          = $Total + $Total_Heures;

                                        $req_select = $bdd->prepare("SELECT * FROM stocks_heures WHERE Date_Heures_Supp=? AND Agent_Matricule_Agent=?");
                                        $req_select->execute(array($date,$matricule));
                                        $nombre = $req_select->rowCount();

                                        if($nombre<1)
                                        {
                                            $req_insert = $bdd->prepare("INSERT INTO stocks_heures (Date_Heures_Supp,Total_HS,taux_15,taux_40,taux_60,taux_100,Agent_Matricule_Agent) VALUES (?,?,?,?,?,?,?)");
                                            $req_insert->execute(array($date,$Total_Heures,$nbre_taux_15,$nbre_taux_40,$nbre_taux_60,$nbre_taux_100,$matricule));
                                        }
                                    }*/



                                }



                if($heure_debut >=5 && $heure_debut<=22 && $heure_fin>=0 && $heure_fin<=5  && $heure_fin<$heure_debut)/// debut dans le matin et fin dans le soir  avec soir date de fin
				{

                    $diff_heure =(22-$heure_debut)+ (24+$heure_fin-22);
                    if(!isset($total_heure_latest)){
                    $total_heure_latest =new StdClass;
                    $total_heure_latest=0;
                        }
                        if($total_heure_latest<=8)
                        {

                                $nbre_taux_15   = 22 - $heure_debut;
                                $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                $nbre_taux_40   =0 ;
                                $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                $nbre_taux_60   = 24+$heure_fin - 22;
                                $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                $nbre_taux_100  = 0;
                                $total_taux_100 = $total_taux_100 + $nbre_taux_100;

                                $total_heures_saisie = $total_taux_100+$nbre_taux_60+ $nbre_taux_40+ $nbre_taux_15 ;
                                                $Total  = $diff_heure;
                                                $Heures_supp->total_taux_15 =$total_taux_15;
                                                $Heures_supp->total_taux_40 =$total_taux_40;

                                                $Heures_supp->total_taux_60 =$total_taux_60;
                                                $Heures_supp->total_taux_100 =$total_taux_100;
                                                $Heures_supp->total_heures_saisie =$total_heures_saisie ;

                                                $Heures_supp->Total = $diff_heure;
                                                $Heures_supp->save();
                            }
                            if($total_heure_latest>8)
                            {
                                    $nbre_taux_15   = 0;
                                    $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                    $nbre_taux_40   =22 - $heure_debut;
                                    $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                    $nbre_taux_60   =(24+$heure_fin) - $heure_debut;
                                    $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                    $nbre_taux_100  = 0;
                                    $total_taux_100 = $total_taux_100 + $nbre_taux_100;

                                    $total_heures_saisie = $nbre_taux_15 + $nbre_taux_40 + $nbre_taux_60 + $nbre_taux_100;
                                    $Total  =$total_heure_latest+$diff_heure;
                                    $Heures_supp->total_taux_15 =$total_taux_15;
                                    $Heures_supp->total_taux_40 =$total_taux_40;

                                    $Heures_supp->total_taux_60 =$total_taux_60;
                                    $Heures_supp->total_taux_100 =$total_taux_100;
                                    $Heures_supp->total_heures_saisie =$total_heures_saisie ;

                                    $Heures_supp->Total =$Total;
                                    $Heures_supp->save();
                                }
                }

                if($heure_debut >=0 && $heure_debut<=5 && $heure_fin>=5 && $heure_fin<=22 && $heure_fin>$heure_debut)/// debut dans le matin et fin dans le soir avec soir date de debut
				{

                    $diff_heure =$heure_fin-$heure_debut;
                    if(!isset($total_heure_latest)){
                    $total_heure_latest =new StdClass;
                    $total_heure_latest=0;
                        }
                        if($total_heure_latest<=8)
                        {

                                $nbre_taux_15   = $heure_fin-(5-$heure_debut);
                                $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                $nbre_taux_40   =0 ;
                                $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                $nbre_taux_60   =  $diff_heure -  $nbre_taux_15 ;
                                $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                $nbre_taux_100  = 0;
                                $total_taux_100 = $total_taux_100 + $nbre_taux_100;

                                $total_heures_saisie = $total_taux_100+$nbre_taux_60+ $nbre_taux_40+ $nbre_taux_15 ;
                                                $Total  = $diff_heure;
                                                $Heures_supp->total_taux_15 =$total_taux_15;
                                                $Heures_supp->total_taux_40 =$total_taux_40;

                                                $Heures_supp->total_taux_60 =$total_taux_60;
                                                $Heures_supp->total_taux_100 =$total_taux_100;
                                                $Heures_supp->total_heures_saisie =$total_heures_saisie ;

                                                $Heures_supp->Total = $diff_heure;
                                                $Heures_supp->save();
                            }
                            if($total_heure_latest>8)
                            {
                                $nbre_taux_15   =0;
                                $total_taux_15  = $total_taux_15 + $nbre_taux_15;

                                $nbre_taux_40   =$heure_fin-(5-$heure_debut) ;
                                $total_taux_40  = $total_taux_40 + $nbre_taux_40;

                                $nbre_taux_60   =  $diff_heure -  $nbre_taux_15 ;
                                $total_taux_60  = $total_taux_60 + $nbre_taux_60;

                                $nbre_taux_100  = 0;
                                $total_taux_100 = $total_taux_100 + $nbre_taux_100;

                                $total_heures_saisie = $total_taux_100+$nbre_taux_60+ $nbre_taux_40+ $nbre_taux_15 ;
                                                $Total  = $diff_heure;
                                                $Heures_supp->total_taux_15 =$total_taux_15;
                                                $Heures_supp->total_taux_40 =$total_taux_40;

                                                $Heures_supp->total_taux_60 =$total_taux_60;
                                                $Heures_supp->total_taux_100 =$total_taux_100;
                                                $Heures_supp->total_heures_saisie =$total_heures_saisie ;

                                                $Heures_supp->Total = $diff_heure;
                                                $Heures_supp->save();
                }
            }





            return back()
            ->with('success','Heure supplémentaire enregistrée!')
            ->withInput();

        }
}
