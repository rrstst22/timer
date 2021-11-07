<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class CountDownController extends Controller
{
    public function getHolidays()
    {
        $url = "https://holidays-jp.github.io/api/v1/date.json";
        $method = "GET";

        $client = new Client();
        $response = $client->request($method, $url);
        $posts = $response->getBody();

        return $posts;
    }

    public function getHoliday(Request $request)
    {
        $date = $request->date;
        $url = "http://api.national-holidays.jp/".$date;
        $method = "GET";

        $client = new Client();
        $response = $client->request($method, $url);
        $posts = $response->getBody();

        return $posts;
    }
    
}
