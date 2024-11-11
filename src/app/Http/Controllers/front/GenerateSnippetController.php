<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Visits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GenerateSnippetController extends Controller
{
    public function index(int $id): View
    {
        return view('front.snippet', [
            'user_id' => $id,
        ]);
    }
}
