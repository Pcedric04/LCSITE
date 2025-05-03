<?php


namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\flashinfos;
use App\Models\Infos;
use App\Models\InfosFlash;
use App\Models\posts;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use Yajra\DataTables\DataTables;

class dashboardController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->where('roles.name','=','superadministrateur')
            ->get();
        $usersall = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->get();
        $articles = posts::get();
        $flash = flashinfos::get();
        $countArticles = $articles->count();
        $countUser = $usersall->count();
        $countFlash = $flash->count();
        $visitorCount = DB::table('posts')->sum('visits');

         // Get the range of months for the legend
        $startMonth = 1; // January
        $endMonth = 12; // December
        $labels = [];

        for ($month = $startMonth; $month <= $endMonth; $month++) {
            $labels[] = Carbon::create()->month($month)->format('F');
        }

        // Retrieve the data for each month
        $monthlyData = posts::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(visits) as total_amount')
        )
        ->groupBy('month')
        ->get();

        $data = [];

        foreach ($monthlyData as $month) {
            $data[$month->month - 1] = $month->total_amount;
        }

        // Fill in missing data with 0
        $data = array_replace(array_fill(0, 12, 0), $data);





         // Get the range of years for the legend
         $startYear = 2023;
         $endYear = Carbon::now()->year;
         $years = range($startYear, $endYear);

         // Retrieve the data for each year
         $yearlyData = posts::select(
             DB::raw('YEAR(created_at) as year'),
             DB::raw('SUM(visits) as total_amount')
         )
         ->groupBy('year')
         ->orderBy('year')
         ->get();

         $labelsYear = [];
         $dataYear = [];

         foreach ($yearlyData as $year) {
             $labelsYear[] = $year->year;
             $dataYear[] = $year->total_amount;
         }

         // Fill in missing years with 0
         $missingYears = array_diff($years, $labelsYear);
         foreach ($missingYears as $missingYear) {
             $labelsYear[] = $missingYear;
             $dataYear[] = 0;
         }
         $photo = DB::table('photosprofils')->where('users_id',Auth::user()->id)->first();
         if ($photo != null) {
            $photo = $photo->titre;
         } else {
            $photo = 'avatar.png';
         }

        return view('backoffice.body.accueil.accueil',compact('photo','labelsYear','dataYear','countUser','countArticles','countFlash','visitorCount','labels','data'));
    }

}
