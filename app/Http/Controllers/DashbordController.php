<?php

namespace App\Http\Controllers;
use App\Charts\UserChart;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
class DashbordController extends Controller
{
    public function index(Request $request)
    {


        $users=User::all();
        if (null != request('mois')){

            $mois=request('mois');
            $etablissement_janvier=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 1)->sum('total_heures_saisie');
            $etablissement_fevrier=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 2)->sum('total_heures_saisie');
            $etablissement_mars=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 3)->sum('total_heures_saisie');
            $etablissement_avril=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 4)->sum('total_heures_saisie');
            $etablissement_mai=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 5)->sum('total_heures_saisie');
            $etablissement_juin=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 6)->sum('total_heures_saisie');
            $etablissement_juillet=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 7)->sum('total_heures_saisie');
            $etablissement_aout=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 8)->sum('total_heures_saisie');
            $etablissement_septembre=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 9)->sum('total_heures_saisie');
            $etablissement_octobre=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 10)->sum('total_heures_saisie');
            $etablissement_novembre=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 11)->sum('total_heures_saisie');
            $etablissement_decembre=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
            ->where('Etablissement', '=',  $mois)->whereMonth('Date_Heure', '=', 12)->sum('total_heures_saisie');
        }else {
            $mois=0;
            $etablissement=0;
            $etablissement_janvier=0;
            $etablissement_fevrier=0;
            $etablissement_mars=0;
            $etablissement_avril=0;
            $etablissement_mai=0;
            $etablissement_juin=0;
            $etablissement_juillet=0;
            $etablissement_aout=0;
            $etablissement_septembre=0;
            $etablissement_octobre=0;
            $etablissement_novembre=0;
            $etablissement_decembre=0;
            $total_taux_15_month=0;
            $total_taux_40_month=0;
            $total_taux_60_month=0;
            $total_taux_100_month=0;
        }


        $data = DB::table('heures_supp')
        ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
        ->select
            (
            DB::raw('SUM(total_taux_15) as sum15'),
            DB::raw('SUM(total_taux_40) as sum40'),
            DB::raw('SUM(total_taux_60) as sum60'),
            DB::raw('SUM(total_taux_100) as sum100'),
            DB::raw('SUM(total_heures_saisie) as total'),
            DB::raw('Affectation as Affectations'),
            )
            ->groupBy('Affectations')
            ->get();
            $data_drh= DB::table('heures_supp')
            ->join('agent','agent.Matricule_Agent' ,'=','Agent_Matricule_Agent')
            ->select(
                DB::raw('YEAR(Date_Heure) as year'),
                DB::raw('MONTH(Date_Heure) as month'),
                DB::raw('SUM(total_taux_15) as sum15'),
                DB::raw('SUM(total_taux_40) as sum40'),
                DB::raw('SUM(total_taux_60) as sum60'),
                DB::raw('SUM(total_taux_100) as sum100'),
                DB::raw('Nom_Agent as Nom'),
                DB::raw('SUM(total_heures_saisie) as total'),
                DB::raw('(Agent_Matricule_Agent) as agent'),
                DB::raw('(heures_supp.Statut) as statut'))
               ->groupBy('year','month','agent','statut')
               ->get();

        $user=auth()->user()->id;
        $current_month = date('m');
        $current_year = date("Y");

        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];

        $etablissement_dr =DB::table('agent')->select('etablissement')->where('Matricule_Agent', '=',  $user)->first();
        $total_current_month =DB::table('heures_supp')->select('total_heures_saisie')
        ->whereMonth('Date_Heure', '=',$current_month)->sum('total_heures_saisie');

        $total_current_month_dr=DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
        ->where('Etablissement', '=',$etablissement_dr->etablissement)->whereMonth('Date_Heure', '=',$current_month)->sum('total_heures_saisie');


        $total_current_year =DB::table('heures_supp')->select('total_heures_saisie')
        ->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');

        $total_current_year_dr =DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')
        ->where('Etablissement', '=',$etablissement_dr->etablissement)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');


        $total_taux_15_year =DB::table('heures_supp')->select('total_taux_15')->whereYear('Date_Heure', '=',$current_year)->sum('total_taux_15');
        $total_taux_40_year =DB::table('heures_supp')->select('total_taux_40')->whereYear('Date_Heure', '=',$current_year)->sum('total_taux_40');
        $total_taux_60_year =DB::table('heures_supp')->select('total_taux_60')->whereYear('Date_Heure', '=',$current_year)->sum('total_taux_60');
        $total_taux_100_year =DB::table('heures_supp')->select('total_taux_100')->whereYear('Date_Heure', '=',$current_year)->sum('total_taux_100');

        $total_taux_15_month =DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')->where('Etablissement', '=',  $mois)->whereYear('Date_Heure', '=',$current_year)->sum('total_taux_15');
        $total_taux_40_month =DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')->where('Etablissement', '=',  $mois)->whereYear('Date_Heure', '=',$current_year)->sum('total_taux_40');
        $total_taux_60_month =DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')->where('Etablissement', '=',  $mois)->whereYear('Date_Heure', '=',$current_year)->sum('total_taux_60');
        $total_taux_100_month =DB::table('heures_supp')->join('agent','agent.Matricule_Agent' ,'=','heures_supp.Agent_Matricule_Agent')->where('Etablissement', '=',  $mois)->whereYear('Date_Heure', '=',$current_year)->sum('total_taux_100');





        $Janvier=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 1)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');

        $Fevrier=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 2)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');

        $Mars=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 3)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');

        $Avril=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 4)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');

        $Mai=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 5)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');

        $Juin=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 6)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');

        $Juillet=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 7)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');

        $Aout=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 8)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');

        $Septembre=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 9)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');

        $Octobre=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 10)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');

        $Novembre=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 11)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');

        $Decembre=DB::table('heures_supp')->select('total_heures_saisie')->whereMonth('Date_Heure', '=', 12)->whereYear('Date_Heure', '=',$current_year)->sum('total_heures_saisie');



        $usersChartband = new UserChart;
        $usersChartband->labels(['15%', '40%', '60%','100%']);
        $usersChartband->dataset('', 'bar', [$total_taux_15_year,$total_taux_40_year,$total_taux_60_year,$total_taux_100_year])
            ->color($borderColors)
            ->backgroundcolor($fillColors);

            $usersChartbandetablissement = new UserChart;
            $usersChartbandetablissement ->labels(['taux 15%', 'taux 40%', 'taux 60%','taux 100%']);
            $usersChartbandetablissement ->dataset('', 'bar', [$total_taux_15_month,$total_taux_40_month,$total_taux_60_month,$total_taux_100_month])
                ->color($borderColors)
                ->backgroundcolor($fillColors);



        $usersChart = new UserChart;
        $usersChart->labels(['Janvier', 'Fevrier', 'Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre']);
        $usersChart->dataset('Total heure Supplémentaire par mois', 'line', [ $Janvier, $Fevrier, $Mars,$Avril,$Mai,$Juin,$Juillet,$Aout,$Septembre,$Octobre,$Novembre,$Decembre])
        ->color("rgb(15, 50,192)")
        ->backgroundcolor("rgb(94, 219, 23)");;

        $usersChartMois = new UserChart;
        $usersChartMois->labels(['Janvier', 'Fevrier', 'Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre']);
        $usersChartMois->dataset('Total heure Supplémentaire par mois pour Etablissement '.$mois, 'line', [$etablissement_janvier, $etablissement_fevrier, $etablissement_mars,$etablissement_avril,$etablissement_mai,$etablissement_juin
        ,$etablissement_juillet,$etablissement_aout,$etablissement_septembre,$etablissement_octobre,$etablissement_novembre,$etablissement_decembre])
        ->color( "rgb(94, 219, 23)" )
        ->backgroundcolor("rgb(15, 50,192)");;

        $role_account=DB::table('Role_Account')
        ->join('users','users.id' ,'=', 'Role_Account.AccountID')
        ->join('Role','Role.ID' ,'=','Role_Account.RoleID')
        ->join('agent','agent.Matricule_Agent' ,'=','users.id')
        ->select('Matricule_agent','Role.Nom','Nom_Agent')
        ->get();


        return view('Dashbord')->with([
                'users'=>$users,
                'usersChart' => $usersChart,
                'usersChartMois' => $usersChartMois,
                'usersChartband' =>$usersChartband,
                'usersChartbandetablissement' => $usersChartbandetablissement,
                'mois' => $mois,
                'data' => $data,
                'data_drh' => $data_drh,
                'total_current_month' =>  $total_current_month,
                'total_current_month_dr' =>  $total_current_month_dr,
                'total_current_year' =>  $total_current_year,
                'total_current_year_dr' =>  $total_current_year_dr,
                'role_account'=>$role_account]);
}
}
