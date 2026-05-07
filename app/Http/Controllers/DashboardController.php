<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Award;
use App\Services\ClassificationService;

class DashboardController extends Controller
{
    protected ClassificationService $service;

    public function __construct(ClassificationService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $user = Auth::user();
        $user->load('award.modules.assignments.marks');

        return view('dashboard', [
            'user'   => $user,
            'awards' => Award::all(),
        ]);
    }

    public function selectAward(Request $request)
    {
        $request->validate(['award_id' => 'required|exists:awards,id']);
        Auth::user()->update(['award_id' => $request->award_id]);
        return redirect()->route('dashboard');
    }

    public function predict(Request $request)
    {
        $request->validate([
            'predictions.*' => 'numeric|min:0|max:100'
        ]);

        $user = Auth::user();
        $user->load('award.modules');

        $level5 = [];
        $level6 = [];

        foreach ($user->award->modules as $module) {
            $val = (float) ($request->predictions[$module->id] ?? 0);
            if ($val > 0) {
                $module->module_level === 5 ? $level5[] = $val : $level6[] = $val;
            }
        }

        $l5Avg = !empty($level5) ? array_sum($level5) / count($level5) : 0.0;
        $l6Avg = !empty($level6) ? array_sum($level6) / count($level6) : 0.0;

        $prediction = $this->service->predictClassification($l5Avg, $l6Avg);

        return back()->with('prediction', $prediction);
    }
}