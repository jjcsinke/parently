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
    use AuthorizesRequests, ValidatesRequests;

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
                'name' => __('Dashboard'),
                'route' => 'portal',
                'exact' => true,
                'icon' => 'mdi-view-dashboard'
            ],
            [
                'name' => __('Cities'),
                'route' => 'cities',
                'icon' => 'mdi-city'
            ],
            [
                'name' => __('Schools'),
                'route' => 'schools',
                'icon' => 'mdi-school',
            ],
            [
                'name' => __('Parents'),
                'route' => 'parents',
                'icon' => 'mdi-account-child'
            ],
            [
                'name' => __('Children'),
                'route' => 'children',
                'icon' => 'mdi-human-child'
            ]
        ];

    }

    private function parentMenu(): array
    {
        return [
            [
                'name' => __('Dashboard'),
                'route' => 'portal',
                'exact' => true,
                'icon' => 'mdi-view-dashboard'
            ],
            [
                'name' => __('Schools'),
                'route' => 'schools',
                'icon' => 'mdi-school',
            ],
            [
                'name' => __('Children'),
                'route' => 'children',
                'icon' => 'mdi-human-child'
            ]
        ];

    }
}
