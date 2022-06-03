<?php

namespace App\Http\Controllers\manage;

use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $model;

    public function __construct(customer $model)
    {
        $this->middleware('auth');

        $this->model = $model;
    }

    public function index()
    {
        // dd('df');
        try {
            $customers = $this->model->with('category')->get();

            return view('home', [
                'customers' => $customers,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function show(Request $request)
    {
        // dd('s');
        try {
            $items =  $this->model->findOrFail($request->id);
            //view data using  ajax

            if (!is_null($items)) {
                return response()->json($items);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
