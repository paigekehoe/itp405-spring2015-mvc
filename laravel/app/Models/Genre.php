<?php namespace App\Models;
/**
 * Created by PhpStorm.
 * User: pkehoe
 * Date: 2/28/15
 * Time: 5:29 PM
 */
    use Illuminate\Database\Eloquent\Model;

class Genre extends Model {

        public function dvds(){
            return $this->hasMany('App\Models\Dvd');

        }
}