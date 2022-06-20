<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Upload;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalUploads = Upload::count();
        $totalReports = Report::count();
        $totalDownloads = Upload::sum('downloads');

        $responseUploads = array();
        $reportStats = array();
        $i = 0;
        while ($i <= 14) {
            $today = Carbon::today();
            $dayOfWeek = $today->subDays($i);

            $uploads = Upload::where(
                DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'),
                '=',
                Carbon::parse($dayOfWeek)->format('Y-m-d')
            )->get();

            $report = Report::where(
                DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'),
                '=',
                Carbon::parse($dayOfWeek)->format('Y-m-d')
            )->get();

            $responseUploads[$i] = $uploads->count();
            $reportStats[$i] = $report->count();
            $i++;
        }

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalUploads' => $totalUploads,
            'totalReports' => $totalReports,
            'totalDownloads' => $totalDownloads,
            'uploadStats' => $responseUploads,
            'reportStats' => $reportStats
        ]);
    }
}
