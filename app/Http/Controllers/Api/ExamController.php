<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function GetPendingExams($id) {
        $pendingExams = DB::connection('sqlsrv3')->table('vwExamPapersInfo')
        ->where('IsExaminerApproved', '=', '0')
        ->where('ExaminerNo', '=', $id)->get();
        
        if (count($pendingExams) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'pendingExams'=> $pendingExams,
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

    public function GetOperations() {
        $operations = DB::connection('sqlsrv3')->table('vwExamPapersInfo')
        ->where('IsExaminerApproved', '=', '1')
        // ->where('ExaminerNo', '=', $id)
        // ->where('PaperDate','>=', $beginYear)
        // ->where('PaperDate','<=', $endYear)
        ->get();
        
        if (count($operations) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'operations'=> $operations,
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

    public function GetMCQ($id) {
        $mcq = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->where('IsMcqExam', '=', '1')
        ->where('ExaminerNo', '=', $id)->get();
        
        if (count($mcq) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'mcq'=> $mcq,
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

    public function updatePendingExam(Request $request, $PaperID) {
        $pending = DB::connection('sqlsrv3')->table('Paper');
        if ($pending->where('PaperID', $PaperID)->exists()) {
            $pending->update([
                'IsExaminerApproved' => $request['IsExaminerApproved']
            ]);

            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'pendingExams'=> $pendingExams,
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

    public function GETYears() {
        $years = DB::table('AcademicYears')->get();
        
        if (count($years) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $years,
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

    ///////////////////////////////////////////////////////////////////////////////////////////////////////

    public function GetCourseExamByFaculty($faculty) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyNo', '=', $faculty)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByProgram($program) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramNo', '=', $program)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamBySpecializations($specializations) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramSpecializationNo', '=', $specializations)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByBatch($batch) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyBatchNo', '=', $batch)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByTitle($title) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('PaperTitle', '=', $title)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByDate($dateFrom, $dateTo) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('PaperDate', '>=', $dateFrom)->
        where('PaperDate', '<=', $dateTo)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    // Faculity FUNCTION

    public function GetCourseExamByFacultyProgram($faculty, $program) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyNo', '=', $faculty)->
        where('FacultyProgramNo', '=', $program)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByFacultySpecializations($faculty, $specializations) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyNo', '=', $faculty)->
        where('FacultyProgramSpecializationNo', '=', $specializations)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByFacultyBatch($faculty, $batch) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyNo', '=', $faculty)->
        where('FacultyBatchNo', '=', $batch)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByFacultyTitle($faculty, $title) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyNo', '=', $faculty)->
        where('PaperTitle', '=', $title)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByFacultyDate($faculty, $dateFrom, $dateTo) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyNo', '=', $faculty)->
        where('PaperDate', '>=', $dateFrom)->
        where('PaperDate', '<=', $dateTo)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByFacultyProgramSpecializations($faculty, $program, $specializations) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyNo', '=', $faculty)->
        where('FacultyProgramNo', '=', $program)->
        where('FacultyProgramSpecializationNo', '=', $specializations)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByFacultyProgramBatch($faculty, $program, $batch) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyNo', '=', $faculty)->
        where('FacultyProgramNo', '=', $program)->
        where('FacultyBatchNo', '=', $batch)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByFacultyProgramTitle($faculty, $program, $title) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyNo', '=', $faculty)->
        where('FacultyProgramNo', '=', $program)->
        where('PaperTitle', '=', $title)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByFacultyProgramDate($faculty, $program, $dateFrom, $dateTo) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyNo', '=', $faculty)->
        where('FacultyProgramNo', '=', $program)->
        where('PaperDate', '>=', $dateFrom)->
        where('PaperDate', '<=', $dateTo)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByFacultyProgramSpecializationsBatch($faculty, $program, $specializations, $batch) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyNo', '=', $faculty)->
        where('FacultyProgramNo', '=', $program)->
        where('FacultyProgramSpecializationNo', '=', $specializations)->
        where('FacultyBatchNo', '=', $batch)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByFacultyProgramSpecializationsTitle($faculty, $program, $specializations, $title) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyNo', '=', $faculty)->
        where('FacultyProgramNo', '=', $program)->
        where('FacultyProgramSpecializationNo', '=', $specializations)->
        where('PaperTitle', '=', $title)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByFacultyProgramSpecializationsDate($faculty, $program, $specializations, $dateFrom, $dateTo) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyNo', '=', $faculty)->
        where('FacultyProgramNo', '=', $program)->
        where('FacultyProgramSpecializationNo', '=', $specializations)->
        where('PaperDate', '>=', $dateFrom)->
        where('PaperDate', '<=', $dateTo)->get();
        

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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


    // Faculity FUNCTION End

    /////////////////////////////////////////////////////////////////////////////

    // Program FUNCTION

    public function GetCourseExamByProgramSpecializations($program, $specializations) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramNo', '=', $program)->
        where('FacultyProgramSpecializationNo', '=', $specializations)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByProgramBatch($program, $batch) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramNo', '=', $program)->
        where('FacultyBatchNo', '=', $batch)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByProgramTitle($program, $title) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramNo', '=', $program)->
        where('PaperTitle', '=', $title)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByProgramDate($program, $dateFrom, $dateTo) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramNo', '=', $program)->
        where('PaperDate', '>=', $dateFrom)->
        where('PaperDate', '<=', $dateTo)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByProgramSpecializationsBatch($program, $specializations, $batch) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramNo', '=', $program)->
        where('FacultyProgramSpecializationNo', '=', $specializations)->
        where('FacultyBatchNo', '=', $batch)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByProgramSpecializationsTitle($program, $specializations, $title) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramNo', '=', $program)->
        where('FacultyProgramSpecializationNo', '=', $specializations)->
        where('PaperTitle', '=', $title)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByProgramSpecializationsDate($program, $specializations, $dateFrom, $dateTo) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramNo', '=', $program)->
        where('FacultyProgramSpecializationNo', '=', $specializations)->
        where('PaperDate', '>=', $dateFrom)->
        where('PaperDate', '<=', $dateTo)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByProgramSpecializationsBatchTitle($program, $specializations, $batch, $title) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramNo', '=', $program)->
        where('FacultyProgramSpecializationNo', '=', $specializations)->
        where('FacultyBatchNo', '=', $batch)->
        where('PaperTitle', '=', $title)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByProgramSpecializationsBatchDate($program, $specializations, $batch, $dateFrom, $dateTo) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramNo', '=', $program)->
        where('FacultyProgramSpecializationNo', '=', $specializations)->
        where('FacultyBatchNo', '=', $batch)->
        where('PaperDate', '>=', $dateFrom)->
        where('PaperDate', '<=', $dateTo)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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


    // Program FUNCTION End

    ////////////////////////////////////////////////////////////////////////////////
    // Program Specialization


    public function GetCourseExamBySpecializationsBatch($specializations, $batch) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramSpecializationNo', '=', $specializations)->
        where('FacultyBatchNo', '=', $batch)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamBySpecializationsTitle($specializations, $title) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramSpecializationNo', '=', $specializations)->
        where('PaperTitle', '=', $title)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamBySpecializationsDate($specializations, $dateFrom, $dateTo) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramSpecializationNo', '=', $specializations)->
        where('PaperDate', '>=', $dateFrom)->
        where('PaperDate', '<=', $dateTo)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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


    public function GetCourseExamBySpecializationsBatchTitle($specializations, $batch, $title) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramSpecializationNo', '=', $specializations)->
        where('FacultyBatchNo', '=', $batch)->
        where('PaperTitle', '=', $title)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamBySpecializationsBatchDate($specializations, $batch, $dateFrom, $dateTo) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramSpecializationNo', '=', $specializations)->
        where('FacultyBatchNo', '=', $batch)->
        where('PaperDate', '>=', $dateFrom)->
        where('PaperDate', '<=', $dateTo)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamBySpecializationsBatchTitleDate($specializations, $batch, $title, $dateFrom, $dateTo) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyProgramSpecializationNo', '=', $specializations)->
        where('FacultyBatchNo', '=', $batch)->
        where('PaperTitle', '=', $title)->
        where('PaperDate', '>=', $dateFrom)->
        where('PaperDate', '<=', $dateTo)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    // specializations FUNCTION End

    ///////////////////////////////////////////////////////////////////////////
    // Batch FUNCTION

    public function GetCourseExamByBatchTitle($batch, $title) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyBatchNo', '=', $batch)->
        where('PaperTitle', '=', $title)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByBatchDate($batch, $dateFrom, $dateTo) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyBatchNo', '=', $batch)->
        where('PaperDate', '>=', $dateFrom)->
        where('PaperDate', '<=', $dateTo)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    public function GetCourseExamByBatchTitleDate($batch, $title, $dateFrom, $dateTo) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('FacultyBatchNo', '=', $batch)->
        where('PaperTitle', '=', $title)->
        where('PaperDate', '>=', $dateFrom)->
        where('PaperDate', '<=', $dateTo)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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

    // Batch FUNCTION END

    /////////////////////////////////////////////////////////////////////////////////////
    // Title FUNCTION

    public function GetCourseExamByTitleDate($title, $dateFrom, $dateTo) {
        $courseExam = DB::connection('sqlsrv3')->table('vwExamPapersInfo')->
        where('PaperTitle', '=', $title)->
        where('PaperDate', '>=', $dateFrom)->
        where('PaperDate', '<=', $dateTo)->get();

        if (count($courseExam) > 0) {
            return response()->json(
                [
                    'statusCode'=> 200,
                    'error'=> false ,
                    'message'=> '' ,
                    'years'=> $courseExam,
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
