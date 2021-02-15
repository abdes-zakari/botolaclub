<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Collection;
use Session;

class Game extends Model
{

	protected $fillable = ['team_home',

		                   'score_home',

		                   'score_away',

		                   'team_away',

		                   'round',

		                   'competition_id',

		                   'date_game',

		                   'time_game'];


    /**
     * Get all Games with name and more Information with Sub qwery 
     * @return \Illuminate\Support\Collection
     */

	public static function allGames(){

		$games = DB::table('games')
                      ->selectRaw('games.id,
			                       games.team_home,
			                       (select name from teams WHERE games.team_home=teams.id)as home_name,
			                       (select flag from teams WHERE games.team_home=teams.id)as home_flag,
			                       score_home,
			                       score_away, 
			                       games.team_away, 
			                       (select name from teams WHERE games.team_away=teams.id)as away_name,
			                       (select flag from teams WHERE games.team_away=teams.id)as away_flag, 
			                       date_game, 
			                       time_game, 
			                       (select name from competitions WHERE games.competition_id=competitions.id)as competition_name, 
			                       round ')
                      ->orderByRaw('date_game DESC,time_game DESC,games.id DESC')
                      // ->get();
                      ->paginate(20);
		return $games;
	}

	/**
     * Get all Games by given date
     * @param int $user_id 
     * @param date $date_game 
     * @param int $competition_id 
     * @return \Illuminate\Support\Collection
     */

	public static function userGames($user_id,$date_game,$competition_id=null){

		if ($competition_id=='all') {
            $result=DB::select("SELECT
                            games.id,
                            team1.flag AS home_flag,
                            team1.name AS home_name,
                            team1.arabic_name AS home_arabic_name,
                            team2.arabic_name AS away_arabic_name,
                            team1.shortened AS home_short,
                            games.team_home,
                            games.score_home AS score_home_final,
                            games.score_away AS score_away_final,
                            games.team_away,
                            team2.shortened AS away_short,
                            team2.name AS away_name,
                            team2.flag AS away_flag,
                            (SELECT name FROM competitions WHERE competitions.id=games.competition_id) as competition_name,
                            games.round,
                            games.date_game,
                            DATE_FORMAT(games.time_game, '%H:%i') AS time_game,
                            (SELECT users_games.score_home FROM users_games 
                                WHERE users_games.game_id=games.id AND users_games.user_id=$user_id) AS score_home_user,
                            (SELECT users_games.score_away FROM users_games 
                                WHERE users_games.game_id=games.id AND users_games.user_id=$user_id) AS score_away_user,
                                (SELECT users_games.points FROM users_games 
                                WHERE users_games.game_id=games.id AND users_games.user_id=$user_id) AS user_points
                            FROM games JOIN teams team1 on team1.id=games.team_home 
                                        JOIN teams team2 on team2.id=games.team_away
                            WHERE games.date_game='$date_game'
                            GROUP BY games.id  
                            ORDER BY time_game ");
		    
		}else{
            $result=DB::select("SELECT
                            games.id,
                            team1.flag AS home_flag,
                            team1.name AS home_name,
                            team1.arabic_name AS home_arabic_name,
                            team2.arabic_name AS away_arabic_name,
                            team1.shortened AS home_short,
                            games.team_home,
                            games.score_home AS score_home_final,
                            games.score_away AS score_away_final,
                            games.team_away,
                            team2.shortened AS away_short,
                            team2.name AS away_name,
                            team2.flag AS away_flag,
                            (SELECT name FROM competitions WHERE competitions.id=games.competition_id) as competition_name,
                            games.round,
                            games.date_game,
                            DATE_FORMAT(games.time_game, '%H:%i') AS time_game,
                            (SELECT users_games.score_home FROM users_games 
                                WHERE users_games.game_id=games.id AND users_games.user_id=$user_id) AS score_home_user,
                            (SELECT users_games.score_away FROM users_games 
                                WHERE users_games.game_id=games.id AND users_games.user_id=$user_id) AS score_away_user,
                                (SELECT users_games.points FROM users_games 
                                WHERE users_games.game_id=games.id AND users_games.user_id=$user_id) AS user_points
                            FROM games JOIN teams team1 on team1.id=games.team_home 
                                        JOIN teams team2 on team2.id=games.team_away
                            WHERE games.date_game='$date_game'
                            AND games.competition_id=$competition_id
                            GROUP BY games.id  
                            ORDER BY time_game ");
        }

        return $result;
	}

	public static function getNextDate($date_now)
	{
		$result=DB::table('games')->distinct()
		                          ->where('date_game', '>', $date_now)
		                          ->orderBy('date_game', 'ASC')
                                  ->first(['date_game']);

		return $result;
	}

	public static function getPrevDate($date_now)
	{
		$result=DB::table('games')->distinct()
		                          ->where('date_game', '<', $date_now)
		                          ->orderBy('date_game', 'DESC')
                                  ->first(['date_game']);
                                  
		return $result;
	}

	public static function getCompetitionsUser(){
   
		$competitionsUser=DB::table('user_competitions')->where('user_id',Session::get('user_id'))->get();

		$competitionsUser=$competitionsUser->pluck('competition_id')->implode(',') ?: '0';
		// pp($competitionsUser);
		return $competitionsUser;

	}
    

    // get games for index Page
	public static function gamesIndex(){

		$result=DB::select("SELECT
                           games.id,
                           team1.flag AS home_flag,
                           team1.name AS home_name,
                           team1.arabic_name AS home_arabic_name,
                           team1.shortened AS home_short,
                           games.team_home,
                           games.score_home AS score_home_final,
                           games.score_away AS score_away_final,
                           games.team_away,
                           team2.shortened AS away_short,
                           team2.name AS away_name,
                           team2.arabic_name AS away_arabic_name,
                           team2.flag AS away_flag,
                           (SELECT name FROM competitions WHERE competitions.id=games.competition_id) as competition_name,
                           games.round,
                           games.date_game,
                           DATE_FORMAT(games.time_game, '%H:%i') AS time_game
                           FROM games JOIN teams team1 on team1.id=games.team_home 
                                      JOIN teams team2 on team2.id=games.team_away
                           GROUP BY games.id  
                           ORDER BY games.date_game ASC,time_game ASC ");
		return $result;
		
	}


}


/*
SELECT DISTINCT date_game FROM games WHERE date_game < '2018-06-17' order By date_game DESC



SELECT DISTINCT 
users.id,
username,
SUM(points) as pts,
count(users_games.user_id) as CountGame,
(select count(user_id) from users_games where points=3 and user_id=users.id ) as win,
(select count(user_id) from users_games where points=0 and user_id=users.id ) as los,
(select count(user_id) from users_games where points=1 and user_id=users.id ) as draw
FROM users_games,users 
where users_games.user_id=users.id 
and score_home!='NULL'
and score_away!='NULL' 
and points!='NULL' 
group by users.id 
order by pts desc

SELECT DISTINCT 
users.id,
username,
SUM(points) as pts,
count(users_games.user_id) as CountGame,
(select count(user_id) from users_games where points=3 and user_id=users.id ) as win,
(select count(user_id) from users_games where points=0 and user_id=users.id ) as los,
(select count(user_id) from users_games where points=1 and user_id=users.id ) as draw
FROM users_games,users 
where users_games.user_id=users.id
and score_home IS NOT NULL
and score_away IS NOT NULL 
and points IS NOT NULL 
group by users.id 
order by pts desc



SELECT DISTINCT 
users.id,
username,
SUM(points) as pts,
count(users_games.user_id) as CountGame,
(select count(user_id) from users_games where points=3 and user_id=users.id ) as win,
(select count(user_id) from users_games where points=0 and user_id=users.id ) as los,
(select count(user_id) from users_games where points=1 and user_id=users.id ) as draw
FROM users_games,users 
where users_games.user_id=users.id
and score_home IS NOT NULL
and score_away IS NOT NULL 
and points IS NOT NULL 
group by users.id 
order by pts desc



*/

//                           SELECT *,
// 		                  (SELECT users_games.score_home FROM users_games 
// 		                   WHERE users_games.game_id=games.id AND users_games.user_id=101) AS shome_user,
// 		                  (SELECT users_games.score_away FROM users_games 
// 		                   WHERE users_games.game_id=games.id AND users_games.user_id=101) AS saway_user,
// 		                  (SELECT teams.name FROM teams WHERE teams.id=games.team_home ) as t1,
// 		                  (SELECT teams.name FROM teams WHERE teams.id=games.team_away ) as t2
// 		                   FROM `games`,`teams`
// 		                   WHERE games.date_game='2018-06-15'


// 		                   SELECT *
// 		                   FROM `games`,`teams`
// 		                   WHERE games.date_game='2018-06-15'


// SELECT  
// games.id,
// games.team_home,
// games.score_home AS score_home_final,
// games.team_away,
// games.score_away AS score_away_final,
// games.group_id,
// games.stage,
// games.date_game,
// games.time_game,
// (SELECT users_games.score_home FROM users_games 
// WHERE users_games.game_id=games.id AND users_games.user_id=101) AS score_home_user,
// (SELECT users_games.score_away FROM users_games 
// WHERE users_games.game_id=games.id AND users_games.user_id=101) AS score_away_user,
// (SELECT  teams.name FROM teams WHERE teams.id=games.team_home ) as name_home,
// (SELECT  teams.name FROM teams WHERE teams.id=games.team_away ) as name_away,
// (SELECT  stages.name FROM stages WHERE stages.id=games.stage ) as stage_name,
// (SELECT  groups.name FROM groups WHERE groups.id=games.group_id ) as group_name
// FROM games WHERE games.date_game='2018-06-15'  group by games.id




// with Join
// SELECT
// games.id,
// team1.flag AS home_flag,
// team1.name AS home_name,
// games.team_home,
// games.score_home AS score_home_final,
// games.score_away AS score_away_final,
// games.team_away,
// team2.name AS away_name,
// team2.flag AS away_flag,
// games.group_id,
// g.name,
// games.stage,
// s.name,
// games.date_game,
// games.time_game,
// (SELECT users_games.score_home FROM users_games 
//  WHERE users_games.game_id=games.id AND users_games.user_id=101) AS score_home_user,
// (SELECT users_games.score_away FROM users_games 
//  WHERE users_games.game_id=games.id AND users_games.user_id=101) AS score_away_user
// FROM games JOIN teams team1 on team1.id=games.team_home 
//            JOIN teams team2 on team2.id=games.team_away
//            JOIN groups g on g.id=games.group_id
//            JOIN stages s on s.id=games.stage
// WHERE games.date_game='2018-06-15'  
// GROUP BY games.id