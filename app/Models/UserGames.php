<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Collection;

class UserGames extends Model
{
     
    protected $table = 'users_games';

    protected $fillable = ['game_id',

		                   'user_id',

		                   'score_home',

		                   'score_away'];

     /**
     * Get Stats 
     * @param int $game_id
     * @return \Illuminate\Support\Collection
     */

	public static function statsResults($game_id)
	{
		$result=DB::select("SELECT
			                score_home,
			                score_away,
			                COUNT(CONCAT(score_home, '-', score_away)) as counterScore
                            FROM users_games WHERE game_id=$game_id
                            AND score_home IS NOT NULL
                            AND score_away IS NOT NULL
                            GROUP BY score_home,score_away
                            ORDER BY counterScore desc");
		return $result;
	}
    

    
    /**
    *  this standing for all users are playing or not based of join but i get standing for all competitions
    * @return \Illuminate\Support\Collection
    */
    public static function getStanding(){

        $userWithGames= DB::table('users')
                          ->leftJoin('users_games','users.id','=','users_games.user_id')
                          ->leftJoin('games','users_games.game_id','=','games.id')
                          ->select('users.id',
                                   'username',
                                    DB::raw('SUM(points) as pts'),
                                    DB::raw('count(users_games.user_id) as CountGame'),
                                    DB::raw('(select count(user_id) from users_games where points=3 and user_id=users.id) as win'),
                                    DB::raw('(select count(user_id) from users_games where points=0 and user_id=users.id) as los'),
                                    DB::raw('(select count(user_id) from users_games where points=1 and user_id=users.id) as draw'))
                          ->orderBy('pts','desc')
                          ->orderBy('win','desc')
                          ->orderBy('draw','desc')
                          ->orderBy('CountGame','desc')
                          ->orderBy('username','asc')
                          ->groupBy('users.id')
                          ->paginate(10);
                          // ->toSql();

     // pp($userWithGames);
        return $userWithGames;
    }

  
    // @rank:=@rank+1 AS rank

    /**
    * Get Standing of all Users (User with Games + User without games )
    * @return \Illuminate\Support\Collection
    */
	public static function getStanding2(){

		$userWithGames=DB::select("SELECT DISTINCT 
                            users.id,
                            username,
                            SUM(points) AS pts,
                            count(users_games.user_id) AS CountGame,
                            (SELECT count(user_id) FROM users_games WHERE points=3 AND user_id=users.id ) AS win,
                            (SELECT count(user_id) FROM users_games WHERE points=0 AND user_id=users.id ) AS los,
                            (SELECT count(user_id) FROM users_games WHERE points=1 AND user_id=users.id ) AS draw
                            FROM users_games,users 
                            WHERE users_games.user_id=users.id
                            AND score_home IS NOT NULL
                            AND score_away IS NOT NULL 
                            AND points IS NOT NULL 
                            GROUP BY users.id
                            ORDER BY pts DESC,win DESC,draw DESC,CountGame DESC");

		$userWithoutGames=DB::select("SELECT users.id,username,'0' AS pts,'0' AS CountGame,'0' AS win,'0' AS los,'0' AS draw
                                      FROM users 
                                      WHERE users.id not IN (SELECT DISTINCT user_id FROM users_games WHERE  points IS NOT NULL )");

        $collection = collect($userWithGames);
        $merged = $collection->merge($userWithoutGames);
        //$result=$merged->sortByDesc('pts')->all();
        $result=$merged->all();

        return $result;
	}

	public static function getStandingOld()
	{
		$result=DB::select("SELECT DISTINCT 
                            users.id,
                            username,
                            SUM(points) AS pts,
                            count(users_games.user_id) AS CountGame,
                            (SELECT count(user_id) FROM users_games WHERE points=3 AND user_id=users.id ) AS win,
                            (SELECT count(user_id) FROM users_games WHERE points=0 AND user_id=users.id ) AS los,
                            (SELECT count(user_id) FROM users_games WHERE points=1 AND user_id=users.id ) AS draw
                            FROM users_games,users 
                            WHERE users_games.user_id=users.id
                            AND score_home IS NOT NULL
                            AND score_away IS NOT NULL 
                            AND points IS NOT NULL 
                            GROUP BY users.id 
                            UNION
                            SELECT users.id,username,'0' AS pts,'0' AS CountGame,'0' AS win,'0' AS los,'0' AS draw
                            FROM users 
                            WHERE users.id not IN (SELECT DISTINCT user_id FROM users_games WHERE  points IS NOT NULL )
                            ORDER BY pts DESC");
	    return $result;

        //      $result = array_map(function($item) {
        //     return (array)$item; 
        // }, $result);
        // echo "<pre>";print_r($result);die();
		
	}


	/**
     * Get all Games Played by User
     * @param int $user_id 
     * @return \Illuminate\Support\Collection
     */

	public static function gamesPlayedByUser($user_id){

		$result=DB::select("SELECT 
                            users_games.id,
                            users_games.game_id,
                            users_games.user_id,
                            users_games.score_home as score_home_user,
                            users_games.score_away as score_away_user,
                            users_games.points as user_points ,
                            games.team_home,
                            games.team_away,
                            games.score_home as score_home_final ,
                            games.score_away as score_away_final ,
                            -- games.group_id,
                            -- games.stage,
                            games.date_game,
                            games.time_game,
                            (SELECT teams.name FROM teams WHERE teams.id=games.team_home ) AS home_name,
                            (SELECT teams.shortened FROM teams WHERE teams.id=games.team_home ) AS home_short,
                            (SELECT teams.flag FROM teams WHERE teams.id=games.team_home ) AS home_flag,
                            (SELECT teams.name FROM teams WHERE teams.id=games.team_away ) AS away_name,
                            (SELECT teams.shortened FROM teams WHERE teams.id=games.team_away ) AS away_short,
                            (SELECT teams.flag FROM teams WHERE teams.id=games.team_away ) AS away_flag
                            FROM users_games,games
                            where user_id=".$user_id."
                            and users_games.game_id=games.id
                            ORDER BY games.date_game DESC,games.time_game DESC
                            ");
		return $result;
	}

}


