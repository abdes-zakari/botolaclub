<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Game;
use App\Models\UserGames;
use App\Models\Competition;
use Redirect;
use Validator;
use Session;
use View;
use DB;

class AccountGameController extends Controller
{
    private $user_id;
    private $idUser;

    public function __construct(Request $request){

    	// $this->middleware('preventBackHistory');
    	// $this->middleware('checkAuth');
        
        $this->middleware(function ($request, $next) {
               // share variable user in all function 
               $this->user_id=Session::get('user_id');
               $user=User::find($this->user_id);
               View::share('user', $user);

                return $next($request);
        });
        
    }
	  
    /**
     * Render indexGame Page
     * @param - Request $request
     * @return Illuminate\View\View 
     */

    public function index(Request $request){


        $competition_id=$request->get('competition') ?? 'all';
        if ($request->get('y') && $request->get('m') && $request->get('d')) {

            $date_get=$request->get('y').'-'.$request->get('m').'-'.$request->get('d');

            if ($this->validateDate($date_get)) {

                $date_now=$date_get;

            }
            else{
                 $date_now=date("Y-m-d");
             }
        }else{

            $date_now=date("Y-m-d");
        }

        $games = Game::userGames($this->user_id,$date_now,$competition_id);
         // echo "<pre>"; print_r($games); die();
        if (!$games) {

            $dates=Game::getNextDate($date_now);
            
            if (isset($dates->date_game)) {
                
               $date_now=$dates->date_game;

            }else{

               $date_now='2018-06-14';
            }

            $games = Game::userGames($this->user_id,$date_now,$competition_id);
        } 

        $day_game=strtotime($date_now);

        $day_game=date('d F Y', $day_game);

        if(ctype_digit(strval($competition_id))){

           $competition_name=Competition::find($competition_id)->name ?? '';

        }else{
           $competition_name='All Competitions';
        }

        $template=(currentLang()=='ar' ? 'frontend.account.game_ar' : 'frontend.account.game');

        return view($template,compact('games','day_game','date_now','competition_name'));

    }
    
    public function nextDay(Request $request){
      
      $date_now=$request->get('date_now');

      $dates=Game::getNextDate($date_now);

      if (isset($dates->date_game)) {

         $next_date=strtotime($dates->date_game);

      }
      else{
         $next_date=strtotime('2018-06-14');
      }

      $day   = date('d', $next_date);
      $month = date('m', $next_date);
      $year  = date('Y', $next_date);

      $response = array('status' => true,
                        'day'   => $day,
                        'month' => $month,
                        'year'  => $year
                       );
      
   
      
      return response()->json($response);

        
    } 

    public function prevDay(Request $request){
      
      $date_now=$request->get('date_now');

      $dates=Game::getPrevDate($date_now);

      if (isset($dates->date_game)) {

         $next_date=strtotime($dates->date_game);

      }
      else{
         $next_date=strtotime('2018-06-14');
      }

      $day   = date('d', $next_date);
      $month = date('m', $next_date);
      $year  = date('Y', $next_date);

      $response = array('status' => true,
                        'day'   => $day,
                        'month' => $month,
                        'year'  => $year
                       );
      
   
      
      return response()->json($response);
        
    } 

    public function saveGameUser(Request $request){

       $inputs=$request->all();
       unset($inputs['_token']);
       foreach ($inputs as $input) {
           $id_game=$input['id_game'];
           $getDatetime = Game::find($id_game);
           $datetime_game = strtotime($getDatetime->date_game." ".$getDatetime->time_game);
           $datetime_now  = strtotime(date("Y-m-d H:i:s"));

           if ($datetime_now<$datetime_game) {// start check if game is not closed 

               $saveGame = UserGames::updateOrCreate(
                           ['game_id'    => (int)$input['id_game'] , 'user_id'    => (int)$this->user_id],//where
                           ['score_home' => (int)$input['s_home']  , 'score_away' => (int)$input['s_away']]);//data to save
            }//end check if game is not closed 
        }
        $response = array('status' => true,
                          'msg'    => 'Data saved (Y)'
                          );
      
        return response()->json($response);

    }



    public function validateDate($date, $format = 'Y-m-d'){

        $d = \DateTime::createFromFormat($format, $date);

        return $d && $d->format($format) == $date;
    }  

    /**
     * Close game
     *
     * @param  int $date_game
     * @param  int $time_game
     * @return boolean
     */

    public static function closeGame($date_game,$time_game){
        
        $datetime_now  = strtotime(date("Y-m-d H:i:s"));
        $datetime_game = strtotime($date_game." ".$time_game);
        if ($datetime_now>$datetime_game) {
           return true; //close
        }
        return false;
        //  {{ App\Http\Controllers\Frontend\AccountGameController::closeGame() }}
    }

    /**
     * Get Stats
     *
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function getStats(Request $request){
       
       //http://localhost:8090/w/pronostic/site/public/account/game/stats?game_id=13
       $game_id=$request->get('game_id');
       if ($game_id) {

            $stats=UserGames::statsResults($game_id);
   
            $totalScore=0;
   
            foreach ($stats as $st) {
   
                 $totalScore+=$st->counterScore; 
            }
             // echo "<pre>"; print_r($stats); die();
            $response = array('total_score' => $totalScore,
                               'scores'      => $stats
                                );
         
            return response()->json($response);
       }

    }

}


