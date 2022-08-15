<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        return User::all();
    }

    public function getUser(Request $request){
        
        $user = $request->user();
        $response = [
            'user_id' => $user->id ,
        ];

        return $response;
    }   
}
