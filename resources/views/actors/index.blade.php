<!-- resources/views/posts/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Actors</h1>

    <input type="text" id="filterInput" placeholder="Filter Actors">

    <table id="actorsList">
        <thead>
            <tr>
                <th>Actor Name</th>
                <th>Movies</th>
            </tr>
        </thead>
        @foreach ($actors as $actor)
            <tr>
                <td>{{ $actor->name }}</td>
                <td><ul>
                    @foreach ($actor->movies as $movie)
                        <li>{{ $movie->name }}</li>
                    @endforeach
                </ul>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
