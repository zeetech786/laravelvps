<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use App\Mail\WelcomeMail;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{
    public function index()
    {
        $company = Employee::all();
        return view("excel.import",compact('company'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'file' => 'required|max:10000|mimes:xlsx,xls',
        ]);
        $file = $request->file('file')->store('excelimport');

        DB:: table('employees')->truncate();

        Excel::import(new UserImport, $file);

        return back()->withSuccess('Excel File imported successfully!');
    }

    public function sendMail($id=null)
    {
        $employee = $id ? Employee::where('id',$id)->get() : Employee::all();

        if($employee){
            foreach ($employee as $value){
                Mail::to($value->email)->send(new WelcomeMail());
            }
        }
        return back()->withSuccess('Email send Successfully!');
    }

}
