<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): UserCollection
    {
        $parents = User::whereType(UserType::Parent)->paginate();

        return UserCollection::make($parents);
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
    public function show(Parent $parent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parent $parent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parent $parent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parent $parent)
    {
        //
    }
}
