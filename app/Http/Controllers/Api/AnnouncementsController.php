<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AnnouncementsController extends Controller 
{
    public function GetAnnouncements($dateFrom, $dateTo) {
        $announcements = DB::table('VBookAuthor')
        ->where('AnnouncementDate', '>=' , $dateFrom)
        ->where('AnnouncementDate', '<=', $dateTo)->get();
        
        if (count($announcements) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'announcements'=> $announcements,
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
                    'message' => 'Sorry, There is not Announcements on this range' ,
                ],
                404
            );
        }
    }
}
