<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function GetBookByName($name) {
        $books = DB::connection('sqlsrv2')->table('VBookAuthors')
        ->select('Book_Id', 'Title', 'Authors', 'Publisher_Date')->where('Title', '=', $name)->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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

    public function GetBookByAuthors($authors) {
        $books = DB::connection('sqlsrv2')->table('VBookAuthors')
        ->select('Book_Id', 'Title', 'Authors', 'Publisher_Date')->where('Authors', '=', $authors)->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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

    public function GetBookByFaculty($faculty) {
        $books = DB::connection('sqlsrv2')->table('VBookAuthors')
        ->select('Book_Id', 'Title', 'Authors', 'Publisher_Date')->where('FacultyNo', '=', $faculty)->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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

    public function GetBookByYear($year) {
        $books = DB::connection('sqlsrv2')->table('VBookAuthors') 
        ->select('Book_Id', 'Title', 'Authors', 'Publisher_Date')->where('Publisher_Date', '=', $year)->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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

    public function GetBookByNameAuthors($name, $authors) {
        $books = DB::connection('sqlsrv2')->table('VBookAuthors')
        ->select('Book_Id', 'Title', 'Authors', 'Publisher_Date')
        ->where('Title', '=', $name)
        ->where('Authors', '=', $authors)
        ->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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

    public function GetBookByNameFaculty($name, $faculty) {
        $books = DB::connection('sqlsrv2')->table('VBookAuthors')
        ->select('Book_Id', 'Title', 'Authors', 'Publisher_Date')
        ->where('Title', '=', $name)
        ->where('FacultyNo', '=', $faculty)
        ->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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

    public function GetBookByNameYear($name, $year) {
        $books = DB::connection('sqlsrv2')->table('VBookAuthors')
        ->select('Book_Id', 'Title', 'Authors', 'Publisher_Date')
        ->where('Title', '=', $name)
        ->where('Publisher_Date', '=', $year)
        ->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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

    public function GetBookByAuthorsFaculty($authors, $faculty) {
        $books = DB::connection('sqlsrv2')->table('VBookAuthors')
        ->select('Book_Id', 'Title', 'Authors', 'Publisher_Date')
        ->where('Authors', '=', $authors)
        ->where('FacultyNo', '=', $faculty)
        ->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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

    public function GetBookByAuthorsYear($authors, $year) {
        $books = DB::connection('sqlsrv2')->table('VBookAuthors')
        ->select('Book_Id', 'Title', 'Authors', 'Publisher_Date')
        ->where('Authors', '=', $authors)
        ->where('Publisher_Date', '=', $year)
        ->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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

    public function GetBookByFacultyYear($faculty, $year) {
        $books = DB::connection('sqlsrv2')->table('VBookAuthors')
        ->select('Book_Id', 'Title', 'Authors', 'Publisher_Date')
        ->where('FacultyNo', '=', $faculty)
        ->where('Publisher_Date', '=', $year)
        ->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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

    public function GetBookByAll($name, $authors, $faculty, $year) {
        $books = DB::connection('sqlsrv2')->table('VBookAuthors')
        ->select('Book_Id', 'Title', 'Authors', 'Publisher_Date')
        ->where('Title', '=', $name)
        ->where('Authors', '=', $authors)
        ->where('FacultyNo', '=', $faculty)
        ->where('Publisher_Date', '=', $year)
        ->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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

    ////////////////////////////////////////////////////////////////////////////////////////////

    public function GetBookByNamePublications($name) {
        $books = DB::connection('sqlsrv2')->table('VPublication')->where('Tittle', '=', $name)->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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

    public function GetBookByFacultyPublications($faculty) {
        $books = DB::connection('sqlsrv2')->table('VPublication')->where('Facultyno', '=', $faculty)->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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

    public function GetBookByAuthorsPublications($authors) {
        $books = DB::connection('sqlsrv2')->table('VPublication')->where('Authors', '=', $authors)->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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

    public function GetBookByYearPublications($year) {
        $books = DB::connection('sqlsrv2')->table('VPublication')->where('Year', '=', $year)->get();
        
        if (count($books) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'books'=> $books,
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
