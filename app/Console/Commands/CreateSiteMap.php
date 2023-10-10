<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\Rating;
use Carbon\Carbon;
use File;
use DB;
use App;
class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = App::make('sitemap');
        $sitemap->add(route('homepage'), Carbon::now('Asia/Ho_Chi_Minh'), '1.0', 'daily');
        //get all genre from db
        $genre = Genre::orderBy('id','DESC')->get();

        //add every post to the sitemap
        foreach ($genre as $gen)
        {
            $sitemap->add(env('APP_URL'). "/the-loai/{$gen->slug}", Carbon::now('Asia/Ho_Chi_Minh'), '0.7', 'daily');
        }
        //get all category from db
        $category = Category::orderBy('id','DESC')->get();

        //add every post to the sitemap
        foreach ($category as $cate)
        {
            $sitemap->add(env('APP_URL'). "/danh-muc/{$cate->slug}", Carbon::now('Asia/Ho_Chi_Minh'), '0.7', 'daily');
        }
        //get all country from db
        $country = Country::orderBy('id','DESC')->get();

        //add every post to the sitemap
        foreach ($country as $coun)
        {
            $sitemap->add(env('APP_URL'). "/quoc-gia/{$coun->slug}", Carbon::now('Asia/Ho_Chi_Minh'), '0.7', 'daily');
        }
        //get all movie from db
        $movie = Movie::orderBy('id','DESC')->get();

        //add every post to the sitemap
        foreach ($movie as $mov)
        {
            $sitemap->add(env('APP_URL'). "/phim/{$mov->slug}", Carbon::now('Asia/Ho_Chi_Minh'), '0.6', 'daily');
        }
        //get all movie from db
        $movie_ep = Movie::orderBy('id','DESC')->get();
        $episode = Episode::all(); 
        //add every post to the sitemap
        foreach ($movie_ep as $mov_ep)
        {
            foreach($episode as $ep){
                if($mov_ep->id==$ep->movie_id){
                    $sitemap->add(env('APP_URL'). "/xem-phim/{$mov_ep->slug}/tap-{$ep->episode}", Carbon::now('Asia/Ho_Chi_Minh'), '0.6', 'daily');
                }
               
            }
        }

        $years = range(Carbon::now('Asia/Ho_Chi_Minh')->year, 2000);
        //add every post to the sitemap
        foreach ($years as $year)
        {
            
            $sitemap->add(env('APP_URL'). "/nam/{$year}", Carbon::now('Asia/Ho_Chi_Minh'), '0.6', 'daily');

        }

        //generate your sitemap (format, filename)
        $sitemap->store('xml', 'sitemap');
        if (File::exists(public_path() . '/sitemap.xml')) {
            File::copy(public_path('sitemap.xml'),base_path('sitemap.xml'));
        }

    }
}
