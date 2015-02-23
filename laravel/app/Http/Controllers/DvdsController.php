<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\SongQuery;

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
            if(!$request->input('dvd_title')){
                   return redirect('/dvd/search');
               }

            if(empty($request)){
                $dvds = (new Dvd())->search('*','*','*');
                $dvd_title = '';
                $rating ='';
                $genre = '';
            }
            else {
                $dvd_title = $request->input('dvd_title');
                $genre = $request->input('genre');
                $rating =$request->input('rating');
                $dvds = (new DvdQuery())->search($dvd_title, $rating, $genre);
            }

            return view('results', ['dvds' => $dvds, 'dvd_title'=>$dvd_title, 'genre'=>$genre
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