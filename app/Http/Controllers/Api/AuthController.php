<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function Login(Request $request)
    {
        $user = DB::table('Instructors')->where('Email', '=', $request->input('Email'))->where('Password', '=', $request->input('Password'))->first();
        if ($user) { 
            return response()->json(
                [
                    'error' => false,
                    'message' => '',
                    'data' => $user
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'error' => true,
                    'message' => 'Email Is Incorrect',
                    'code' => 1
                ],
                401
            );
        }
    }

    public function GetUserData($id) {
        $instructor =  DB::table('Instructors')->where('Email', '=' , $id)->get();
        if (count($instructor) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'instructor'=> $instructor,
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
                    'message' => 'Sorry, There is no data' ,
                ],
                404
            );
        }
    }

    public function updateUserData(Request $request, $id) {
        $user = DB::connection('sqlsrv')->table('Instructors');
        if ($user->where('InstructorId', $id)->exists()) {
            $user->update([
                'Password' => $request['Password']
            ]);

            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'user'=> $user,
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
