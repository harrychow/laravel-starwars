<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class StarWarsController extends Controller
{
    public function index()
    {
        return view('starwars.index');
    }

    public function search(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://swapi.dev/api/people/', [
            'query' => ['search' => $request->input('search')]
        ]);

        $data = json_decode($response->getBody()->getContents());

        return response()->json($data->results);
    }
}
