<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Resources\ChildCollection;
use App\Http\Resources\ChildResource;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildController extends Controller
{
    public function index(): ChildCollection
    {
        $user = Auth::user();

        if ($user->type === UserType::Admin) {
            $children = Child::with('school')->paginate(request('per_page',10));
        } else {
            $children = Auth::user()?->children()->with('school')->paginate(request('per_page',10));
        }
        return ChildCollection::make($children);
    }

    public function show(Child $child): ChildResource
    {
        $child->load('school');
        return ChildResource::make($child);
    }
}
