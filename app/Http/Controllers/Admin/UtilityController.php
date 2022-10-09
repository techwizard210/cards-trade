<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Lang;

class UtilityController extends Controller
{
    /* Ajax Get States by Country */
    public function getStateData(Request $request)
    {
        try {
            // DB search
            $data = DB::table('states')->where('country_id', $request->country_id)->get();
            // build response
            $err = array(
                'status' => 'success',
                'states' => $data,
            );
            return response()->json($err);

        } catch (\Exception $e) {
            // Exception Response
            $err = array(
                'status' => 'error',
                'message' => Lang::get('message.response.db_connection_error')
            );
            return response()->json($err);
        }
    }
}
