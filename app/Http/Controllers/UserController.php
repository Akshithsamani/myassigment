<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Course;
use Auth;
use Session;

class UserController extends Controller
{
    
    // Home page
    
    public function index()
    {
    	
    		$data = file_get_contents("https://api.coursera.org/api/courses.v1");

            $courses = json_decode($data, true);

            $myCourses = Course::pluck('courseId')->toArray(); 

    	return view('index',compact('courses', 'myCourses'));		
    }

    public function addCourse($name, $type, $id, $slug)
    {

        $course = new Course;

        $course->name = $name;
        $course->courseId = $id;
        $course->type = $type;
        $course->slug = $slug;

        $course->save();

        Session::flash('Course Added' ,'success');

        return back();

    }

    public function deleteCourse($id)
    {
        Course::where('courseId', $id)->delete();
        
        return back();
    }
}
