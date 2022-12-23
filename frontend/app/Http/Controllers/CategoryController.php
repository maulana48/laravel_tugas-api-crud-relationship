<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;

class CategoryController extends Controller
{
    public function index(){
        $responseCategory = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/Category"
        );
        $category = $responseCategory['data'];
        return view('category.home', [
            'title' => 'test',
            'icon' => 'test',
            "category" => $category
        ]);
    }
    

    public function edit($id){
        $responseCategory = HttpClient::fetch(
            "GET",
            "http://127.0.0.1:8000/api/Category/" . $id
        );
        $category = $responseCategory['data'];
        return view('category.edit', [
            'title' => 'test',
            'icon' => 'test',
            "category" => $category
        ]);
    }

    public function create(){
        return view('category.create', [
            'title' => 'test',
            'icon' => 'test'
        ]);
    }

    public function store(Request $request){
        $payload = $request->all();

        $responseCategory = HttpClient::fetch(
            "POST",
            "http://127.0.0.1:8000/api/Category/",
            $payload
        );
        $category = $responseCategory['data'];
        return redirect()->route('category.list');
    }

    public function update(Request $request, $id){
        $payload = $request->all();

        $responseCategory = HttpClient::fetch(
            "POST",
            "http://127.0.0.1:8000/api/Category/update/" . $id,
            $payload
        );
        $category = $responseCategory['data'];
        return redirect()->route('category.list');
    }

    public function destroy($id){
        $responseCategory = HttpClient::fetch(
            "POST",
            "http://127.0.0.1:8000/api/Category/" . $id,
        );
        $category = $responseCategory['data'];
        return redirect()->route('category.list');
    }
}