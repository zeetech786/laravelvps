<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;

class YajraDataTableController extends Controller
{
    protected array $data = [];


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Company::select('id', 'first_name', 'last_name', 'street', 'plz', 'city');
            return Datatables::of($data)
                ->addColumn('action', function($data) {
                    return view('column', compact('data'));
                })



               // ->addColumn('action', function ($sales) {
//                    return '<a href="sale/'.$sales->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
//                             <a href="sale/'.$sales->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-zoom-in"></i> View</a>
//
//                    <button class="btn btn-delete" data-remote="sale/' . $sales->id . '">Delete</button>';
//                })



//                ->addColumn('action', function ($row) {
//                    $data = '<a href="#"  class="btn btn-primary btn-sm">Show</a>';
//                    $data .= '<a href="#"  class="btn btn-dark btn-sm">Edit</a>';
//                    $data .= '<a href="#" class="btn btn-danger btn-sm">Delete</a>';
//
//                    return $data;
//                })
                //return $data;
                /* $actions['show']  = '<a href="#" class="btn btn-primary btn-sm">Show</a>';
                 $actions['edit']  = '<a href="javascript:void(0)" class="btn btn-dark btn-sm">Edit</a>';
                 $actions['delete']  = '<a href="#" class="btn btn-danger btn-sm">Delete</a>';
                 return $actions['edit'];*/

                //})
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('yajra.index');
    }

}
