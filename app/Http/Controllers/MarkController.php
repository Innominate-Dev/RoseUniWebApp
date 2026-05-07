<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Assignment;
use App\Http\Requests\StoreMarkRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->load('award.modules.assignments.marks');

        return view('pages.marks', compact('user'));
    }

    public function store(StoreMarkRequest $request)
    {
        DB::transaction(function () use ($request) {
            Mark::updateOrCreate(
                [
                    'user_id'       => Auth::id(),
                    'assignment_id' => $request->assignment_id,
                ],
                [
                    'mark' => $request->mark,
                ]
            );
        });

        return redirect()->route('marks.index')->with('success', 'Mark saved successfully');
    }
}