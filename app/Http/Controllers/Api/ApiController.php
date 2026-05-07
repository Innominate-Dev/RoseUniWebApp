<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Module;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function awards()
    {
        return response()->json(Award::with('modules')->get());
    }

    public function modules()
    {
        return response()->json(Module::with('assignments')->get());
    }
}
