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
        $service=DB::table('Affectation')
            ->join('agent','agent.Matricule_Agent','=','affectation.agentMatricule_Agent')
            ->join('Direction','Direction.agentMatricule_Agent','=','affectation.agentMatricule_Agent')
            ->join('Fonction','Fonction.agentMatricule_Agent','=','affectation.agentMatricule_Agent')
            ->select('Matricule_agent','Nom_Agent','Libelle_Fonction','Statut','Libelle_Affectation','Direction','Etablissemt_nom')
            ->distinct('Matricule_agent')
            ->get();
        $role_account=DB::table('Role_Account')
        ->join('users','users.id' ,'=', 'Role_Account.AccountID')
        ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
        ->join('agent','agent.Matricule_Agent' ,'=','users.id')
        ->join('Etablissement','Etablissement.agentMatricule_Agent','=','agent.Matricule_Agent')
        ->join('Direction','Direction.agentMatricule_Agent','=','agent.Matricule_Agent')
        ->join('Service','Service.agentMatricule_Agent','=','agent.Matricule_Agent')
        ->join('Fonction','Fonction.agentMatricule_Agent','=','agent.Matricule_Agent')
        ->select('Matricule_agent','Libelle_Fonction','Statut','Direction','Role.Nom','Nom_Agent','Etablissement.nom')
        ->get();
            $agent_attribut=DB::table('agent')
            ->join('Etablissement','Etablissement.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Direction','Direction.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('equipe','equipe.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('affectation','affectation.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Service','Service.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('Fonction','Fonction.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->join('agent_Heures_supp_a_faire','agent_Heures_supp_a_faire.agentMatricule_Agent','=','agent.Matricule_Agent')
            ->distinct('Matricule_Agent')
            ->select('agent.Matricule_agent','Nom_Agent','n_plus_un','Libelle_Fonction','agent.Statut','Libelle_Affectation',
            'Direction','nom')
            ->get();
            $heure_supp=DB::table('heures_supp')
            ->get();
            $nbr_heure=DB::table('Heures_supp_a_faire')
            ->join('agent_Heures_supp_a_faire','agent_Heures_supp_a_faire.Heures_supp_a_faireID','=','Heures_supp_a_faire.ID')
            ->join('heures_supp','heures_supp.id_heure_a_faire','=','Heures_supp_a_faire.ID')
            ->get();
            $heurre_a_faire=DB::table('agent_Heures_supp_a_faire')
            ->join('agent','agent.Matricule_Agent','=','agent_Heures_supp_a_faire.agentMatricule_Agent')
            ->join('Etablissement','Etablissement.agentMatricule_Agent','=','agent_Heures_supp_a_faire.agentMatricule_Agent')
            ->join('heures_supp','heures_supp.id_heure_a_faire','=','agent_Heures_supp_a_faire.Heures_supp_a_faireID')
            ->select('agent.Matricule_agent','Nom_Agent','Etablissement.nom','Date_Heure','heure_debut','heure_fin','travaux_effectuer','observations','heures_supp.Statut','id_heure_a_faire')
            ->get();

            return view('Validation')->with([
                'role_account'=> $role_account,
                'agent_attribut'=> $agent_attribut,
                'nbr_heure'=> $nbr_heure,
                'heure_supp'=> $heure_supp,
                'heurre_a_faire'=>$heurre_a_faire,
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
        ->where('id_heure_a_faire', '=', $id )
        ->update(['Statut' => 2]);

        $Step=DB::table('Step')
        ->where('Heures_supp_a_faireID', '=', $id )
        ->update(['etape' => 2]);
        return back();
          break;
        case 'n+2':
            $etablissement=request('etablissement');
            if ($etablissement == 'Hann') {
                $Heures_supp=DB::table('heures_supp')
                ->where('id_heure_a_faire', '=', $id )
                ->update(['Statut' => 4]);
        
                $Step=DB::table('Step')
                ->where('Heures_supp_a_faireID', '=', $id )
                ->update(['etape' => 4]);
            }
            else {
                $Heures_supp=DB::table('heures_supp')
                ->where('id_heure_a_faire', '=', $id )
                ->update(['Statut' => 3]);
        
                $Step=DB::table('Step')
                ->where('Heures_supp_a_faireID', '=', $id )
                ->update(['etape' => 3]);
            }
          
        return back();
              break;
        case 'n+3':
            $Heures_supp=DB::table('heures_supp')
            ->where('id_heure_a_faire', '=', $id )
            ->update(['Statut' => 4]);
    
            $Step=DB::table('Step')
            ->where('Heures_supp_a_faireID', '=', $id )
            ->update(['etape' => 4]);
            return back();
              break;    
           
        }

    }
}