<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    private static $staff, $image, $imageName, $directory, $imageUrl;

//    public static function getImageUrl($request)
//    {
//        self::$image        = $request->file('image');
//        self::$imageName    = self::$image->getClientOriginalName();
//        self::$directory    = 'upload/student-images/';
//        self::$image->move(self::$directory, self::$imageName);
//        self::$imageUrl     = self::$directory.self::$imageName;
//        return self::$imageUrl;
//    }


    public static function newStaff($request)
    {
        self::$staff = new Staff();
        self::$staff->first_name        = $request->first_name;
        self::$staff->last_name         = $request->last_name;
        self::$staff->date_of_birth     = $request->date_of_birth;
        self::$staff->staff_type        = $request->staff_type;
        self::$staff->staff_deparment   = $request->staff_deparment;
        self::$staff->nationality       = $request->nationality;
        self::$staff->banka_account     = $request->banka_account;
        self::$staff->designation       = $request->designation;
        self::$staff->email             = $request->email;
        self::$staff->phone             = $request->phone;
        self::$staff->password          = bcrypt($request->password);
        self::$staff->confirm_password  = bcrypt($request->confirm_password);
        self::$staff->gender            = $request->gender;
//      self::$staff->image             = self::getImageUrl($request);
        self::$staff->save();
    }

}
