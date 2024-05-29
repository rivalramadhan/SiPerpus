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

class MemberController extends Controller
{
    public function create(MemberCreateRequest $request): JsonResponse {
        $data = $request->validated();
        $member = new Member($data);
        $member->save();
        
        return (new MemberResource(true, "data created", $member))->response()->setStatusCode(201);

    }       
    public function get() {
        $member = Member::all();
        return (new MemberResource(true, "list data", $member))->response()->setStatusCode(200);
    }
}
