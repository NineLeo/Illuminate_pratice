<?php
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Container\Container;

class WelcomeController {
    public function index () {
        $student = Student::first();
        $data = $student->getAttributes();
        $app = Container::getInstance();

        $factory = $app->make('view');
        return $factory->make('welcome')->with('data',$data);
    }
}