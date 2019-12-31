<?php

namespace App\Http\Controllers;

use App\Group;
use Goutte\Client;
use function GuzzleHttp\describe_type;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades;
use phpDocumentor\Reflection\DocBlock\Description;
use Symfony\Component\DomCrawler\Crawler;

class ScrapperController extends Controller
{
    //

    public function index(Request $request)
    {
        $client = new Client();
//
//        $crawler = $client->request('GET', 'https://bestfreegiveaways.wordpress.com/');
//        $crawler->filter('body > #page')->each(function (Crawler $card) {
//
//            $title = $card->filter('header > h1 > a')->first();
//            $tag = $card->filter('div.textopost > div')->first();
//            $description = $card->filter('div.textopost > a')->first();
//            $image = $card->filter('div')->children('img.lazy-loaded')->last();
//            $image = $card->selectImage('Platicas shidas')->image();
//
//            print $card->text() . "<br><br>" ;
//        });


        $client = new Client();

        $crawler = $client->request('GET', 'https://www.igrupos.com/whatsapp');
        $crawler->filter('#pagewrap div div div div div ul li')->each(function (Crawler $card) {

            $title = $card->filter('div div.media-body > div > h4');
            $tag = $card->filter('div.textopost > div')->first();
            $description = $card->filter('div.textopost > a')->text();
            $image = $card->filter('img.lazy-loaded')->first();
            $image = $card->filter('div > div.pull-left.user-info')->first();
            $link = $title->filter('a')->attr('href');
            print $card->text() . "<br><br>";


        });







    }
}
