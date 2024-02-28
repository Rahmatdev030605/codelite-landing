<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class CobaController extends Controller
{
    public function getUsers()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://659b9264d565feee2dab3b27.mockapi.io/api/v1/user');

        // Mendapatkan status code dari respons
        $statusCode = $response->getStatusCode();

        // Mendapatkan body dari respons
        $body = $response->getBody();

        // Mengonversi body respons ke dalam format JSON
        $users = json_decode($body, true);

        // Mengembalikan data pengguna ke tampilan
        return view('frontend.includes.cobaaAPI.cobaApi', compact('users'));
    }

    public function getCoba()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://659b9264d565feee2dab3b27.mockapi.io/api/v1/user');

        // Mendapatkan status code dari respons
        $statusCode = $response->getStatusCode();

        // Mendapatkan body dari respons
        $body = $response->getBody();

        // Mengonversi body respons ke dalam format JSON
        $users = json_decode($body, true);

        return view('frontend.pages.coba', compact('users'));
    }

    // public function fetchDataFromApi()
    // {
    //     $response = Http::get('https://659b9264d565feee2dab3b27.mockapi.io/api/v1/user');

    //     if ($response->successful()) {
    //         $users = $response->json();
    //         return view('frontend.pages.coba', compact('users'));
    //     } else {
    //         // Handle error jika request gagal
    //         abort(500, 'Failed to fetch data from API');
    //     }
    // }


    public function fetchDataFromApi()
    {
        $response = Http::get('https://659b9264d565feee2dab3b27.mockapi.io/api/v1/user');

        if ($response->successful()) {
            $users = $response->json();
            return $users;
        } else {
            // Handle error jika request gagal
            abort(500, 'Failed to fetch data from API');
        }
    }

    public function showCarousel()
    {
        $carouselData = $this->fetchDataFromApi();
        return view('frontend.pages.coba', compact('carouselData'));
    }
}
