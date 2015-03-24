<?php
/**
 * Created by PhpStorm.
 * User: pkehoe
 * Date: 3/24/15
 * Time: 12:13 PM
 */

function search($dvd_title){


$url = "http://api.rottentomatoes.com/api/public/v1.0/movies.json?page=1&apikey=72m6x95wpv6wvdzcwt6amc3r&q=$dvd_title";
    $jsonString = file_get_contents($url);
    $rawData = json_decode($jsonString);

};