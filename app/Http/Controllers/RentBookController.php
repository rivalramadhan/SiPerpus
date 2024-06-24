<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\RentBookResource;
use App\Models\RentBook;
use Illuminate\Http\Request;

class RentBookController extends Controller
{
    public function index() {
        $rentbook = RentBook::all();
        return (new RentBookResource(true, "list data", $rentbook))->response()->setStatusCode(200);
    }
    
}
