<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class YajraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Company::select('id','name','first_name', 'last_name', 'street', 'plz', 'city');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data) {
                    return view('column', compact('data'));
                })
                ->setRowAttr([
                    'align' => 'center',
                    'color' => 'red',
                ])
                ->editColumn('city', function ($data){
                    return view('yajra',['data'=>$data]);
                })
//                ->editColumn('plz', function ($data){
//                  return view('yajra_plz',['data'=>$data]);
//                })
                ->editColumn('plz', function ($data){
                    return $data->plz > 2000 ? "<span class='badge badge-pill badge-warning'>$data->plz</span>": $data->plz;
                })
                ->setRowClass(function ($data) {
                    return $data->id % 2 == 0 ? 'alert-success' : 'alert-warning';
                })
                ->rawColumns(['action','plz'])
                ->make(true);
        }
        return view('yajra.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('HEllo');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
