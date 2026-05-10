<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Http\Requests\StoreMarkRequest;
use App\Services\ClassificationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MarkController extends Controller
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
        $marksNeeded = [];

        foreach ($user->award->modules ?? [] as $module) {
            $currentWeighted = 0;
            $remainingWeight = 0;

            foreach ($module->assignments as $assignment) {
                $mark = $assignment->marks->where('user_id', $user->id)->first();
                $mark
                    ? $currentWeighted += $mark->mark * ($assignment->weighting / 100)
                    : $remainingWeight += $assignment->weighting;
            }

            $marksNeeded[$module->id] = $this->service->marksNeededForGrade($currentWeighted, $remainingWeight);
        }

        return view('pages.marks', compact('user', 'marksNeeded'));
    }

    public function store(StoreMarkRequest $request)
    {
        // Adding exceptions to protect the DB if it fails
        try {
            DB::transaction(function() {
            throw new \Exception('Simulated DB failure'); // add this temporarily
            });

            return redirect()->route('marks.index')->with('success', 'Mark saved!');

        } catch (\Exception $e) {
            Log::error('Mark save failed: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}