<?php

namespace App\Http\Controllers;

use App\Http\Requests\GamesFormRequest;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GamesController extends Controller
{
    public function index(Request $request)
    {
        $games = Game::with(['achievements'])->get();


        foreach ($games as $game) {
            $game->filledAchievementsCount = $game->achievements->filter(function ($achievement) {
                return !is_null($achievement->name);
            })->count();
        }

        $messageSuccessful = $request->session()->get('message.successful');

        return view('games.index')->with('games', $games)->with('messageSuccessful', $messageSuccessful);
    }


    public function create ()
    {

        return view('games.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'qtd_achievements' => 'required|integer|min:1',
        ]);


        $game = Game::create([
            'name' => $request->name,
            'qtd_achievements' => $request->qtd_achievements,
        ]);


        return redirect()->route('games.index')->with('message.successful', 'Jogo criado com sucesso! Agora, edite para adicionar as conquistas.');
    }





    public function destroy(Game $game)
    {

        $game->delete();


        return to_route('games.index')->with('message.successful', "Jogo '{$game->name}'  removido com sucesso!");
    }

    public function edit(Game $game)
    {

        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {

        $game->name = $request->input('name');
        $game->save();


        foreach ($request->input('achievements', []) as $achievementId => $achievementName) {
            if (str_starts_with($achievementId, 'new_')) {

                $game->achievements()->create(['name' => $achievementName]);
            } else {

                $achievement = $game->achievements()->find($achievementId);
                if ($achievement) {
                    $achievement->name = $achievementName;
                    $achievement->save();
                }
            }
        }


        return redirect()->route('games.index')->with('message.successful', "Jogo '{$game->name}' atualizado com sucesso!");
    }




}
