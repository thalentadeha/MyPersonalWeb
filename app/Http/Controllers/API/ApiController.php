<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Portfolio\AddPortfolioRequest;
use App\Http\Requests\Portfolio\DeletePortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use function GuzzleHttp\Promise\all;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //get credentials from request
        $credentials = $request->only('email', 'password');

        //if auth failed
        if(!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Wrong Email or Password'
            ], 401);
        }

        //if auth success
        return response()->json([
            'success' => true,
            'user'    => auth()->guard('api')->user(),
            'token'   => $token
        ], 200);
    }

    public function logout(){
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        if($removeToken) {
            //return response JSON
            return response()->json([
                'success' => true,
                'message' => 'Logged Out!',
            ]);
        }
    }
}
