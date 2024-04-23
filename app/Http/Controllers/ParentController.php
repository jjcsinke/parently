<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): UserCollection
    {
        $parents = User::withCount('children')->whereType(UserType::Parent)->paginate(request('per_page',10));

        return UserCollection::make($parents)->additional(['request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $parent): UserResource
    {
        $parent->load('children');
        return UserResource::make($parent);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $parent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $parent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $parent)
    {
        //
    }
}
