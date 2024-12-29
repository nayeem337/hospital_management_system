<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    private static $country, $image, $imageName, $directory, $imageUrl;

//    public static function getImageUrl($request)
//    {
//        self::$image        = $request->file('image');
//        self::$imageName    = self::$image->getClientOriginalName();
//        self::$directory    = 'upload/country-images/';
//        self::$image->move(self::$directory, self::$imageName);
//        self::$imageUrl     = self::$directory.self::$imageName;
//        return self::$imageUrl;
//    }

    public static function newCountry($request)
    {
        self::$country = new Country();
        self::$country->country_name   = $request->country_name;

//      self::$country->image             = self::getImageUrl($request);
        self::$country->save();
    }

    public static function updateCountry($request, $id)
    {
        self::$country = Country::find($id);
//        if ($request->file('image'))
//        {
//            if (file_exists(self::$country->image))
//            {
//                unlink(self::$country->image);
//            }
//            self::$imageUrl = self::getImageUrl($request);
//        }
//        else
//        {
//            self::$imageUrl = self::$country->image;
//        }
        self::$country->country_name   = $request->country_name;
//       self::$medicien->image              = self::$imageUrl;
        self::$country->save();
    }

    public static function deleteCountry($id)
    {
        self::$country = Country::find($id);
//        if (file_exists(self::$diagnostic->image))
//        {
//            unlink(self::$diagnostic->image);
//        }
        self::$country->delete($id);
    }
}
