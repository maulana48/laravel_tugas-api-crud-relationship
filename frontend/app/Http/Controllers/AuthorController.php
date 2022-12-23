<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;

class AuthorController extends Controller
{
    public function index(){
        $responseAuthor = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/Author"
        );
        $author = $responseAuthor['data'];
        return view('author.home', [
            'title' => 'test',
            'icon' => 'test',
            "author" => $author
        ]);
    }
    

    public function edit($id){
        $responseAuthor = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/Author/" . $id
        );
        $author = $responseAuthor['data'];
        return view('author.edit', [
            'title' => 'test',
            'icon' => 'test',
            "author" => $author
        ]);
    }

    public function create(){
        return view('author.create', [
            'title' => 'test',
            'icon' => 'test'
        ]);
    }

    public function store(Request $request){
        $payload = $request->all();

        $responseAuthor = HttpClient::fetch(
            "POST",
            "http://127.0.0.1:8000/api/Author/",
            $payload
        );
        $author = $responseAuthor['data'];
        return redirect()->route('author.list');
    }

    public function update(Request $request, $id){
        $payload = $request->all();

        $responseAuthor = HttpClient::fetch(
            "POST",
            "http://127.0.0.1:8000/api/Author/update/" . $id,
            $payload
        );
        $author = $responseAuthor['data'];
        return redirect()->route('author.list');
    }

    public function destroy($id){
        $responseAuthor = HttpClient::fetch(
            "POST",
            "http://127.0.0.1:8000/api/Author/" . $id,
        );
        $author = $responseAuthor['data'];
        return redirect()->route('author.list');
    }
}
