<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRegisterRequest;
use App\Http\Resources\AdminResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register(AdminRegisterRequest $request): JsonResponse
    {
        $data = $request->validated();
        if(Admin::where('username', $data['username'])->exists()){
            return response()->json(['message' => 'Username already exists'], 400);
        }
        $admin = new Admin($data);
        
        
        $admin->save();

        return (new AdminResource($admin))->response()->setStatusCode(201);

    }
    public function login (Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        $admin = Admin::where('username', $request->username)->first();
        var_dump($admin);
    }
    
        
    
}
