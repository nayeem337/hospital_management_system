<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    private static $teacher, $image, $imageName, $directory, $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('image');
        self::$imageName    = self::$image->getClientOriginalName();
        self::$directory    = 'upload/teacher-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newTeacher($request)
    {
        self::$teacher = new Teacher();
        self::$teacher->first_name            = $request->first_name;
        self::$teacher->last_name             = $request->last_name;
        self::$teacher->date_of_birth         = $request->date_of_birth;
        self::$teacher->deparment             = $request->deparment;
        self::$teacher->banka_ccount          = $request->banka_ccount;
        self::$teacher->designation           = $request->designation;
        self::$teacher->nationality           = $request->nationality;

        self::$teacher->image                 = self::getImageUrl($request);
        self::$teacher->email                 = $request->email;
        self::$teacher->phone                 = $request->phone;
        self::$teacher->password              = bcrypt($request->password);
        self::$teacher->confirm_password      = bcrypt($request->confirm_password);
        self::$teacher->gender                = $request->gender;
        self::$teacher->save();
    }

//    public static function updateTeacher($request, $id)
//    {
//        self::$teacher = Teacher::find($id);
//        if ($request->file('image'))
//        {
//            if (file_exists(self::$teacher->image))
//            {
//                unlink(self::$teacher->image);
//            }
//            self::$imageUrl = self::getImageUrl($request);
//        }
//        else
//        {
//            self::$imageUrl = self::$teacher->image;
//        }
//
//        self::$teacher->name           = $request->name;
//        self::$teacher->description    = $request->description;
//        self::$teacher->image          = self::$imageUrl;
//        self::$teacher->status         = $request->status;
//        self::$teacher->save();
//    }
//
//    public static function deleteTeacher($id)
//    {
//        self::$teacher = Teacher::find($id);
//        if (file_exists(self::$teacher->image))
//        {
//            unlink(self::$teacher->image);
//        }
//        self::$teacher->delete($id);
//    }



}
