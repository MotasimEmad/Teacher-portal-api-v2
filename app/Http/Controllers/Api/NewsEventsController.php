<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;


class NewsEventsController extends Controller {

    public function CurrentNewsAndEvents() {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->get();
       // where('DateFrom' , '>=', $currentTime)->where('DateTo', '>=', $currentTime)

    
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
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

    public function ComingNewsAndEvents() {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->get();
        // ->where('DateTo' , '>=', $currentTime)

        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
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

    public function SearchNewsAndEventsFaculty($faculty) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->where('FacultyNo', '=' , $faculty)->get();

        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                ],
              200,
              ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8']
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

    public function SearchNewsAndEventsProgram($program) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->where('FacultyProgramNo', '=' , $program)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                ],
              200,
              ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8']
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

    public function SearchNewsAndEventsSpecialization($specialization) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->where('FacultyProgramNo', '=' , $specialization)->get();

        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsBatch($batch) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->where('FacultyBatchNo', '=' , $batch)->get();

        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsByName($event_name) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->where('NewsAndEventsName', '=' , $event_name)->get();

        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsByDate($dateFrom, $dateTo) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->where('dateFrom', '>=' , $dateFrom)->where('dateTo', '<=' , $dateTo)->get();

        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function FilterEvents($faculty, $program, $specialization, $batch, $event_name, $dateFrom, $dateTo) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyNo', '=' , $faculty)->
        where('FacultyProgramNo', '=' , $program)->
        where('FacultyProgramSpecializationNo', '=' , $specialization)->
        where('FacultyBatchNo', '=' , $batch)->
        where('NewsAndEventsName', '=' , $event_name)->
        where('DateFrom' , '>=', $dateFrom)->where('DateTo', '<=', $dateTo)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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
    /////////////////////////////////////////////////////////////////////////////////////////////////////
    // Faculty API
    public function SearchNewsAndEventsFacultyProgram($faculty, $program) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyNo', '=' , $faculty)->
        where('FacultyProgramNo', '=' , $program)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsFacultySpecialization($faculty, $specialization) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyNo', '=' , $faculty)->
        where('FacultyProgramSpecializationNo', '=' , $specialization)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsFacultyBatch($faculty, $batch) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyNo', '=' , $faculty)->
        where('FacultyBatchNo', '=' , $batch)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsFacultyName($faculty, $name) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyNo', '=' , $faculty)->
        where('NewsAndEventsName', '=' , $name)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsFacultyDate($faculty, $dateFrom, $dateTo) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyNo', '=' , $faculty)->
        where('DateFrom' , '>=', $dateFrom)->
        where('DateTo', '<=', $dateTo)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsFacultyProgramSpecialization($faculty, $program, $specialization) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyNo', '=' , $faculty)->
        where('FacultyProgramNo' , '>=', $program)->
        where('FacultyProgramSpecializationNo', '<=', $specialization)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsFacultyProgramBatch($faculty, $program, $batch) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyNo', '=' , $faculty)->
        where('FacultyProgramNo' , '>=', $program)->
        where('FacultyBatchNo', '<=', $batch)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsFacultyProgramName($faculty, $program, $event_name) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyNo', '=' , $faculty)->
        where('FacultyProgramNo' , '>=', $program)->
        where('NewsAndEventsName', '<=', $event_name)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsFacultyProgramDate($faculty, $program, $dateFrom, $dateTo) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyNo', '=' , $faculty)->
        where('FacultyProgramNo' , '>=', $program)->
        where('DateFrom' , '>=', $dateFrom)->where('DateTo', '<=', $dateTo)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsFacultyProgramSpecializationBatch($faculty, $program, $specialization, $batch) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyNo', '=' , $faculty)->
        where('FacultyProgramNo' , '>=', $program)->
        where('FacultyProgramSpecializationNo' , '=', $specialization)->
        where('FacultyBatchNo', '=', $batch)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsFacultyProgramSpecializationName($faculty, $program, $specialization, $event_name) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyNo', '=' , $faculty)->
        where('FacultyProgramNo' , '>=', $program)->
        where('FacultyProgramSpecializationNo' , '=', $specialization)->
        where('NewsAndEventsName', '=', $event_name)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsFacultyProgramSpecializationDate($faculty, $program, $specialization, $dateFrom, $dateTo) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyNo', '=' , $faculty)->
        where('FacultyProgramNo' , '>=', $program)->
        where('FacultyProgramSpecializationNo' , '=', $specialization)->
        where('DateFrom' , '>=', $dateFrom)->
        where('DateTo', '<=', $dateTo)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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


    //////////////////////////////////////////////////////////////
    // Program API

    public function SearchNewsAndEventsProgramSpecialization($program, $specialization) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyProgramNo' , '>=', $program)->
        where('FacultyProgramSpecializationNo' , '=', $specialization)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsProgramBatch($program, $batch) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyProgramNo' , '>=', $program)->
        where('FacultyBatchNo' , '=', $batch)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsProgramName($program, $event_name) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyProgramNo' , '>=', $program)->
        where('NewsAndEventsName' , '=', $event_name)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsProgramDate($program, $dateFrom, $dateTo) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyProgramNo' , '>=', $program)->
        where('DateFrom' , '>=', $dateFrom)->
        where('DateTo', '<=', $dateTo)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsProgramSpecializationBatch($program, $specialization, $batch) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyProgramNo' , '>=', $program)->
        where('FacultyProgramSpecializationNo' , '=', $specialization)->
        where('FacultyBatchNo', '=', $batch)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsProgramSpecializationName($program, $specialization, $event_name) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyProgramNo' , '>=', $program)->
        where('FacultyProgramSpecializationNo' , '=', $specialization)->
        where('NewsAndEventsName', '=', $event_name)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsProgramSpecializationDate($program, $specialization, $dateFrom, $dateTo) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyProgramNo' , '=', $program)->
        where('FacultyProgramSpecializationNo' , '=', $specialization)->
        where('DateFrom' , '>=', $dateFrom)->
        where('DateTo', '<=', $dateTo)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsProgramSpecializationBatchName($program, $specialization, $batch, $event_name) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyProgramNo' , '>=', $program)->
        where('FacultyProgramSpecializationNo' , '=', $specialization)->
        where('FacultyBatchNo' , '=', $batch)->
        where('NewsAndEventsName', '=', $event_name)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsProgramSpecializationBatchDate($program, $specialization, $batch, $dateFrom, $dateTo) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyProgramNo' , '>=', $program)->
        where('FacultyProgramSpecializationNo' , '=', $specialization)->
        where('FacultyBatchNo' , '=', $batch)->
        where('DateFrom' , '>=', $dateFrom)->
        where('DateTo', '<=', $dateTo)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    //////////////////////////////////////////////////////////////////////////////////
    // Specialization API
    public function SearchNewsAndEventsSpecializationBatch($specialization, $batch) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyProgramSpecializationNo' , '=', $specialization)->
        where('FacultyBatchNo' , '=', $batch)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsSpecializationName($specialization, $event_name) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyProgramSpecializationNo' , '=', $specialization)->
        where('NewsAndEventsName' , '=', $event_name)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsSpecializationDate($specialization, $dateFrom, $dateTo) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyProgramSpecializationNo' , '=', $specialization)->
        where('DateFrom' , '>=', $dateFrom)->
        where('DateTo', '<=', $dateTo)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsSpecializationBatchName($specialization, $batch, $event_name) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyProgramSpecializationNo' , '=', $specialization)->
        where('FacultyBatchNo' , '=', $batch)->
        where('NewsAndEventsName', '=', $event_name)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsSpecializationBatchDate($specialization, $batch, $dateFrom, $dateTo) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyProgramSpecializationNo' , '=', $specialization)->
        where('FacultyBatchNo' , '=', $batch)->
        where('DateFrom' , '>=', $dateFrom)->
        where('DateTo', '<=', $dateTo)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    //////////////////////////////////////////////////////////////////////////////////
    // Batch API
    public function SearchNewsAndEventsBatchName($batch, $event_name) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyBatchNo' , '=', $batch)->
        where('NewsAndEventsName' , '=', $event_name)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsBatchDate($batch, $dateFrom, $dateTo) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyBatchNo' , '=', $batch)->
        where('DateFrom' , '>=', $dateFrom)->
        where('DateTo', '<=', $dateTo)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    public function SearchNewsAndEventsBatchNameDate($batch, $event_name, $dateFrom, $dateTo) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('FacultyBatchNo' , '=', $batch)->
        where('NewsAndEventsName' , '=', $event_name)->
        where('DateFrom' , '>=', $dateFrom)->
        where('DateTo', '<=', $dateTo)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

    /////////////////////////////////////////////////////////////////////////////////////////////
    // Name API
    public function SearchNewsAndEventsNameDate($event_name, $dateFrom, $dateTo) {
        $mytime = Carbon::now();
        $currentTime = $mytime->toDateTimeString();
        $newsEvents = DB::table('NewsAndEvents')->
        where('NewsAndEventsName' , '=', $event_name)->
        where('DateFrom' , '>=', $dateFrom)->
        where('DateTo', '<=', $dateTo)->get();
   
        if (count($newsEvents) > 0) {
            return response()->json(
                [
                    'Current Time' => $currentTime,
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'newsEvents'=> $newsEvents,
                    //'Faculties'=> $Faculties,
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

?>