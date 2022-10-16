<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;

class UtilController extends Controller
{
    /* Ajax Get States Data by Country ID */
    public function getStateData(Request $request)
    {
        try {
            $data_states = State::where('country_id', $request->country_id)->get();
            $err = array(
                'status' => 'success',
                'states' => $data_states,
            );
            return response()->json($err);
        } catch (\Exception $e) {
            $err = array(
                'status' => 'error',
                'message' => 'DB Connection Error'
            );
            return response()->json($err);
        }
    }
}
