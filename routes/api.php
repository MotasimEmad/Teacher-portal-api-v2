<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\Api'], function(){
    // Auth Routes
    Route::post('user/login','AuthController@Login');
    Route::get('get_user_data/{id}', 'AuthController@GetUserData');
    Route::put('update_user_data/{id}', 'AuthController@UpdateUserData');

    // News & Events Routes
    Route::get('current_events', 'NewsEventsController@CurrentNewsAndEvents');
    Route::get('coming_events', 'NewsEventsController@ComingNewsAndEvents');
    Route::get('search_news_and_events_fac/{faculty}', 'NewsEventsController@SearchNewsAndEventsFaculty');
    Route::get('search_news_and_events_pro/{program}', 'NewsEventsController@SearchNewsAndEventsProgram');
    Route::get('search_news_and_events_spa/{specialization}', 'NewsEventsController@SearchNewsAndEventsSpecialization');
    Route::get('search_news_and_events_bat/{batch}', 'NewsEventsController@SearchNewsAndEventsBatch');
    Route::get('filter_event_by_date/{dateFrom}/{dateTo}', 'NewsEventsController@SearchNewsAndEventsByDate');
    Route::get('filter_event_by_name/{event_name}', 'NewsEventsController@SearchNewsAndEventsByName');
    Route::get('filter_event/{faculty}/{program}/{specialization}/{batch}/{event_name}/{dateFrom}/{dateTo}', 'NewsEventsController@FilterEvents');

    // News & Events Routes (By Faculty) 
    Route::get('search_news_and_events_faculty_program/{faculty}/{program}', 'NewsEventsController@SearchNewsAndEventsFacultyProgram');
    Route::get('search_news_and_events_faculty_specialization/{faculty}/{specialization}', 'NewsEventsController@SearchNewsAndEventsFacultySpecialization');
    Route::get('search_news_and_events_faculty_batch/{faculty}/{batch}', 'NewsEventsController@SearchNewsAndEventsFacultyBatch');
    Route::get('search_news_and_events_faculty_name/{faculty}/{event_name}', 'NewsEventsController@SearchNewsAndEventsFacultyName');
    Route::get('search_news_and_events_faculty_date/{faculty}/{dateFrom}/{dateTo}', 'NewsEventsController@SearchNewsAndEventsFacultyDate');
    Route::get('search_news_and_events_faculty_program_specialization/{faculty}/{program}/{specialization}', 'NewsEventsController@SearchNewsAndEventsFacultyProgramSpecialization');
    Route::get('search_news_and_events_faculty_program_batch/{faculty}/{program}/{batch}', 'NewsEventsController@SearchNewsAndEventsFacultyProgramBatch');
    Route::get('search_news_and_events_faculty_program_name/{faculty}/{program}/{event_name}', 'NewsEventsController@SearchNewsAndEventsFacultyProgramName');
    Route::get('search_news_and_events_faculty_program_date/{faculty}/{program}/{dateFrom}/{dateTo}', 'NewsEventsController@SearchNewsAndEventsFacultyProgramDate');
    Route::get('search_news_and_events_faculty_program_specialization_batch/{faculty}/{program}/{specialization}/{batch}', 'NewsEventsController@SearchNewsAndEventsFacultyProgramSpecializationBatch');
    Route::get('search_news_and_events_faculty_program_specialization_name/{faculty}/{program}/{specialization}/{name}', 'NewsEventsController@SearchNewsAndEventsFacultyProgramSpecializationName');
    Route::get('search_news_and_events_faculty_program_specialization_date/{faculty}/{program}/{specialization}/{dateFrom}/{dateTo}', 'NewsEventsController@SearchNewsAndEventsFacultyProgramSpecializationDate');

    // News & Events Routes (By Program) 
    Route::get('search_news_and_events_program_specialization/{program}/{specialization}', 'NewsEventsController@SearchNewsAndEventsProgramSpecialization');
    Route::get('search_news_and_events_program_batch/{program}/{batch}', 'NewsEventsController@SearchNewsAndEventsProgramBatch');
    Route::get('search_news_and_events_program_name/{program}/{event_name}', 'NewsEventsController@SearchNewsAndEventsProgramName');
    Route::get('search_news_and_events_program_date/{program}/{dateFrom}/{dateTo}', 'NewsEventsController@SearchNewsAndEventsProgramDate');
    Route::get('search_news_and_events_program_specialization_batch/{program}/{specialization}/{batch}', 'NewsEventsController@SearchNewsAndEventsProgramSpecializationBatch');
    Route::get('search_news_and_events_program_specialization_name/{program}/{specialization}/{event_name}', 'NewsEventsController@SearchNewsAndEventsProgramSpecializationName');
    Route::get('search_news_and_events_program_specialization_date/{program}/{specialization}/{dateFrom}/{dateTo}', 'NewsEventsController@SearchNewsAndEventsProgramSpecializationDate');
    Route::get('search_news_and_events_program_specialization_batch_name/{program}/{specialization}/{batch}/{event_name}', 'NewsEventsController@SearchNewsAndEventsProgramSpecializationBatchName');
    Route::get('search_news_and_events_program_specialization_batch_date/{program}/{specialization}/{batch}/{dateFrom}/{dateTo}', 'NewsEventsController@SearchNewsAndEventsProgramSpecializationBatchDate');

    // News & Events Routes (By Specialization) 
    Route::get('search_news_and_events_specialization_batch/{specialization}/{batch}', 'NewsEventsController@SearchNewsAndEventsSpecializationBatch');
    Route::get('search_news_and_events_specialization_name/{specialization}/{event_name}', 'NewsEventsController@SearchNewsAndEventsSpecializationName');
    Route::get('search_news_and_events_specialization_date/{specialization}/{dateFrom}/{dateTo}', 'NewsEventsController@SearchNewsAndEventsSpecializationDate');
    Route::get('search_news_and_events_specialization_batch_name/{specialization}/{batch}/{event_name}', 'NewsEventsController@SearchNewsAndEventsSpecializationBatchName');
    Route::get('search_news_and_events_specialization_batch_date/{specialization}/{batch}/{dateFrom}/{dateTo}', 'NewsEventsController@SearchNewsAndEventsSpecializationBatchDate');

    // News & Events Routes (By Batch) 
    Route::get('search_news_and_events_batch_name/{batch}/{event_name}', 'NewsEventsController@SearchNewsAndEventsBatchName');
    Route::get('search_news_and_events_batch_date/{batch}/{dateFrom}/{dateTo}', 'NewsEventsController@SearchNewsAndEventsBatchDate');
    Route::get('search_news_and_events_batch_name_date/{batch}/{event_name}/{dateFrom}/{dateTo}', 'NewsEventsController@SearchNewsAndEventsBatchNameDate');
  
    // News & Events Routes (By Name) 
    Route::get('search_news_and_events_name_date/{event_name}/{dateFrom}/{dateTo}', 'NewsEventsController@SearchNewsAndEventsNameDate');

    // News & Events Routes 2
    Route::get('search_news_and_events_faculty_program/{faculty}/{program}', 'NewsEventsController@SearchNewsAndEventsFacultyProgram');
    Route::get('search_news_and_events_faculty_specializationy/{faculty}/{specializationy}', 'NewsEventsController@SearchNewsAndEventsFacultySpecialization');
    Route::get('search_news_and_events_faculty_batch/{faculty}/{batch}', 'NewsEventsController@SearchNewsAndEventsFacultyBatch');
    Route::get('search_news_and_events_faculty_name/{faculty}/{name}', 'NewsEventsController@SearchNewsAndEventsFacultyName');
    Route::get('search_news_and_events_faculty_date/{faculty}/{dateFrom}/{dateTo}', 'NewsEventsController@SearchNewsAndEventsFacultyDate');

    // Announcements Routes
    Route::get('announcements/{datefrom}/{dateto}', 'AnnouncementsController@GetAnnouncements');

    // Lists Routes
    Route::get('faculties', 'ListsController@GetFaculties');
    Route::get('programs', 'ListsController@GetPrograms');
    Route::get('specializations', 'ListsController@GetSpecialization');
    Route::get('batchs', 'ListsController@GetBatchs');

    // Exams Routes
    Route::get('pending_exams/{id}', 'ExamController@GetPendingExams');
    Route::get('operations', 'ExamController@GetOperations');
    Route::get('mcq/{id}', 'ExamController@GetMCQ');
    Route::put('update/{ExamID}', 'ExamController@updatePendingExam');
    Route::get('get_years', 'ExamController@GETYears');

    // Exams Routes (Course Exams History)
    Route::get('get_course_exam_by_faculty/{faculty}', 'ExamController@GetCourseExamByFaculty');
    Route::get('get_course_exam_by_program/{program}', 'ExamController@GetCourseExamByProgram');
    Route::get('get_course_exam_by_specializations/{specializations}', 'ExamController@GetCourseExamBySpecializations');
    Route::get('get_course_exam_by_batch/{batch}', 'ExamController@GetCourseExamByBatch');
    Route::get('get_course_exam_by_course/{title}', 'ExamController@GetCourseExamByTitle');
    Route::get('get_course_exam_by_date/{dateFrom}/{datefTo}', 'ExamController@GetCourseExamByDate');

    // Exams Routes (Course Exams History - Faculty)
    Route::get('get_course_exam_by_faculty_program/{faculty}/{program}', 'ExamController@GetCourseExamByFacultyProgram');
    Route::get('get_course_exam_by_faculty_specializations/{faculty}/{specializations}', 'ExamController@GetCourseExamByFacultySpecializations');
    Route::get('get_course_exam_by_faculty_batch/{faculty}/{batch}', 'ExamController@GetCourseExamByFacultyBatch');
    Route::get('get_course_exam_by_faculty_title/{faculty}/{title}', 'ExamController@GetCourseExamByFacultyTitle');
    Route::get('get_course_exam_by_faculty_date/{faculty}/{dateFrom}/{dateTo}', 'ExamController@GetCourseExamByFacultyDate');
    Route::get('get_course_exam_by_faculty_program_specializations/{faculty}/{program}/{specializations}', 'ExamController@GetCourseExamByFacultyProgramSpecializations');
    Route::get('get_course_exam_by_faculty_program_batch/{faculty}/{program}/{batch}', 'ExamController@GetCourseExamByFacultyProgramBatch');
    Route::get('get_course_exam_by_faculty_program_title/{faculty}/{program}/{title}', 'ExamController@GetCourseExamByFacultyProgramTitle');
    Route::get('get_course_exam_by_faculty_program_date/{faculty}/{program}/{dateFrom}/{dateTo}', 'ExamController@GetCourseExamByFacultyProgramDate');
    Route::get('get_course_exam_by_faculty_program_specializations_batch/{faculty}/{program}/{specializations}/{batch}', 'ExamController@GetCourseExamByFacultyProgramSpecializationsBatch');
    Route::get('get_course_exam_by_faculty_program_specializations_title/{faculty}/{program}/{specializations}/{title}', 'ExamController@GetCourseExamByFacultyProgramSpecializationsTitle');
    Route::get('get_course_exam_by_faculty_program_specializations_date/{faculty}/{program}/{specializations}/{dateFrom}/{dateTo}', 'ExamController@GetCourseExamByFacultyProgramSpecializationsDate');


    // Exams Routes (Course Exams History - Program)
    Route::get('get_course_exam_by_program_specializations/{program}/{specializations}', 'ExamController@GetCourseExamByProgramSpecializations');
    Route::get('get_course_exam_by_program_batch/{program}/{batch}', 'ExamController@GetCourseExamByProgramBatch');
    Route::get('get_course_exam_by_program_title/{program}/{title}', 'ExamController@GetCourseExamByProgramTitle');
    Route::get('get_course_exam_by_program_date/{program}/{dateFrom}/{dateTo}', 'ExamController@GetCourseExamByProgramDate');
    Route::get('get_course_exam_by_program_specializations_batch/{program}/{specializations}/{batch}', 'ExamController@GetCourseExamByProgramSpecializationsBatch');
    Route::get('get_course_exam_by_program_specializations_title/{program}/{specializations}/{title}', 'ExamController@GetCourseExamByProgramSpecializationsTitle');
    Route::get('get_course_exam_by_program_specializations_date/{program}/{specializations}/{dateFrom}/{dateTo}', 'ExamController@GetCourseExamByProgramSpecializationsDate');
    Route::get('get_course_exam_by_program_specializations_batch_title/{program}/{specializations}/{batch}/{title}', 'ExamController@GetCourseExamByProgramSpecializationsBatchTitle');
    Route::get('get_course_exam_by_program_specializations_batch_date/{program}/{specializations}/{batch}/{dateFrom}/{dateTo}', 'ExamController@GetCourseExamByProgramSpecializationsBatchDate');


    // Exams Routes (Course Exams History - Specializations)
    Route::get('get_course_exam_by_specializations_batch/{specializations}/{batch}', 'ExamController@GetCourseExamBySpecializationsBatch');
    Route::get('get_course_exam_by_specializations_title/{specializations}/{title}', 'ExamController@GetCourseExamBySpecializationsTitle');
    Route::get('get_course_exam_by_specializations_date/{specializations}/{dateFrom}/{dateTo}', 'ExamController@GetCourseExamBySpecializationsDate');
    Route::get('get_course_exam_by_specializations_batch_title/{specializations}/{batch}/{title}', 'ExamController@GetCourseExamBySpecializationsBatchTitle');
    Route::get('get_course_exam_by_specializations_batch_date/{specializations}/{batch}/{dateFrom}/{dateTo}', 'ExamController@GetCourseExamBySpecializationsBatchDate');
    Route::get('get_course_exam_by_specializations_batch_date/{specializations}/{batch}/{title}/{dateFrom}/{dateTo}', 'ExamController@GetCourseExamBySpecializationsBatchTitleDate');
    
    // Exams Routes (Course Exams History - Batch)
    Route::get('get_course_exam_by_batch_title/{batch}/{title}', 'ExamController@GetCourseExamByBatchTitle');
    Route::get('get_course_exam_by_batch_date/{batch}/{dateFrom}/{dateTo}', 'ExamController@GetCourseExamByBatchDate');
    Route::get('get_course_exam_by_batch_title/{batch}/{title}/{dateFrom}/{dateTo}', 'ExamController@GetCourseExamByBatchTitleDate');

    
    // Exams Routes (Course Exams History - Title)
    Route::get('get_course_exam_by_batch_title_date/{title}/{dateFrom}/{dateTo}', 'ExamController@GetCourseExamByTitleDate');

    // Library Routes (Books)
    Route::get('get_book_by_name/{name}', 'LibraryController@GetBookByName');
    Route::get('get_book_by_authors/{authors}', 'LibraryController@GetBookByAuthors');
    Route::get('get_book_by_faculty/{faculty}', 'LibraryController@GetBookByFaculty');
    Route::get('get_book_by_year/{year}', 'LibraryController@GetBookByYear');
    Route::get('get_book_by_all/{name}/{authors}/{faculty}/{year}', 'LibraryController@GetBookByAFll');
    Route::get('get_book_by_name_authors/{name}/{authors}', 'LibraryController@GetBookByNameAuthors');
    Route::get('get_book_by_name_faculty/{name}/{faculty}', 'LibraryController@GetBookByNameFaculty');
    Route::get('get_book_by_name_year/{name}/{year}', 'LibraryController@GetBookByNameYear');
    Route::get('get_book_by_authors_faculty/{authors}/{faculty}', 'LibraryController@GetBookByAuthorsFaculty');
    Route::get('get_book_by_authors_year/{authors}/{year}', 'LibraryController@GetBookByAuthorsYear');
    Route::get('get_book_by_faculty_year/{faculty}/{year}', 'LibraryController@GetBookByFacultyYear');

    // Library Routes (Publications)
    Route::get('get_book_by_name_publications/{name}', 'LibraryController@GetBookByNamePublications');
    Route::get('get_book_by_faculty_publications/{faculty}', 'LibraryController@GetBookByFacultyPublications');
    Route::get('get_book_by_authors_publications/{authors}', 'LibraryController@GetBookByAuthorsPublications');
    Route::get('get_book_by_year_publications/{year}', 'LibraryController@GetBookByYearPublications');

});
