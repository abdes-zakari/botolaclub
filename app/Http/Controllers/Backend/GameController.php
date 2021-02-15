<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Team;
use App\Models\UserGames;
use App\Models\Stage;
use App\Models\Group;
use App\Models\Competition;
use Redirect;
use Validator;
use Session;
use View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;

class GameController extends Controller
{
    
    public function __construct(){

    	// $this->middleware('preventBackHistory');
    	// $this->middleware('checkAuth');
    }

    /**
     * Get Games in Backend
     *
     * @return \Illuminate\Support\Collection
     */

    public function index(){
      //   echo Hash::make(">G_F-S6i%T/Li<%5");die();
        $games = Game::allGames();
        $games->links('pagination.custom');
        $teams  = Team::all();
        $competitions = Competition::all();
        
        return view('backend.game.index',compact('games','teams','competitions'));
    }
    
    /**
     * Add new Game
     * @param Request $request
     * @return void
     */

    public function addGame(Request $request){

        $rules = array(
                      'team_home'       => 'required',
                      'team_away'       => 'required',
                      'competition_id'  => 'required',
                      'date_game'       => 'required',
                      'time_game'       => 'required'

                     );
   
        $validator = Validator::make($request->all(), $rules);
 
        if ($validator->fails()) {
 
            return Redirect::back();

        }else{

             Game::create($request->all());
            // Session::flash('MsgSavedteam', Messages::getSuccessMessage());
            return Redirect::back();
         }

    }

    /**
     * Save Scores game
     * @param Request $request
     * @return void
     */

    public function saveScores(Request $request){

       $id_game = $request->post('id_game');
       $s_home  = $request->post('s_home');
       $s_away  = $request->post('s_away');

       $game=Game::find($id_game);
       $game->score_home=$s_home;
       $game->score_away=$s_away;
       $game->save();

       $this->affectPts($id_game,$s_home,$s_away);

       $response = array('status' => true,
                         'msg'    => 'Saved successfully'
                          );
      //  header('Content-Type: application/json');
      //   die(json_encode($response));
      return response()->json($response);

    }

    /**
     * set pts
     * @param int $id_game
     * @param int $s_home
     * @param int $s_away
     * @return void
     */
    public function affectPts($id_game,$s_home,$s_away){
        
       $games=UserGames::where('game_id',$id_game)->get();

       foreach ($games as $g) {

        if (isset($g->score_home )&& isset($g->score_away)) {

           $userGame=UserGames::find($g->id);

           if ($s_home==$g->score_home && $s_away==$g->score_away ) {
               // Win 3 pts
               $userGame->points=3;   
           }
           else{
               if (  ($s_home>$s_away  && $g->score_home>$g->score_away)
                  || ($s_home<$s_away  && $g->score_home<$g->score_away)
                  || ($s_home==$s_away && $g->score_home==$g->score_away)
                  ) {
                    // draw  1 pts
                    $userGame->points=1;   
               }else{
                    // Los 0 pts
                    $userGame->points=0;  
               }
           }
           $userGame->save();
        }
       }
    }
    /**
     * Delete Game by ID
     * @param int $id_game
     * @return void
     */
    public function deleteGame($id_game){
       
       $game=Game::find($id_game);

       $game->delete();

       return Redirect::back();

    }

    /**
     * Get edit page for game
     * @param int $id  id of game 
     * @return Illuminate\View\View 
     */

    public function getEditGame($id){

       $game=Game::find($id);
       $teams  = Team::all();
       $competitions = Competition::all();
       return view('backend.game.edit_game',compact('game','teams','competitions'));
    }


    /**
     * Save edit game
     * @param int $id  id of game 
     * @return void
     */

    public function saveEditGame(Request $request,$id){

       $game=Game::find($id);
       $game->team_home  = $request->post('team_home');
       $game->score_home = $request->post('score_home');
       $game->score_away = $request->post('score_away');
       $game->team_away  = $request->post('team_away');
       $game->competition_id   = $request->post('competition_id');
       $game->round      = $request->post('round');
       $game->date_game  = $request->post('date_game');
       $game->time_game  = $request->post('time_game');
       $edited=$game->save();
       if ($edited) {
           Session::flash('MsgSavedData', 'Data Saved');
       }
       
       return Redirect::back();
       
       // echo "<pre>"; dd($edited); die();

    }

      
}


