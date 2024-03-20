<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class StarWarsController extends Controller
{
    /**
     * API Endpoint for Starwars API
     */
    const STARWARS_PEOPLE_API = 'https://swapi.dev/api/people/';

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('starwars.index');
    }

    /**
     *
     * GET request to search starwars characters
     *
     * Search via name provided by the 'search' input from REQUEST
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', self::STARWARS_PEOPLE_API, [
            'query' => ['search' => $request->input('search')]
        ]);

        $data = json_decode($response->getBody()->getContents());

        return response()->json($data->results);
    }
}
