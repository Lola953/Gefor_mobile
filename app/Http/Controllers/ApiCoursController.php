<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApiCoursController extends Controller
{
    public function index()
        {
            $response = Http::baseUrl(config('services.api.url'))
                            ->acceptJson()
                            ->get('/cours');

            if ($response->failed()) {
                abort($response->status(), 'Impossible de récupérer les cours');
            }

             return view('accueil', [
                 'cours' => $response->json(),
             ]);
        }
    public function show($id)
        {
            $response = Http::baseUrl(config('services.api.url'))
                ->acceptJson()
                ->get("/cours/$id");

            return view('signature', [
                'cours' => $response->json(),
            ]);
        }
    //
}
