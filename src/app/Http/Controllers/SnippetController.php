<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SnippetController extends Controller
{

    /**
     * Display the user's snippet.
     */
    public function trackingSnippet(Request $request): View
    {
        return view('visitors.tracking_snippet', []);
    }
}
