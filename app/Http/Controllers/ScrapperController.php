<?php

namespace App\Http\Controllers;

use App\Group;
use Goutte\Client;
use function GuzzleHttp\describe_type;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Description;
use Symfony\Component\DomCrawler\Crawler;

class ScrapperController extends Controller
{
    //

    public function index(Request $request)
    {
        $client = new Client();

        $crawler = $client->request('GET', 'https://www.igrupos.com/whatsapp');
//        $crawler->filter('li.media')->each(function (Crawler $card) {
//
//            $title = $card->filter('h4')->first();
//            $tag = $card->filter('div.textopost > div')->first();
//            $description = $card->filter('div.textopost > a')->first();
//            $image = $card->filter('div')->children('img.lazy-loaded')->last();
//            $image = $card->selectImage('Platicas shidas')->image();
//
//
//            print $card->text() . '<br><br>';
//        });


//        $crawler->filter('li.media')->each( function ( Crawler $card ){
//            $title = $card->filter('h4');
//            $tag = $card->filter('div.textopost > div')->first();
//            $description = $card->filter('div.textopost > a')->text();
//            $image = $card->filter('img.lazy-loaded')->first();
//            $image = $card->filter('div > div.pull-left.user-info')->first();
//            $link = $title->filter('a')->attr('href');
//
//
//
//
//            print $image->attr('src')  . '<br>';
//
//        });


        $grupos = Group::all();

        dd($grupos);

    }
}
