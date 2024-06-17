<?php

namespace App\Http\Controllers;

use App\Models\Motus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotusController extends Controller
{
    public function showIndex()
    {
        return view('index');
    }

    public function getSecretWord()
    {
        try {
            $secretWord = Motus::inRandomOrder()->first()->word;
            return response()->json(['secret_word' => $secretWord]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la récupération du mot secret.'], 500);
        }
    }

    public function handleGuess(Request $request)
    {
        $guess = strtoupper($request->input('guess'));

      
        $secretWord = Motus::where('word', $guess)->first();

        if ($secretWord) {
            return response()->json(['message' => 'Félicitations ! Vous avez trouvé le mot.']);
        } else {
            return response()->json(['message' => 'Mot incorrect.'], 200);
        }
    }
}
