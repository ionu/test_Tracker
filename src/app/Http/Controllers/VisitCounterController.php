<?php

namespace App\Http\Controllers;

use App\Models\Visits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VisitCounterController extends Controller
{
    public function add(Request $request): void
    {
        (new \App\Models\Visits)->addVisit([
            'user_id' => $request->user_id,
            'url' => $request->url
        ]);
    }
}
