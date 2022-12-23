<?php 
namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class HttpClient{
    static function fetch($method, $url, $body = [], $files = []){
        if($method == "GET") return Http::get($url, ['verify' => false])->json();

        // jika terdapat file, client berupa multipart
        if(sizeof($files) > 0){
            $client = Http::asMultipart();

            // attach setiap file pada client
            foreach ($files as $key => $file) {
                $path = $file->getPathname();
                $name = $file->getClientOriginalName();
                // attach file
                $client->attach($key, file_get_contents($path), $name);
            }

            // fetch api
            return $client->post($url, $body)->json();
        }
        return Http::post($url, $body)->json();
    }

}