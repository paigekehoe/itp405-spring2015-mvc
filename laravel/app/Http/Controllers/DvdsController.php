<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Dvd;

    class DvdsController extends Controller {

        public function search()
        {
            $ratings = DB::table('ratings')->get();
            $genres = DB::table('genres')->get();
            return view('search', ['ratings' => $ratings,
                'genres' => $genres]);
        }

//        public function create(){
//
//            $artists = DB::table('artists')->get();
//            $genres = DB::table('genres')->get();
//
//            return view('songform', ['artists' => $artists,
//                'genres' => $genres]);
//
//        }


        public function results(Request $request){
//            if(!$request->input('dvd_title')){
//                   return redirect('/dvd/search');
//               }

            if(empty($request)){
                $dvds = (new Dvd())->getAllTitles();
                $dvd_title = None;
                $rating ='';
                $genre = '';
            }
            else {
                $dvd_title = $request->input('dvd_title');
                $genre = $request->input('genre_id');
                $rating =$request->input('rating_id');
                $dvds = (new Dvd())->search($dvd_title, $rating, $genre);
            }

            return view('results', ['dvds' => $dvds, 'dvd_title'=>$dvd_title, 'genre'=>$genre, 'rating'=>$rating
            ]);

            //var_dump($request->input('song_title'));
//            $songs = DB::table('songs')
//            ->join('artists', 'artists.id','=','songs.artist_id')
//            ->join('genres','genres.id','=','songs.genre_id')
//            ->where('title', 'LIKE', '%'.$request->input('song_title').'%')
//            ->orderBy('artist_name','asc')
//            ->get();
            //dd($songs);

//            return view('results', [
//            'song_title' => $request->input('song_title'),
//                'songs'=> $songs
//            ]);
        }

    }