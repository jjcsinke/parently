<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Resources\SchoolCollection;
use App\Http\Resources\SchoolResource;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): SchoolCollection
    {
        $user = Auth::user();
        $schools = School::with('city')->withCount('children')
            ->when($user->type === UserType::Parent,
                fn($q) => $q->whereHas('children',
                    fn($c) => $c->whereIn('id', $user->children()->pluck('id')->all())))
            ->paginate(request('per_page',10));

        return SchoolCollection::make($schools);
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
    public function show(School $school): SchoolResource
    {
        return SchoolResource::make($school);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        //
    }
}
