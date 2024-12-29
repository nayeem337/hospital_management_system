<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillInvoice extends Model
{
    use HasFactory;

    private static $billinvoice, $image, $imageName, $directory, $imageUrl;

//    public static function getImageUrl($request)
//    {
//        self::$image        = $request->file('image');
//        self::$imageName    = self::$image->getClientOriginalName();
//        self::$directory    = 'upload/billinvoice-images/';
//        self::$image->move(self::$directory, self::$imageName);
//        self::$imageUrl     = self::$directory.self::$imageName;
//        return self::$imageUrl;
//    }

    public static function newMBillInvoice($request)
    {
        self::$billinvoice = new BillInvoice();
        self::$billinvoice->user_id            = $request->user_id;
        self::$billinvoice->hospital           = $request->hospital;
        self::$billinvoice->hospital_tk        = $request->hospital_tk;
        self::$billinvoice->lab                = $request->lab;
        self::$billinvoice->lab_tk             = $request->lab_tk;
        self::$billinvoice->medicine           = $request->medicine;
        self::$billinvoice->medicine_tk        = $request->medicine_tk;
        self::$billinvoice->consulation        = $request->consulation;
        self::$billinvoice->consulation_tk     = $request->consulation_tk;
//      self::$billinvoice->image          = self::getImageUrl($request);
        self::$billinvoice->save();
    }



    public static function updateBillInvoice($request, $id)
    {
        self::$billinvoice = BillInvoice::find($id);
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
        self::$billinvoice->user_id         = $request->user_id;
        self::$billinvoice->hospital           = $request->hospital;
        self::$billinvoice->hospital_tk        = $request->hospital_tk;
        self::$billinvoice->lab                = $request->lab;
        self::$billinvoice->lab_tk             = $request->lab_tk;
        self::$billinvoice->medicine           = $request->medicine;
        self::$billinvoice->medicine_tk        = $request->medicine_tk;
        self::$billinvoice->consulation        = $request->consulation;
        self::$billinvoice->consulation_tk     = $request->consulation_tk;
//        self::$medicien->image          = self::$imageUrl;

        self::$billinvoice->save();
    }

    public static function deleteBillInvoice($id)
    {
        self::$billinvoice = BillInvoice::find($id);
//        if (file_exists(self::$billinvoice->image))
//        {
//            unlink(self::$billinvoice->image);
//        }
        self::$billinvoice->delete($id);
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'pataint_id','id');
    }
}
