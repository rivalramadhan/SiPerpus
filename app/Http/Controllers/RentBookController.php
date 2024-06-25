<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\RentBookResource;
use App\Models\RentBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RentBookController extends Controller
{
    public function index() {
        $rentbook = RentBook::all();
        return (new RentBookResource(true, "list data", $rentbook))->response()->setStatusCode(200);
    }
    
    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'book_title' => ['required', 'String'],
            'fullname' => ['required', 'String'],
            'rent_date' => ['required', 'date'],
            'return_date' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $rentbook = RentBook::create([
            'book_title' => $request->book_title,
            'fullname' => $request->fullname,
            'rent_date' => $request->rent_date,
            'return_date' => $request->return_date,
            'status' => $request->status
        ]);
        return (new RentBookResource(true, "data created", $rentbook));
    }
    public function update(Request $request) {}
}
