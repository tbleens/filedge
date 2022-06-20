<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;

class ReportsController extends Controller
{
    public function list()
    {
        $reports = Report::get();
        return view('admin.reports.list', [
            'reports' => $reports
        ]);
    }


    public function delete($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('reports.list')->with('success', 'Your report has been removed.');
    }
}
