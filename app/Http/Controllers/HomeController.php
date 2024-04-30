<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('app');
    }

    public function getPageContent(Request $request, string $page)
    {
        $page = str_replace('..', '', $page);

        $data = Cache::remember("page_$page", 300, function() use ($page) {
            if (!Storage::disk('pages')->exists('/en/' . $page . '.json')) {
                abort(404);
            }
            return json_decode(Storage::disk('pages')->get('/en/' . $page . '.json'));
        });

        return response()->json([
            'data' => $data
        ]);
    }
}
