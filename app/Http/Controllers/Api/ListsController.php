<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ListsController extends Controller {
    public function GetFaculties() {
        $faculties = DB::table('Faculties')->select('FacultyId', 'FacultyName')->get();

        if (count($faculties) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'faculties'=> $faculties,
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

    public function GetPrograms() {
        $programs = DB::table('vwFacultyPrograms')->select('ProgramId','ProgramNameEN','FacultyProgramId')->get();

        if (count($programs) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'programs'=> $programs,
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

    public function GetSpecialization() {
        $specialization = DB::table('FacultyProgramSpecialization')->get();
        
        if (count($specialization) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'specialization'=> $specialization,
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

    public function GetBatchs() {
        $batches = DB::table('vwFacultyBatches')->get();

        if (count($batches) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'batches'=> $batches,
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