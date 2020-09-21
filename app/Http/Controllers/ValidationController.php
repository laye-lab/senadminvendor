<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
class ValidationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {
        $service=DB::table('affectation')
            ->join('agent','agent.Matricule_Agent','=','affectation.agentMatricule_Agent')
            ->select('Matricule_agent','Nom_Agent','Fonction','Statut','Libelle_Affectation','Direction','Etablissemt_nom')
            ->distinct('Matricule_agent')
            ->get();

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
            ->select('agent.Matricule_agent','Nom_Agent','n_plus_un','Statut','Direction','etablissement')
            ->get();
            $equipe=DB::table('equipe')
            ->get();

            $heure_supp=DB::table('heures_supp')
            ->get();
            $nbr_heure=DB::table('Heures_supp_a_faire')
            ->join('agent_Heures_supp_a_faire','agent_Heures_supp_a_faire.Heures_supp_a_faireID','=','Heures_supp_a_faire.ID')
            ->join('heures_supp','heures_supp.id_heure_a_faire','=','Heures_supp_a_faire.ID')
            ->get();
            $heurre_a_faire=DB::table('agent_Heures_supp_a_faire')
            ->join('agent','agent.Matricule_Agent','=','agent_Heures_supp_a_faire.agentMatricule_Agent')
            ->join('heures_supp','heures_supp.id_heure_a_faire','=','agent_Heures_supp_a_faire.Heures_supp_a_faireID')
            ->select('agent.Matricule_agent','Nom_Agent','Etablissement','Date_Heure','heure_debut','heure_fin','travaux_effectuer','observations','heures_supp.id','heures_supp.Statut','id_heure_a_faire')
            ->get();

            return view('Validation')->with([
                'role_account'=> $role_account,
                'agent_attribut'=> $agent_attribut,
                'nbr_heure'=> $nbr_heure,
                'heure_supp'=> $heure_supp,
                'heurre_a_faire'=>$heurre_a_faire,
                'equipe'=>$equipe,
                'service'=>$service


            ]);;


    }
    public function store(Request $request)
    {
        $role=request('role');
        $id=request('id');
        switch ($role){
            case 'n+1':
        $Heures_supp=DB::table('heures_supp')
        ->where('commandeur', '=', $id )
        ->update(['Statut' => 2]);

        return back();
          break;
        case 'n+2':
            $etablissement=request('etablissement');
            if ($etablissement == 'Hann') {
                $Heures_supp=DB::table('heures_supp')
                ->where('commandeur', '=', $id )
                ->update(['Statut' => 4]);


            }
            else {
                $Heures_supp=DB::table('heures_supp')
                ->where('commandeur', '=', $id )
                ->update(['Statut' => 3]);


            }

        return back()->with('success','Toutes les heure Supplémentaire sont maintenant validées ');
              break;
        case 'n+3' or 'dcm' or 'dto' :
            $Heures_supp=DB::table('heures_supp')
            ->where('Statut', '=',3)
            ->update(['Statut' => 4]);


            return back();
              break;

        }

    }
    public function Invalideur(Request $request)
    {
        $role=request('role');
        $id=request('id');
        switch ($role){

        case 'n+2':
                $Heures_supp=DB::table('heures_supp')
                ->where('id_heure_a_faire', '=', $id )
                ->update(['Statut' => 1]);


        return back()->with('success','Toutes les heure Supplémentaire sont maintenant validées ');
              break;
        }

    }
}
