<?php

namespace App\Http\Controllers;

use App\Models\playerinfo;
use App\Models\teaminfo;
use App\Models\matches;
use App\Models\score;
use App\Models\gallaries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function teamIndex()
    {

        // $matches = matches::orderBy('id', 'desc')->get(); // Sort matches by date descending
        $teams=teaminfo::orderBy('id','asc')->get();
        return view('user/teamIndex',compact('teams'));
    }


    // public function showTeams() {
    //     // Fetch team info from the database
    //     $teams = Team::all(); // Assuming you have a Team model
    //     return view('teams.show', compact('teams'));
    // }
    

    public function playerPage()
    {
        return  view('user/playerPage');
    }
   


    public function messi()
    {

        $playerinfo = PlayerInfo::where('id', '1')->first(); // Fetch the player with name "Messi"
        if (!$playerinfo) {
            abort(404, 'Player not found'); // Handle if Messi is not in the database
        }

        return view('user/messi', compact('playerinfo'));
        // return view('user/messi');
    }



    public function topScorer()
    {
        // Calculate scores for all players and order them by score in descending order
        $playerinfo = playerinfo::orderBy('goal', 'desc')->get(); // Sort matches by date descending

        // Pass both player info and the top scorer to the view
        return view('user/topScorer', compact('playerinfo'));
    }




    public function teamStanding(){

        //  // Fetch matches from the database
        //  $matches = matches::orderBy('id', 'desc')->get(); // Sort matches by date descending

        //  // Return the view with matches data
        //  return view('user/matchPage', compact('matches'));

        $teaminfo = teaminfo::orderBy('points', 'desc')->get(); // Sort matches by date descending
        return view('user/teamStanding', compact('teaminfo'));

    }




    // ____________________________Matche Show______________________________


    public function matchPage()
    {
        // Fetch matches from the database
        $matches = matches::orderBy('id', 'desc')->get(); // Sort matches by date descending

        // Return the view with matches data
        return view('user/matchPage', compact('matches'));
    }


    public function show($id)
    {
        // Fetch match details for the specific match
        $match = Matches::findOrFail($id);
    
        // Fetch detailed match statistics
        $homeDetails = DB::table('matches as m')
        ->join('scores as s', 'm.id', '=', 's.match_id')
        ->join('playerinfos as p', 's.player_id', '=', 'p.id') 
        ->join('teaminfos as t', 't.id', '=' ,'p.team_id') 

        
        ->select(
            'm.id as match_id',
            'p.name',
            'p.profileimage',
            'm.home_team',
            'm.away_team',
            's.team_id',
            's.player_id',
            's.goals',
            's.assists',
            's.yellow_cards',
            's.red_cards'

        )
        ->where('m.id', $id)
        ->whereColumn('p.team_id', 't.id') 
        ->whereColumn('m.home_team', 't.name') 

        ->get();
    
    

              // Fetch detailed match statistics
              $awayDetails = DB::table('matches as m')
              ->join('scores as s', 'm.id', '=', 's.match_id')
              ->join('playerinfos as p', 's.player_id', '=', 'p.id') 
              ->join('teaminfos as t', 't.id', '=' ,'p.team_id') 
      
              
              ->select(
                  'm.id as match_id',
                  'm.home_team',
                  'm.away_team',
                  's.team_id',
                  's.player_id',
                  's.goals',
                  's.assists',
                  's.yellow_cards',
                  's.red_cards',
                  'p.name',
                  'p.profileimage',
      
              )
              ->where('m.id', $id)
              ->whereColumn('p.team_id', 't.id') 
              ->whereColumn('m.away_team', 't.name') 
              ->get();
        return view('user.showMatch', compact('match', 'homeDetails','awayDetails',));
    }
    

//  _________________________________________  teamDetails ____________________

public function teamDetails($id){

    $teaminfos = teaminfo::findOrFail($id);
    $playerinfos = playerinfo::where('team_id',$id)->get();
    return view('user.teamDetails', compact('playerinfos','teaminfos'));
}




//  ________________ Gallaries _______________
public function gallaries()
{
    $matches = matches::orderBy('id', 'desc')->get(); // Sort matches by date descending
    return view('user/gallaries', compact('matches'));
}

public function gallariesShow($id)
{
    $matches = matches::findOrFail($id);
    $gallaries = Gallaries::where('match_id', $id)->get();

    return view('user.gallariesMatch', compact('gallaries','matches'));
}



public function player($id)  {
    $playerinfo = playerinfo::findOrFail($id);
    return view('user.playerProfile' ,compact('playerinfo'));

    
}



}
