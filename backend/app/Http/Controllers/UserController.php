<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexUserRequest $request)
    {
        dd('test');
//        $this->authorize('viewAny', User::class);
//
//        $users = User::applyFilters($request)
//            ->pagination();
//
//        return \Response::api($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $this->authorize('store', User::class);

        $user = User::create($request->validated());

        return \Response::success(__('User created successfully'), [
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        return \Response::success(__('User retrieved successfully'), [
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function profile(Request $request)
    {
        $this->authorize('view', $request->user());

        return \Response::api([
            'user' => $request->user()
        ], __('User retrieved successfully'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->validated());

        return \Response::success(__('User updated successfully.'), [
            'user' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return \Response::success(__('User deleted successfully.'));
    }
}
