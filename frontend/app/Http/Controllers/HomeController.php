<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $book = $responseBook['data'];
        return redirect()->route('book.list');
    }

    public function update(Request $request, $id){
        $payload = $request->all();

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
