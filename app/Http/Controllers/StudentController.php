<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show()
    {
        // For casts , hidden , appends
        // $students = Student::all();
        
        // For Lcoal Scope
        //instead of where clause we added GreaterId and Address
        // $students = Student::where('id', '>', 10)->whereNotNull('address')->get();
        // $students = Student::GreaterId()->Address()->get();

        // Global Scope
        // $students = Student::all();
        // $students = Student::withoutGlobalScopes()->get();
        // $students = Student::withoutGlobalScope('address')->get();

        //Eloquent Events
        // $students = new Student();
        // $students->name = 'usama';
        // $students->address = 'street abc , xyz city';
        // $students->date_of_birth = '2000-03-10';
        // $students->phone = '2342342';
        // $students->user_id = 1;
        // $students->save();

        // Accessors
         //Eloquent Events
         $students = new Student();
         $students->name = 'usama';
         $students->address = 'street abc , xyz city';
         $students->date_of_birth = '2000-03-10';
         $students->phone = '2342342';
         $students->user_id = 1;
         $students->save();
        return $students;
    }
}
