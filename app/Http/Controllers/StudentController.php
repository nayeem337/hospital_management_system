<?php

namespace App\Http\Controllers;

use App\Helper\Helpers;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;

use App\Mail\SendSmsCode;
use Illuminate\Support\Facades\Mail;



class StudentController extends Controller
{




    public function createNew(Request $request)
    {
//        dd($request->all());

        $validated = $request->validate([
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'nullable',
            'designation' => 'nullable',
            'phone' => 'required|string|max:15',
            'date_of_birth' => 'required|date',
            'bank_account' => 'nullable',
            'gender' => 'nullable',
            'user_type' => 'nullable|string',
            'degree' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'nationality' => 'nullable'
        ]);

// Create a new User model instance
        $code = Helpers::generateRandomCode(6);

        $user = new User();

        $user->sms_code = $code;

        $user->email             = $request->input('email');
        $user->name              = $request->input('first_name');
        $user->last_name         = $request->input('last_name');
        $user->phone             = $request->input('phone');
        $user->password          = Hash::make($request->input('password'));
        $user->confirm_password  = Hash::make($request->input('confirm_password'));
        $user->date_of_birth     = $request->input('date_of_birth');
        $user->gender            = $request->input('gender');
        $user->bank_account      = $request->input('bank_account');
        $user->nationality       = $request->input('nationality');
        $user->user_type         = $request->input('user_type');

        $user->save();

        Mail::to($user->email)->send(new SendSmsCode($code));


// Handle file upload if an image is provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/images', 'public');
        }

// Create a new Patient model instance
        $patient = new Patient();
        $patient->user_id      = $user->id;
        $patient->degree       = $request->input('degree');
        $patient->designation  = $request->input('designation');
        $patient->image        = $imagePath;

// Save the patient to the database
        $patient->save();

        return redirect()->back()->with('success', 'Your message here!');

    }



}
