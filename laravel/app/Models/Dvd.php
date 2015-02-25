<?php

namespace App\Models;
use DB;

class Dvd {

    public function search($dvd_title, $rating, $genre){
        $query = DB::table('dvds')
            ->select('title', 'rating_name','genre_name', 'label_name', 'sound_name', 'format_name', 'release_date')
            ->join('ratings', 'ratings.id','=','dvds.rating_id')
            ->join('genres', 'genres.id','=','dvds.genre_id')
            ->join('labels', 'labels.id','=','dvds.label_id')
            ->join('sounds', 'sounds.id','=','dvds.sound_id')
            ->join('formats', 'formats.id','=','dvds.format_id');
        if($dvd_title){
            $query->where('title', 'LIKE', '%'.$dvd_title.'%');
        }
        if($genre!=-1&& $genre!=null){
            $query->where('genre_id', '=', $genre);
        }
        if($rating !=-1&&$rating!=null){
            $query->where('rating_id', '=', $rating);
        }
        $query->orderBy('title', 'asc');

        return $query->get();
    }

    public function getAllTitles(){
        return $this->search(null, null, null);
    }

}