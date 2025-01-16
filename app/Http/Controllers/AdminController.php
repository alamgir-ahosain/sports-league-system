<?php

namespace App\Http\Controllers;

use App\Models\matches;
use App\Models\playerinfo;
use App\Models\teaminfo;
use App\Models\gallaries;
use App\Models\score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{



    public function index()
    {
        return view('admin.adminIndex');
    }

    // ________________________________edit Match____________________________
    public function editMatch()
    {
        $matches = matches::orderBy('id', 'desc')->get(); // Sort matches by date descending

        return view('admin/editMatch', compact('matches'));
    }

        // ________________________________edit Match____________________________

    public function playerPageAdmin()
    {
        return view('admin/playerPageAdmin');
    }

        // ________________________________edit Player____________________________

    public function editPlayer()
    {
        $playerinfo = playerinfo::orderBy('goal', 'desc')->get(); // Sort matches by date descending
        return view('admin/editPlayer', compact('playerinfo'));
    }

    // ________________________________Player Page____________________________

    public function playerPageAdminPost(Request $request)
    {
        //upload image

        $imageName = $request->name . '.' . $request->profileimage->extension();
        $request->profileimage->move(public_path('images'), $imageName);



        $imageName2 = $request->nationality . '.' . $request->countryimage->extension();
        $request->countryimage->move(public_path('images'), $imageName2);

        $playerinfo = new playerinfo();



        $playerinfo->name = $request->name;
        $playerinfo->position = $request->position;
        $playerinfo->dob = $request->dob;
        $playerinfo->team_id = $request->team_id;
        

        $playerinfo->profileimage = $imageName;
        $playerinfo->countryimage = $imageName2;

        $playerinfo->nationality = $request->nationality;


        //  dd($playerinfo);
        $playerinfo->save();
        return redirect()->route('topScorer');
    }


    // ________________________________edit Match____________________________


    public function matchPageAdmin()
    {
        return view('admin/matchPageAdmin');
    }



    // ________________________________ Match Page____________________________

    public function matchPageAdminPost(Request $request)
    {


        //upload image
        $home_logoName = $request->home_team . '.' . $request->home_logo->extension();
        $request->home_logo->move(public_path('images'), $home_logoName);

        $away_logoName = $request->away_team . '.' . $request->away_logo->extension();
        $request->away_logo->move(public_path('images'), $away_logoName);

        $matches = new matches();
        $matches->date = $request->date;

        $matches->home_logo = $home_logoName;
        $matches->away_logo = $away_logoName;


        $matches->home_team = $request->home_team;
        $matches->away_team = $request->away_team;

        $matches->home_score = $request->home_score;
        $matches->away_score = $request->away_score;

        $matches->home_result = $request->home_result;
        $matches->away_result = $request->away_result;

        $matches->save();




    // Get home and away team records
    $homeTeam = teaminfo::where('name', $request->home_team)->first();
    $awayTeam = teaminfo::where('name', $request->away_team)->first();


    if ($homeTeam && $awayTeam) {
        // Update stats
        $homeTeam->played += 1;
        $awayTeam->played += 1;

        // Goals For and Against
        $homeTeam->gf += $request->home_score;
        $homeTeam->ga += $request->away_score;

        $awayTeam->gf += $request->away_score;
        $awayTeam->ga += $request->home_score;

        // Goal Difference
        $homeTeam->gd = $homeTeam->gf - $homeTeam->ga;
        $awayTeam->gd = $awayTeam->gf - $awayTeam->ga;

        // Determine results
        if ($request->home_score > $request->away_score) {
            // Home team wins
            $homeTeam->won += 1;
            $homeTeam->points += 3;

            $awayTeam->lost += 1;

            $homeTeam->form = $this->updateForm($homeTeam->form, 'W');
            $awayTeam->form = $this->updateForm($awayTeam->form, 'L');
        } elseif ($request->home_score < $request->away_score) {
            // Away team wins
            $awayTeam->won += 1;
            $awayTeam->points += 3;

            $homeTeam->lost += 1;

            $homeTeam->form = $this->updateForm($homeTeam->form, 'L');
            $awayTeam->form = $this->updateForm($awayTeam->form, 'W');
        } else {
            // Draw
            $homeTeam->draw += 1;
            $awayTeam->draw += 1;

            $homeTeam->points += 1;
            $awayTeam->points += 1;

            $homeTeam->form = $this->updateForm($homeTeam->form, 'D');
            $awayTeam->form = $this->updateForm($awayTeam->form, 'D');
        }

        // Save updates
        $homeTeam->save();
        $awayTeam->save();
    }





        return redirect()->route('matchPage');




        //    // $userinfo->save();
        //     if ($matches->save()) {
        //         return redirect('/login')->with('success', 'User registered successfully!'); // Redirect to login with a success message
        //     }
        //     return back()->with('error', 'Something went wrong, please try again!'); // Redirect back with an error message
    }

    private function updateForm($currentForm, $result)
{
    $form = $currentForm ? $currentForm : '';
    $form = $result . $form; // Add new result to the beginning
    return substr($form, 0, 5); // Limit form to the last 5 matches
}

    // _____________________________Team______________________________

public function teamPageAdmin()
{
    return view('admin/teamPageAdmin');
}



public function teamPageAdminPost(Request $request)
{

    // Upload image
    $imageName = $request->name . '.' . $request->logo->extension();
    $request->logo->move(public_path('images'), $imageName);

    // Save team information
    $teaminfo = new TeamInfo();
    $teaminfo->name = $request->name;
    $teaminfo->logo = $imageName; 



    //  dd($playerinfo);
    $teaminfo->save();
    return redirect()->route('playerPageAdmin');
 

}

    // _____________________________Gallaries______________________________

    public function gallariesAdmin()
    {
        return view('admin/gallariesAdmin');
    }
    
    
    
    public function gallariesAdminPost(Request $request)
    {
        $request->validate([
            'match_id' => 'required|exists:matches,id', 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',  
        ]);
    
        $imageName = time() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);
    
        $gallary = new gallaries();
    
        $gallary->match_id = $request->match_id;
        $gallary->image = $imageName;  
        $gallary->save();
    
        return redirect()->route('gallariesAdmin');
    }
    

// ____________________________score________________________________
public function scorePageAdmin()
{
    return view('admin/scorePageAdmin');
}

public function scorePageAdminPost(Request $request)
{
    $score = new Score();

    $score->match_id = $request->input('match_id');
    $score->player_id = $request->input('player_id');
    $score->team_id = $request->input('team_id');

    $score->goals = $request->input('goals');
    $score->assists = $request->input('assists');
    $score->red_cards = $request->input('red_cards');
    $score->yellow_cards = $request->input('yellow_cards');

    $score->save();



    
    // Get home and away team records
    // $homeTeam = teaminfo::where('name', $request->home_team)->first();
 
    $player = playerinfo::where('id', $request->player_id)->first();

    $player->played +=1;
    $player->goal += $request->goals;
    $player->assist += $request->assists;
    $player->yellow += $request->yellow_cards;
    $player->red += $request->red_cards;
    $player->save();


    return redirect()->back()->with('success', ' data has been saved successfully!');
}











}



