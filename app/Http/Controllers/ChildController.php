<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChildCollection;
use App\Http\Resources\ChildResource;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildController extends Controller
{
    public function index(): ChildCollection
    {
        $children = Auth::user()?->children()->with('school')->get();
        return ChildCollection::make($children);
    }

    public function show(Child $child): ChildResource
    {
        $child->load('school');
        return ChildResource::make($child);
    }
}
