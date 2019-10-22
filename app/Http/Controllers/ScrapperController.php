<?php

namespace App\Http\Controllers;

use Goutte\Client;
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
        $crawler->filter('li.media')->each(function (Crawler $grupo) {
            $card = $grupo->filter('li.media')->first();
            $title = $card->filter('h4')->first();
            $tag = $card->filter('div.textopost > div')->first();
            $description = $card->filter('div.textopost > a')->first();
//            $image = $card->filter('div')->children('img.lazy-loaded')->last();
            $image = $card->selectImage('Platicas shidas')->image();


            print $image->getUri() . '<br><br>';
        });



    }
}
