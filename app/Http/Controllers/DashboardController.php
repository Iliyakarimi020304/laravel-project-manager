<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $totalTasks = Task::count();

        $tasksByStatus = Task::select('status')
            ->selectRaw('count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        $overdueTasks = Task::where('due_date', '<', Carbon::today())
            ->where('status', '!=', 'done')
            ->orderBy('due_date', 'asc')
            ->with('project')
            ->get();

        return view('dashboard', compact(
            'totalProjects',
            'totalTasks',
            'tasksByStatus',
            'overdueTasks'
        ));
    }
}
