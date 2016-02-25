<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Result;
use DB;
use Illuminate\Http\Request;

/**
 * Result Controller
 *
 * @package App\Http\Controllers
 * @author Wilton Garcia <wiltonog@gmail.com>
 */
class ResultController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all results and send to list view
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        $data = [];
        $data['results'] = Result::with('user')->get();
        return view('results.list', $data);
    }

    /**
     * Delete item and return to the list 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postDelete(Request $request)
    {
        Result::where('id', $request->get('id'))->delete();

        return redirect('results/list'); 
    }
}
