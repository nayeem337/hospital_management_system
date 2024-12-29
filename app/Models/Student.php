<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    private static $student, $image, $imageName, $directory, $imageUrl;

//    public static function getImageUrl($request)
//    {
//        self::$image        = $request->file('image');
//        self::$imageName    = self::$image->getClientOriginalName();
//        self::$directory    = 'upload/student-images/';
//        self::$image->move(self::$directory, self::$imageName);
//        self::$imageUrl     = self::$directory.self::$imageName;
//        return self::$imageUrl;
//    }

    public static function newStudent($request)
    {
        self::$student = new Student();
        self::$student->first_name         = $request->first_name;
        self::$student->last_name          = $request->last_name;
        self::$student->student_id         = $request->student_id;
        self::$student->date_of_birth      = $request->date_of_birth;
        self::$student->degree             = $request->degree;
        self::$student->deparment          = $request->deparment;
        self::$student->residential        = $request->residential;
        self::$student->nationality        = $request->nationality;
        self::$student->banka_ccount       = $request->banka_ccount;
        self::$student->email              = $request->email;
        self::$student->phone              = $request->phone;
        self::$student->password           = bcrypt($request->password);
        self::$student->confirm_password   = bcrypt($request->confirm_password);
        self::$student->gender             = $request->gender;
//      self::$student->image              = self::getImageUrl($request);
        self::$student->save();
    }
}
