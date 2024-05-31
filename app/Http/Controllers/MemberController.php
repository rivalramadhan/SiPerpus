<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MemberCreateRequest;
use App\Models\Member;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MemberResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    


    public function index() {
        $member = Member::all();
        return (new MemberResource(true, "list data", $member))->response()->setStatusCode(200);
    }

    
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'fullname' => ['required', 'string', 'max:100', 'unique:members'],
            'address' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'string', 'max:10'],
            'member_pict' => 'required|image:jpeg,png,jpg,gif,svg|max:2048',
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['required', 'string', 'max:15']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // $image = $request->member_pict;
        // $imagePath = $image->storeAs('public');

        $uploadFolder = 'uploads/images';
        $image = $request->file('member_pict');
        $image_uploaded_path = $image->store($uploadFolder, 'public');

        $member = Member::create([
            'fullname'        => $request->fullname,
            'address'         => $request->address,
            'gender'          => $request->gender,
            'member_pict'     => Storage::url($image_uploaded_path),
            'email'           => $request->email,
            'phone'           => $request->phone

        ]);
    
        return (new MemberResource(true, "data created", $member))->response()->setStatusCode(201);
    }

    
}
