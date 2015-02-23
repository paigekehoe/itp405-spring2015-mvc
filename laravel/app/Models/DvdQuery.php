<?php
/**
 * Created by PhpStorm.
 * User: pkehoe
 * Date: 2/10/15
 * Time: 7:32 PM
 */

namespace App\Models;

use DB;


class DvdQuery {

    public function search($dvd_title, $genre, $rating){
        $query = DB::table('dvds')
            ->select('title', 'rating_name','genre_name', 'label_name', 'sound_name', 'format_name', DB::raw('DATE_FORMAT(release_date, %b %d %y) AS release_date'))
            ->join('ratings', 'ratings.id','=','dvds.rating_id')
            ->join('genres', 'genres.id','=','dvds.genre_id')
            ->join('labels', 'labels.id','=','dvds.label_id')
            ->join('sounds', 'sounds.id','=','dvds.sound_id')
            ->join('formats', 'formats.id','=','dvds.format_id')
            ->where('title', 'LIKE', '%'.$dvd_title.'%');

            if($genre!=0){
                $query->where('genre', 'LIKE', '%'.$genre.'%');
            }
            if($rating !=0){
                $query->where('rating', 'LIKE', '%'.$rating.'%');
            }


            return $query->get();
    }

} 