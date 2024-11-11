<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Resources\VisitsResource;
use App\Models\Visits;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Psy\Util\Json;

class VisitsController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        $hits = Visits::withWhereHas('user', function ($query) {
            $query->where(Auth::user()->getKeyName(), '=', Auth::user()->id);
        })->get();
        return view('visitors.index', [
            'visits' => $hits,
        ]);
    }

    /**
     * list the alert subscriptions
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function listVisits(Request $request): AnonymousResourceCollection
    {
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $visits = (new \App\Models\Visits)->getVisitsByDate($startDate, $endDate, Auth::user()->id);

        return VisitsResource::collection($visits);
    }
}
