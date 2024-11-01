<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexLocationRequest;
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
    public function index(IndexLocationRequest $request): JsonResponse
    {
        $locations = Location::applyFilters($request)->get();

        return \Response::api($locations);
    }
}
