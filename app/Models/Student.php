<?php
namespace App\Models;
use Illuminate\Datebase\Eloquent\Model;


if(class_exists('Illuminate\Datebase\Eloquent\Model')){
    echo 'exists';
}else{
    echo 'no';
}

class Student extends Model {
    public $timestamps = false;
}