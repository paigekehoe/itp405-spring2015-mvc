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
                $genre = $request->input('genre');
                $rating =$request->input('rating');
                $dvds = (new Dvd())->search($dvd_title, $rating, $genre);
            }

            return view('results', ['dvds' => $dvds, 'dvd_title'=>$dvd_title, 'genre'=>$genre, 'rating'=>$rating
            ]);
        }


        public function details($dvd_id){
            $dvd = Dvd::getDvd($dvd_id);

            return view('detailview', ['dvd'=>$dvd, 'dvd_id'=>$dvd->$id]);
        }

        public function createReview(Request $request){
            $validation = Dvd::validate($request->all());

            if($validation->passes()){
                Dvd::createReview([
                   'review_title'=>$request->input('review_title'),
                    'rating'=>$request->input('rating'),
                    'description'=>$request->input('rating'),
                    'dvd_id' =>$request->input('dvd_id'),

                ]);
                return redirect('detailview')
                    ->with('success', 'Review created');
            }
            else {
                return redirect('detailview')
                    ->withInput()
                    ->withErrors($validation);
            }

        }


    }