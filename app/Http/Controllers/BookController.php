<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    
    public function index() {
        $book = Book::all();
        return (new BookResource(true, "list data", $book))->response()->setStatusCode(200);
    }
    
    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'book_title' => ['required', 'string', 'max:100', 'unique:books'],
            'author' => ['required', 'string', 'max:100'],
            'isbn' => ['required', 'string', 'max:100'],
            'book_pict' => 'required|image:jpeg,png,jpg,gif,svg|max:2048',
            'release_date' => ['required', 'string', 'max:100']

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $uploadFolder = 'uploads/books';
        $image = $request->file('book_pict');
        $image_uploaded_path = $image->store($uploadFolder, 'public');

        $book = Book::create([
            'book_title'       => $request->book_title,
            'author'           => $request->author,
            'isbn'             => $request->isbn,
            'book_pict'        => Storage::url($image_uploaded_path),
            'release_date'     => $request->release_date
        ]);
    
        return (new BookResource(true, "data created", $book))->response()->setStatusCode(201);
    }

    public function show($id)
    {
        $book = Book::find($id);
        return new BookResource(true, 'Detail Data Buku', $book);
    }

    public function delete($id)
    {
        $book = Book::find($id);
        Storage::delete('uploads/books'.basename($book->book_pict));
        $book->delete();
        return new BookResource(true, 'Data Buku Berhasil Dihapus!', null);
    }
    public function update(Request $request, $id) {
        $book = Book::find($id);
        $validator = Validator::make($request->all(), [
            'book_title' => ['required', 'string', 'max:100', 'unique:books'],
            'author' => ['required', 'string', 'max:100'],
            'isbn' => ['required', 'string', 'max:100'],
            'release_date' => ['required', 'string', 'max:100']
        ]);
        
        if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
        }
        if ($request->hasFile('book_picy')) {
            $image = $request->file('book_pict');
            $image->storeAs('uploads/books');

            Storage::delete('uploads/books/'.basename($book->book_pict));
            $book->update([
                'book_title'       => $request->book_title,
                'author'           => $request->author,
                'isbn'             => $request->isbn,
                'book_pict'        => $image,
                'release_date'     => $request->release_date,



            ]);
        } else  {
            $book->update([
                'book_title'       => $request->book_title,
                'author'           => $request->author,
                'isbn'             => $request->isbn,
                'release_date'     => $request->release_date,


            ]);}
        return new BookResource(true,'Update berhasil', $book);
    }
        
}
