<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    // Menampilkan semua data asuransi ke dalam tabel view asuransi
    public function getAllAsuransi()
    {
        $response = Http::get('https://dummyjson.com/products');
        $data = $response->json();
        return view('asuransi', compact('data'));
    }

    // Menampilkan semua data Post
    public function getAllPost()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        return $response->json();
    }

    // Menampilkan satu data post berdasarkan id
    public function getPostById($id)
    {
        $post = Http::get('https://jsonplaceholder.typicode.com/posts/'.$id);
        return $post->json();
    }

    // Menambah data Post
    public function addPost()
    {
        $post = Http::post('https://jsonplaceholder.typicode.com/posts',[
            'userId' => 1,
            'title' => 'New Post Title',
            'body' => 'New Post Description'
        ]);
        return $post->json();
    }

    // Mengubah data post berdasarkan id
    public function updatePost()
    {
        $response = Http::put('https://jsonplaceholder.typicode.com/posts/1',[
            'title' => 'Updated Title',
            'body' => 'Updated Description'
        ]);
        return $response->json();
    }

    // Menghapus data post berdasarkan id
    public function deletePost($id)
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts'.$id);
        return $response->json();
    }
}
