<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WasapiController extends Controller
{
    public function getWasapi(Request $request)
    {
        try {
            $input = $request->all();

            $data = DB::table('grants')
                ->where('id', $input['id'])
                ->first();

            if ($data)
                $response = $data->description;
            else
                $response = 'ID no encontado';

            return response()->json([
                'success' => true,
                'message' => $response
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
