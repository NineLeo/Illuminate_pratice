<?php
namespace App\Http\Controllers;
use App\Models\Student;

class WelcomeController {
    public function index () {
        $student = Student::first();
        print_r($student);
    }
}