<?php

namespace App\Models;
use DB;
use Validator;

class Dvd {

    public function search($dvd_title, $rating, $genre){
        $query = DB::table('dvds')
            ->select('*', 'dvds.id as dvd_id')
            ->join('ratings', 'ratings.id','=','dvds.rating_id')
            ->join('genres', 'genres.id','=','dvds.genre_id')
            ->join('labels', 'labels.id','=','dvds.label_id')
            ->join('sounds', 'sounds.id','=','dvds.sound_id')
            ->join('formats', 'formats.id','=','dvds.format_id');
        if($dvd_title){
            $query->where('title', 'LIKE', '%'.$dvd_title.'%');
        }
        if($genre!=-1 && $genre!=null){
            $query->where('genre_id', '=', $genre);
        }
        if($rating !=-1 && $rating!=null){
            $query->where('rating_id', '=', $rating);
        }
        $query->orderBy('title', 'asc');

        return $query->get();
    }

    public function getAllTitles(){
        return $this->search(null, null, null);
    }

    public static function getDvd($id){
        $query = DB::table('dvds')
            ->select('*', 'dvds.id as dvd_id')
            ->join('ratings', 'ratings.id','=','dvds.rating_id')
            ->join('genres', 'genres.id','=','dvds.genre_id')
            ->join('labels', 'labels.id','=','dvds.label_id')
            ->join('sounds', 'sounds.id','=','dvds.sound_id')
            ->join('formats', 'formats.id','=','dvds.format_id')
            ->where('dvds.id', $id);

        return $query->first();
    }

    public static function getReviews($id){
        $query = DB::table('reviews')
            ->select('title', 'description', 'rating')
            ->where('dvd_id',$id);

        return $query->get();

    }

    public static function createReview($data){
        return DB::table('reviews')->insert($data);
    }

    public static function validate($input){
        return Validator::make($input, [
            'rating' => 'required|integer',
            'review_title' => 'required|min:5',
            'description' => 'required|min:20',
        ]);
    }

}