<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Author, Category, Book };
use Illuminate\Support\Facades\{ Hash, File, DB };

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books =  DB::table('books')
            ->select('books.*', 'categories.nama_category', 'categories.slug', 'authors.nama_author')
            ->leftJoin('categories', 'categories.id', '=', 'books.category_id')
            ->leftJoin('authors', 'authors.id', '=', 'books.author_id')
            ->get();
        // query buku join author dan category, ambil semua data buku, nama dari category buku, dann nama dari author buku
        return response()->json([
            'status' => true,
            'message' => "Data semua buku didapatkan",
            'data' => $books
        ]);
    }



    // public function category()
    // {
    //     $books = Book::where('category_id', $category->id)->get();
    //     // query buku yang memiliki kategori yang diminta

    //     return response()->json([
    //         'status' => true,
    //         'message' => "Data buku dengan categori " . $category->nama . " didapatkan",
    //         'data' => $books
    //     ]);
    // }

    public function categoryList(Category $category)
    {
        $books = Book::where('category_id', $category->id)
            ->select('books.*', 'categories.nama_category', 'categories.slug', 'authors.nama_author')
            ->leftJoin('categories', 'categories.id', '=', 'books.category_id')
            ->leftJoin('authors', 'authors.id', '=', 'books.author_id')
            ->get();
        // query buku yang memiliki kategori yang diminta

        return response()->json([
            'status' => true,
            'message' => "Data buku dengan categori " . $category->nama . " didapatkan",
            'data' => $books
        ]);
    }



    // public function author()
    // {
    //     $authors = Author::query()
    //         ->join('books', 'books.author_id', '=', 'authors.id')
    //         ->selectRaw('authors.*, count(books.id) as jumlah_buku')
    //         ->groupBy('authors.id', 'authors.email', 'books.id')
    //         ->having('books.id', '>', 0)
    //         ->get();

    //     return response()->json([

    //         'status' => true,
    //         'message' => "Data authors didapatkan",
    //         'data' => $authors
    //     ]);
    // }

    public function authorList(Author $author)
    {
        $books = Book::where('author_id', $author->id)
            ->select('books.*', 'categories.nama_category', 'categories.slug', 'authors.nama_author')
            ->leftJoin('categories', 'categories.id', '=', 'books.category_id')
            ->leftJoin('authors', 'authors.id', '=', 'books.author_id')
            ->get();;
        // query buku yang ditulis author yang diminta

        return response()->json([

            'status' => true,
            'message' => "Data buku dengan author " . $author->nama_author . " didapatkan",
            'data' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'author_id' => ['required'],
                'category_id' => ['required'],
                'judul' => ['required', 'min:3'],
                'penerbit' => ['required'],
                'kota_penerbitan' => ['required'],
                'ISBN' => ['required', 'min:13'],
                'tahun_terbit' => ['required']
            ]);
            // validasi dengan rule

        } catch (\Illuminate\Validation\ValidationException $th) {
            // catch exception for class ValidationException and return error msg

            return response()->json([
                'status' => false,
                'message' => $th->validator->errors()   // error msg
            ], 403);
        }

        
        $payload = $request->all();
        // Getting all request

        if($request->file('sampul')){
            $payload['sampul'] = $request->file('sampul')->store('img/Library', ['disk' => 'public_uploads']);
            // Store img on public_path
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'Gambar sampul tidak valid',
                'data' => null
            ]);
        }
        
        $buku = Book::create($payload);
        // Create book

        return response()->json([
            'status' => true,
            'message' => 'Buku berhasil ditambahkan',
            'data' => $buku
        ]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        // Get book where id = id
        
        if(!$book){
            return response()->json([
                'status' => true,
                'message' => 'Data buku tidak ditemukan',
                'data' => null
            ]);
        }
        $author = Author::find($book->author_id);
        // Get book where author_id = author_id

        $category = Category::find($book->category_id);
        // Get book where category_id = category_id

        return response()->json([
            'status' => true,
            'message' => 'Data buku didapatkan',
            'data' => [$book, $author, $category]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        try {
            $request->validate([
                'author_id' => ['required'],
                'category_id' => ['required'],
                'judul' => ['required', 'min:3'],
                'penerbit' => ['required'],
                'kota_penerbitan' => ['required'],
                'ISBN' => ['required', 'min:13'],
                'tahun_terbit' => ['required']
            ]);
            // validate request

        } catch (\Illuminate\Validation\ValidationException $th) {
            // catch exception for class ValidationException and return error msg

            return response()->json([
                'status' => false,
                'message' => $th->validator->errors()
            ], 403);
        }
        
        $payload = $request->all();
        // get all request

        if($request->file('sampul')){
            File::delete(public_path($book->sampul));
            // Delete old file if new one exist
            $payload['sampul'] = $request->file('sampul')->store('img/Library', ['disk' => 'public_uploads']);
            // Store img on public_path
        }
        
        $buku = $book->update($payload);
        // update book data
        
        return response()->json([
            'status' => true,
            'message' => 'Buku berhasil diupdate',
            'data' => $payload
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        File::delete(public_path($book->sampul));
        // delete image if exist
        $book->delete();
        // delete book data
        return response()->json([
            'status' => true,
            'message' => 'Buku berhasil dihapus',
            'data' => $book
        ]);
    }
}
