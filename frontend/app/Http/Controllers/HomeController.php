<?php

namespace App\Http\Controllers;

use Illuminate\Http\{ Request, Response };
use App\Helpers\HttpClient;

class HomeController extends Controller
{
    public function index(){
        $responseBook = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/Book"
        );
        $book = $responseBook['data'];
        return view('home', [
            'title' => 'test',
            'icon' => 'test',
            "book" => $book
        ]);
    }
    public function authorList($id){
        $responseBook = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/Book/authors/" . $id
        );
        $book = $responseBook['data'];
        return view('home', [
            'title' => 'test',
            'icon' => 'test',
            "book" => $book
        ]);
    }
    public function categoryList($slug){
        $responseBook = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/Book/categories/" . $slug
        );
        $book = $responseBook['data'];
        return view('home', [
            'title' => 'test',
            'icon' => 'test',
            "book" => $book
        ]);
    }

    public function show($id){
        $responseBook = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/Book/" . $id
        );
        $book = $responseBook['data'];
        return view('show', [
            'title' => 'test',
            'icon' => 'test',
            "book" => $book
        ]);
    }

    public function create(){
        $responseCategory = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/Category/" 
        );
        $category = $responseCategory['data'];

        $responseAuthor = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/Author/" 
        );
        $author = $responseAuthor['data'];
        
        return view('create', [
            'title' => 'test',
            'icon' => 'test',
            "categories" => $category,
            "authors" => $author
        ]);
    }

    public function edit($id){
        $responseBook = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/Book/" . $id
        );
        $book = $responseBook['data'];
        return view('edit', [
            'title' => 'test',
            'icon' => 'test',
            "book" => $book
        ]);
    }

    public function store(Request $request){
        $payload = $request->all();

        $sampul = [];
        if($request->file('sampul')){
            $sampul = [ 
                "sampul" => $request->file('sampul')
            ];
        }

        $responseBook = HttpClient::fetch(
            "POST",
            "http://127.0.0.1:8000/api/Book/",
            $payload,
            $sampul
        );

        if($responseBook['status'] == false){
            return back()->withErrors(['msg' => $responseBook['message']]);
        }

        $book = $responseBook['data'];
        return redirect()->route('book.list');
    }

    public function update(Request $request, $id){
        $payload = $request->all();
        // try {
        //     $request->validate([
        //         'author_id' => ['required'],
        //         'category_id' => ['required'],
        //         'judul' => ['required', 'min:3'],
        //         'penerbit' => ['required'],
        //         'kota_penerbitan' => ['required'],
        //         'ISBN' => ['required', 'min:13'],
        //         'tahun_terbit' => ['required']
        //     ]);
        //     // validate request

        // } catch (\Illuminate\Validation\ValidationException $th) {
        //     // catch exception for class ValidationException and return error msg
        //     dd($th);
        // }
        $sampul = [];
        if($request->file('sampul')){
            $sampul = [ 
                "sampul" => $request->file('sampul')
            ];
        }

        $responseBook = HttpClient::fetch(
            "POST",
            "http://127.0.0.1:8000/api/Book/update/" . $id,
            $payload,
            $sampul
        );

        if($responseBook['status'] == false){
            return back()->withErrors(['msg' => $responseBook['message']]);
        }
        $book = $responseBook['data'];
        return redirect()->route('book.list');
    }

    public function destroy($id){
        $responseBook = HttpClient::fetch(
            "POST",
            "http://127.0.0.1:8000/api/Book/" . $id,
        );
        $book = $responseBook['data'];
        return redirect()->route('book.list');
    }
}
