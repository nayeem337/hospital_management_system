<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    use HasFactory;

    private static $diagnostic, $image, $imageName, $directory, $imageUrl;

//    public static function getImageUrl($request)
//    {
//        self::$image        = $request->file('image');
//        self::$imageName    = self::$image->getClientOriginalName();
//        self::$directory    = 'upload/diagnostic-images/';
//        self::$image->move(self::$directory, self::$imageName);
//        self::$imageUrl     = self::$directory.self::$imageName;
//        return self::$imageUrl;
//    }

    public static function newDiagnostic($request)
    {
        self::$diagnostic = new Diagnostic();
        self::$diagnostic->diagnostic_name   = $request->diagnostic_name;
        self::$diagnostic->price             = $request->price;

//      self::$diagnostic->image             = self::getImageUrl($request);
        self::$diagnostic->save();
    }

    public static function updateDiagnostic($request, $id)
    {
        self::$diagnostic = Diagnostic::find($id);
//        if ($request->file('image'))
//        {
//            if (file_exists(self::$diagnostic->image))
//            {
//                unlink(self::$diagnostic->image);
//            }
//            self::$imageUrl = self::getImageUrl($request);
//        }
//        else
//        {
//            self::$imageUrl = self::$medicien->image;
//        }
        self::$diagnostic->diagnostic_name   = $request->diagnostic_name;
        self::$diagnostic->price             = $request->price;;
//       self::$medicien->image              = self::$imageUrl;
        self::$diagnostic->save();
    }

    public static function deleteDiagnostic($id)
    {
        self::$diagnostic = Diagnostic::find($id);
//        if (file_exists(self::$diagnostic->image))
//        {
//            unlink(self::$diagnostic->image);
//        }
        self::$diagnostic->delete($id);
    }
}
