<?php
namespace App\Http\Controllers;
use App\Models\Student;

class WelcomeController {
    public function index () {
        $student = Student::first();
        $data = $student->getAttributes();
        print_r($data);
    }
}