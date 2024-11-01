<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws AuthorizationException
     */
    public function index(): JsonResponse
    {
        $locations = Location::all();

        return \Response::api($locations);
    }
}
