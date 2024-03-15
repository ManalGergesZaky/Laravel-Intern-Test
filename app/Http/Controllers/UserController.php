<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index' , ['users'=>$users]);
    }
    public function create()
    {
        return view('users.create');
    }
    public function export(Request $request)
    {
        // return Excel::download(new ProductsExport(), 'products-'.date('Y-m-d').'.pdf', \Maatwebsite\Excel\Excel::MPDF);
        // return Excel::download(new UsersExport(), 'users-'.date('Y-m-d').'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'attachment' => 'required|mimes:xlsx,xls',
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $file = $request->file('attachment');

        Excel::queueImport(new UsersImport(), $file);


        return redirect()->back()->with([
            'message' => 'importing started successfully',
            'alert-type' => 'success'
        ]);

    }
}
