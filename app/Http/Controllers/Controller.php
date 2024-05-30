<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use ValidatesRequests;

    public function app()
    {
        $user = Auth::user();

        return view('app', ['user' => $user]);
    }

    public function menu(): JsonResponse
    {
        $menu = match (Auth::user()?->type) {
            UserType::Admin => $this->adminMenu(),
            UserType::Parent => $this->parentMenu(),
            default => []
        };
        return response()->json([
            'data' => $menu
        ]);
    }

    private function adminMenu(): array
    {
        return [
            [
                'route' => 'dashboard',
                'exact' => true,
                'icon' => 'mdi-view-dashboard'
            ],
            [
                'route' => 'cities',
                'icon' => 'mdi-city'
            ],
            [
                'route' => 'schools',
                'icon' => 'mdi-school',
            ],
            [
                'route' => 'parents',
                'icon' => 'mdi-account-child'
            ],
            [
                'route' => 'children',
                'icon' => 'mdi-human-child'
            ]
        ];
    }

    private function parentMenu(): array
    {
        return [
            [
                'route' => 'dashboard',
                'exact' => true,
                'icon' => 'mdi-view-dashboard'
            ],
            [
                'route' => 'schools',
                'icon' => 'mdi-school',
            ],
            [
                'route' => 'children',
                'icon' => 'mdi-human-child'
            ]
        ];

    }
}
