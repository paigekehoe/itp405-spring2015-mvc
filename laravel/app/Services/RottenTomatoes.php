<?php

namespace App\Services;
use \Cache;


class RottenTomatoes {

    public static function search($dvd_title){

        if(Cache::has("tomatoe-$dvd_title")){

            $jsonString = Cache::get("tomatoe-$dvd_title");
            $rawData = json_decode($jsonString);

        }

        else {

            $url = "http://api.rottentomatoes.com/api/public/v1.0/movies.json?page=1&apikey=72m6x95wpv6wvdzcwt6amc3r&q=".urlencode($dvd_title);
            $jsonString = file_get_contents($url);
            $rawData = json_decode($jsonString);
            Cache::put("tomatoe-$dvd_title", $jsonString, 60);
        }
        if($rawData->total == 0){
            return null;
        }
        else{
            return $rawData->movies[0];
        }

    }

}