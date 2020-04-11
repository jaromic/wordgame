<?php

namespace App\Http\Controllers;

use App\Game;
use App\Round;
use App\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Game $game)
    {
        return view('game', ['game' => $game, 'user' => Auth()->user(), 'rounds' => $game->rounds, 'currentRound' => $game->getCurrentRound()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }

    public function enter(Game $game) {
        $user = Auth()->user();
        $user->game()->associate($game);
        $user->save();
        return redirect()->route('game', $game->id);
    }

    public function leave() {
        $user = Auth()->user();
        $user->game()->dissociate();
        $user->save();
        return redirect()->route('games');
    }

    public function newround(Game $game) {
        $user = Auth()->user();
        if(!$user->game) {
            throw new \InvalidArgumentException("Must be in a game to start a around");
        }
        if($user->game->id == $game->id) {
            $round = new Round();
            $round->game()->associate($game);
            $round->save();
            $round->initialize();
            $round->field->throwDice();
            $round->save();
            $round->start();
        } else {
            throw new \InvalidArgumentException("Cannot start game round without entering game first.");
        }
        return response()->noContent();
    }

    public function getStatus(Game $game) {
        $currentRound = $game->getCurrentRound();

        $userNames = [];
        foreach($game->users as $user) {
            array_push($userNames, $user->name);
        }

        return response()->json([
            'users' => $userNames,
            'round' => $currentRound ? $currentRound->number : 0,
            'remainingTime' => $currentRound ? $currentRound->getRemainingTime() : 0,
        ]);
    }

    public function getField(Game $game) {
        return view('field',['currentRound' => $game->getCurrentRound()]);
    }
}
