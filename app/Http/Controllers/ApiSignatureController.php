<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ApiSignatureController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'signature' => ['required', 'string'],
            'cours_id'  => ['required', 'integer'],
        ]);

        $data['user_id'] = Auth::id();

        $response = Http::baseUrl(config('services.api.url'))
                        ->acceptJson()
                        ->withToken(Session::get('remote_auth_token'))
                        ->post('/signature', $data);

        if (! $response->successful()) {
            return back()->with('error', 'Erreur lors de l\'enregistrement de la signature distance.');
        }

        return redirect()
            ->route('accueil_session')
            ->with('status', 'Signature enregistrée!');
    }
}
