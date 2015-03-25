<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Dvd;
use \Cache;

    class DvdsController extends Controller {

        public function search()
        {
            $ratings = DB::table('ratings')->get();
            $genres = DB::table('genres')->get();
            return view('search', ['ratings' => $ratings,
                'genres' => $genres]);
        }

        public function home()
        {
            $ratings = DB::table('ratings')->get();
            $genres = DB::table('genres')->get();
            return view('home', ['ratings' => $ratings,
                'genres' => $genres]);
        }

        public function results(Request $request){
            $genres = DB::table('genres')->get();
            if(empty($request)){
                $dvds = (new Dvd())->getAllTitles();
                $dvd_title = None;
                $rating ='';
                $genre = '';
            }
            else {
                $dvd_title = $request->input('dvd_title');
                $genre = $request->input('genre');
                $rating =$request->input('rating');
                $dvds = (new Dvd())->search($dvd_title, $rating, $genre);
            }

            return view('results', ['dvds' => $dvds, 'dvd_title'=>$dvd_title, 'genres'=>$genres, 'genre'=>$genre, 'rating'=>$rating
            ]);
        }


        public function detailview($dvd_id){
            $dvd = Dvd::getDvd($dvd_id);
            $reviews = Dvd::getReviews($dvd_id);

            if(Cache::has("tomatoe-$dvd->title")){

                $jsonString = Cache::get("tomatoe-$dvd->title");
                $rawData = json_decode($jsonString);

            }

            else {

                $url = "http://api.rottentomatoes.com/api/public/v1.0/movies.json?page=1&apikey=72m6x95wpv6wvdzcwt6amc3r&q=".urlencode($dvd->title);
                $jsonString = file_get_contents($url);
                $rawData = json_decode($jsonString);
                Cache::put("tomatoe-$dvd->title", $jsonString, 60);
            }
            if(count($rawData) == 0){
                $rtInfo = null;
            }
            else{
                $rtInfo = $rawData->movies[0];
            }
//            if(ends_with($dvd->title,' 1')):
//                $sTitle = $dvd->title - ' 1';
//                $searchTitle = strtolower($sTitle);
//            else:
//                $searchTitle = strtolower($dvd->title);
//            endif;
//
//            foreach ($rawData->movies as $m):
//                if (strtolower($m->title) == $searchTitle) :
//                    $rtInfo = $m;
//                endif;
//            endforeach;


            $data = ['dvd'=>$dvd, 'dvd_id'=>$dvd_id, 'reviews'=>$reviews, 'rtInfo'=>$rtInfo,'rawInfo'=>$rawData];

            return view('detailview', $data);
        }



        public function create(){
            $ratings = DB::table('ratings')->get();
            $genres = DB::table('genres')->get();
            $sounds = DB::table('sounds')->get();
            $formats = DB::table('formats')->get();
            $labels = DB::table('labels')->get();
            $data= ['labels'=>$labels, 'sounds'=>$sounds, 'formats'=>$formats, 'ratings' => $ratings,
                'genres' => $genres];
            return view('dvdform', $data);
        }

        public function createReview(Request $request){
            $validation = Dvd::validate($request->all());

            if($validation->passes()){
                Dvd::createReview([
                   'title'=>$request->input('review_title'),
                    'rating'=>$request->input('rating'),
                    'description'=>$request->input('description'),
                    'dvd_id' =>$request->input('dvd_id'),

                ]);
                return redirect('/dvds/'.$request->input('dvd_id'))
                    ->with('success', 'Review created');
            }
            else {
                return redirect('/dvds/'.$request->input('dvd_id'))
                    ->withInput()
                    ->withErrors($validation);
            }

        }

        public function addNewDvd(Request $request){

            $validation = Dvd::validateNewDvd($request->all());
            if($validation->passes()){
                Dvd::addNew([
                    'title' => $request->input('title'),
                    'label_id'=>$request->input('label_id'),
                    'sound_id'=>$request->input('sound_id'),
                    'genre_id'=>$request->input('genre_id'),
                    'rating_id'=>$request->input('rating_id'),
                    'format_id'=>$request->input('format_id'),
                ]);
                return redirect('/dvds/create')
                ->with('success', 'Dvd added to database!');
            }
            else {
                return redirect('/dvds/create')
                    ->withInput()
                    ->withErrors($validation);
            }
        }




    }