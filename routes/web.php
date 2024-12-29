<?php

use App\Models\FrontEnd;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\MedicienController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\IpdOpdController;
use App\Http\Controllers\BillInvoiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/tfft',[FrontEndController::class, 'indexhgg'])->name('tfft');
Route::get('/teacher', [FrontEndController::class, 'teacher'])->name('teacher');
Route::get('/student', [FrontEndController::class, 'student'])->name('student');
Route::get('/staff', [FrontEndController::class, 'staff'])->name('staff');


//patients start

//Route::post('/create-new', [TeacherController::class, 'createNew'])->name('create.new');
Route::post('/create-new-user', [StudentController::class, 'createNew'])->name('new.user');
//Route::post('/create-new-staff', [StaffController::class, 'createNew'])->name('new.staff');
//Route::get('/patient/manage', [UserController::class, 'manage'])->name('patient.manage');
//Route::get('/patient/edit/{id}', [UserController::class, 'edit'])->name('patient.edit');
//Route::post('/patient/update/{id}', [UserController::class, 'update'])->name('patient.update');
//Route::get('/patient/delete/{id}', [UserController::class, 'delete'])->name('patient.delete');
//new.student
//patients End


//// Start Medicien
//
//Route::get('/medicien/add', [MedicienController::class, 'index'])->name('medicien.add');
//Route::post('/medicien/new', [MedicienController::class, 'create'])->name('medicien.new');
//Route::get('/medicien/manage', [MedicienController::class, 'manage'])->name('medicien.manage');
//Route::get('/medicien/edit/{id}', [MedicienController::class, 'edit'])->name('medicien.edit');
//Route::post('/medicien/update/{id}', [MedicienController::class, 'update'])->name('medicien.update');
//Route::get('/medicien/delete/{id}', [MedicienController::class, 'delete'])->name('medicien.delete');
//
////End Medicien

Route::get('/lang',[
    'uses' => 'App\Http\Controllers\HomeController@lang',
    'as' => 'lang.index'
]);

Route::get('/', function () {
    try {
        DB::connection()->getPdo();
        if (!Schema::hasTable('application_settings'))
            return redirect('/install');
    } catch (\Exception $e) {
        return redirect('/install');
    }

    return view('frontend.index', ['contents' => json_decode(FrontEnd::find(1)->content)]);
});

Route::get('/about', function () {
    return view('frontend.about', ['contents' => json_decode(FrontEnd::find(2)->content)]);
});

Route::get('/services', function () {
    return view('frontend.services', ['contents' => json_decode(FrontEnd::find(3)->content)]);
});

Route::get('/contact', function () {
    return view('frontend.contact', ['contents' => json_decode(FrontEnd::find(4)->content)]);
});

Route::post('/contact-form', [App\Http\Controllers\ContactUsFormController::class, 'store'])->name('contact-form.store');

Auth::routes(['register' => false]);

Route::get('/install',[
    'uses' => 'App\Http\Controllers\InstallController@index',
    'as' => 'install.index'
]);

Route::post('/install',[
    'uses' => 'App\Http\Controllers\InstallController@install',
    'as' => 'install.install'
]);


Route::group(['middleware' => ['auth']], function() {
    Route::get('/company/companyAccountSwitch', [
        'uses' => 'App\Http\Controllers\CompanyController@companyAccountSwitch',
        'as' => 'company.companyAccountSwitch'
    ]);

    Route::get('/financial-reports', [App\Http\Controllers\FinancialReportController::class, 'index'])->name('financial-reports.index');

    Route::resources([
        'account-headers' => App\Http\Controllers\AccountHeaderController::class,
        'payments' => App\Http\Controllers\PaymentController::class,
        'hospital-departments' => App\Http\Controllers\HospitalDepartmentController::class,
        'doctor-details' => App\Http\Controllers\DoctorDetailController::class,
        'patient-details' => App\Http\Controllers\PatientDetailController::class,
        'doctor-schedules' => App\Http\Controllers\DoctorScheduleController::class,
        'patient-appointments' => App\Http\Controllers\PatientAppointmentController::class,
        'patient-case-studies' => App\Http\Controllers\PatientCaseStudyController::class,
        'prescriptions' => App\Http\Controllers\PrescriptionController::class,
        'lab-report-templates' => App\Http\Controllers\LabReportTemplateController::class,
        'lab-reports' => App\Http\Controllers\LabReportController::class,
        'front-ends' => App\Http\Controllers\FrontEndController::class,
        'contacts' => App\Http\Controllers\ContactUsController::class,
        'sms-apis' => App\Http\Controllers\SmsApiController::class,
        'sms-templates' => App\Http\Controllers\SmsTemplateController::class,
        'sms-campaigns' => App\Http\Controllers\SmsCampaignController::class,
        'email-templates' => App\Http\Controllers\EmailTemplateController::class,
        'email-campaigns' => App\Http\Controllers\EmailCampaignController::class,
        'insurances' => App\Http\Controllers\InsuranceController::class,
        'invoices' => App\Http\Controllers\InvoiceController::class,
        'roles' => App\Http\Controllers\RoleController::class,
        'users' => App\Http\Controllers\UserController::class,
        'currency' => App\Http\Controllers\CurrencyController::class,
        'tax' => App\Http\Controllers\TaxController::class,
        'smtp-configurations' => App\Http\Controllers\SmtpConfigurationController::class,
        'company' => App\Http\Controllers\CompanyController::class
    ]);

    Route::get('/search/medicine', [PrescriptionController::class, 'search_medicine'])->name('search.medicine');
    Route::get('/search/diagnosis', [PrescriptionController::class, 'search_diagnosis'])->name('search.diagnosis');

    Route::resource('ipd-opd', IpdOpdController::class);
    Route::get('/opd/view/{id}', [IpdOpdController::class, 'opdview'])->name('opd.view');




    Route::put('/front-ends/updateHome/{frontEnd}', [App\Http\Controllers\FrontEndController::class, 'updateHome'])->name('front-ends.updateHome');
    Route::put('/front-ends/updateContact/{frontEnd}', [App\Http\Controllers\FrontEndController::class, 'updateContact'])->name('front-ends.updateContact');
    Route::put('/front-ends/updateAbout/{frontEnd}', [App\Http\Controllers\FrontEndController::class, 'updateAbout'])->name('front-ends.updateAbout');
    Route::put('/front-ends/updateServices/{frontEnd}', [App\Http\Controllers\FrontEndController::class, 'updateServices'])->name('front-ends.updateServices');

    Route::get('/patient-appointments/get-schedule/doctorwise', [App\Http\Controllers\PatientAppointmentController::class, 'getScheduleDoctorWise'])->name('patient-appointments.getScheduleDoctorWise');
    Route::post('/labreport/generateTemplateData',[
        'uses' => 'App\Http\Controllers\LabReportController@generateTemplateData',
        'as' => 'labreport.generateTemplateData'
    ]);





    Route::post('/smsCampaign/generateTemplateData',[
        'uses' => 'App\Http\Controllers\SmsCampaignController@generateTemplateData',
        'as' => 'smsCampaign.generateTemplateData'
    ]);

    Route::post('/emailCampaign/generateTemplateData',[
        'uses' => 'App\Http\Controllers\EmailCampaignController@generateTemplateData',
        'as' => 'emailCampaign.generateTemplateData'
    ]);

    Route::get('/c/c', [App\Http\Controllers\CurrencyController::class, 'code'])->name('currency.code');

    Route::get('/update',[
        'uses' => 'App\Http\Controllers\UpdateController@index',
        'as' => 'update.index'
    ]);

    Route::get('/profile/setting',[
        'uses' => 'App\Http\Controllers\ProfileController@setting',
        'as' => 'profile.setting'
    ]);

    Route::post('/profile/updateSetting',[
        'uses' => 'App\Http\Controllers\ProfileController@updateSetting',
        'as' => 'profile.updateSetting'
    ]);
    Route::get('/profile/password',[
        'uses' => 'App\Http\Controllers\ProfileController@password',
        'as' => 'profile.password'
    ]);

    Route::post('/profile/updatePassword',[
        'uses' => 'App\Http\Controllers\ProfileController@updatePassword',
        'as' => 'profile.updatePassword'
    ]);
    Route::get('/profile/view',[
        'uses' => 'App\Http\Controllers\ProfileController@view',
        'as' => 'profile.view'
    ]);

});

Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard',[
    'uses' => 'App\Http\Controllers\DashboardController@index',
    'as' => 'dashboard'
    ]);

// Start Medicien
    Route::get('/medicien/add', [MedicienController::class, 'index'])->name('medicien.add');
    Route::post('/medicien/new', [MedicienController::class, 'create'])->name('medicien.new');
    Route::get('/medicien/manage', [MedicienController::class, 'manage'])->name('medicien.manage');
    Route::get('/medicien/edit/{id}', [MedicienController::class, 'edit'])->name('medicien.edit');
    Route::post('/medicien/update/{id}', [MedicienController::class, 'update'])->name('medicien.update');
    Route::get('/medicien/delete/{id}', [MedicienController::class, 'delete'])->name('medicien.delete');
//End Medicien


// Start Diagnostic
    Route::get('/diagnostic/add', [DiagnosticController::class, 'index'])->name('diagnostic.add');
    Route::post('/diagnostic/new', [DiagnosticController::class, 'create'])->name('diagnostic.new');
    Route::get('/diagnostic/manage', [DiagnosticController::class, 'manage'])->name('diagnostic.manage');
    Route::get('/diagnostic/edit/{id}', [DiagnosticController::class, 'edit'])->name('diagnostic.edit');
    Route::post('/diagnostic/update/{id}', [DiagnosticController::class, 'update'])->name('diagnostic.update');
    Route::get('/diagnostic/delete/{id}', [DiagnosticController::class, 'delete'])->name('diagnostic.delete');
//End Diagnostic


// Start Country

    Route::get('/country/add', [CountryController::class, 'index'])->name('country.add');
    Route::post('/country/new', [CountryController::class, 'create'])->name('country.new');
    Route::get('/country/manage', [CountryController::class, 'manage'])->name('country.manage');
    Route::get('/country/edit/{id}', [CountryController::class, 'edit'])->name('country.edit');
    Route::post('/country/update/{id}', [CountryController::class, 'update'])->name('country.update');
    Route::get('/country/delete/{id}', [CountryController::class, 'delete'])->name('country.delete');

//    End Country


// Start Bill Invoice
    Route::get('/bill-invoice/add', [BillInvoiceController::class, 'index'])->name('billinvoice.add');
    Route::post('/bill-invoice/new', [BillInvoiceController::class, 'create'])->name('billinvoice.new');
    Route::get('/bill-invoice/manage', [BillInvoiceController::class, 'manage'])->name('billinvoice.manage');
    Route::get('/bill-invoice/edit/{id}', [BillInvoiceController::class, 'edit'])->name('billinvoice.edit');
    Route::post('/bill-invoice/update/{id}', [BillInvoiceController::class, 'update'])->name('billinvoice.update');
    Route::get('/bill-invoice/delete/{id}', [BillInvoiceController::class, 'delete'])->name('billinvoice.delete');
    Route::get('/billinvoice/view/{id}', [BillInvoiceController::class, 'billview'])->name('billinvoice.view');

    //End Bill Invoice


    Route::get('/dashboard/get-chart-data', [App\Http\Controllers\DashboardController::class, 'getChartData']);

});

Route::group(['middleware' => ['auth']], function() {

    Route::get('/apsetting',[
    'uses' => 'App\Http\Controllers\ApplicationSettingController@index',
    'as' => 'apsetting'
    ]);

    Route::post('/apsetting/update',[
    'uses' => 'App\Http\Controllers\ApplicationSettingController@update',
    'as' => 'apsetting.update'
    ]);
});

// general Setting
Route::group(['middleware' => ['auth']], function() {

    Route::get('/general',[
    'uses' => 'App\Http\Controllers\GeneralController@index',
    'as' => 'general'
    ]);


    Route::post('/general',[
    'uses' => 'App\Http\Controllers\GeneralController@edit',
    'as' => 'general'
    ]);

    Route::post('/general/localisation',[
    'uses' => 'App\Http\Controllers\GeneralController@localisation',
    'as' => 'general.localisation'
    ]);

    Route::post('/general/invoice',[
    'uses' => 'App\Http\Controllers\GeneralController@invoice',
    'as' => 'general.invoice'
    ]);

    Route::post('/general/defaults',[
    'uses' => 'App\Http\Controllers\GeneralController@defaults',
    'as' => 'general.defaults'
    ]);

});

Route::get('/home', function() {
    return redirect()->to('dashboard');
});
