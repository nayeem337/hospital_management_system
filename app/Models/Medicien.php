<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicien extends Model
{
    use HasFactory;

    private static $medicien, $image, $imageName, $directory, $imageUrl;

//    public static function getImageUrl($request)
//    {
//        self::$image        = $request->file('image');
//        self::$imageName    = self::$image->getClientOriginalName();
//        self::$directory    = 'upload/medicien-images/';
//        self::$image->move(self::$directory, self::$imageName);
//        self::$imageUrl     = self::$directory.self::$imageName;
//        return self::$imageUrl;
//    }

    public static function newMedicien($request)
    {
        self::$medicien = new Medicien();
        self::$medicien->company_name    = $request->company_name;
        self::$medicien->medicine_name   = $request->medicien_name;
        self::$medicien->generic_name   = $request->generic_name;

//      self::$medicien->image          = self::getImageUrl($request);
        self::$medicien->save();
    }

    public static function updateMedicien($request, $id)
    {
        self::$medicien = Medicien::find($id);
//        if ($request->file('image'))
//        {
//            if (file_exists(self::$medicien->image))
//            {
//                unlink(self::$medicien->image);
//            }
//            self::$imageUrl = self::getImageUrl($request);
//        }
//        else
//        {
//            self::$imageUrl = self::$medicien->image;
//        }
        self::$medicien->company_name    = $request->company_name;
        self::$medicien->medicien_name   = $request->medicien_name;
        self::$medicien->generic_name   = $request->generic_name;
//        self::$medicien->image          = self::$imageUrl;

        self::$medicien->save();
    }

    public static function deleteMedicien($id)
    {
        self::$medicien = Medicien::find($id);
//        if (file_exists(self::$medicien->image))
//        {
//            unlink(self::$medicien->image);
//        }
        self::$medicien->delete($id);
    }


}
