<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function app()
    {
        $user = Auth::user();

        return view('app', ['user' => $user]);
    }

    public function menu(): JsonResponse
    {
        return response()->json([
            'data' => [
                [
                    'name' => __('Schools'),
                    'route' => 'schools'
                ],
                [
                    'name' => __('Parents'),
                    'route' => 'parents'
                ],
                [
                    'name' => __('Children'),
                    'route' => 'children'
                ]
            ]
        ]);
    }
}
