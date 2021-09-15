<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class TestController extends Controller
{
   function list() {
    return DB::connection('sqlsrv2')->table('employed')->get();
   }

   public function coming_news_and_events() {
 
    $newsEvents = DB::table('authors')->get();

    if (count($newsEvents) > 0) {
        return response()->json(
            [
                'statusCode'=> 200,
                'error'=> false ,
                'message'=> '' ,
                'newsEvents'=> $newsEvents,
            ],
          200,
          ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8']
           // JSON_UNESCAPED_UNICODE,
        );
    }else {
        return response()->json(
            [
                'statusCode' => 404,
                'error' => true,
                'message' => 'Sorry, There Are No news or Events Currently' ,
            ],
            404
        );
    }
}
}
