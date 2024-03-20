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

@section('scripts')
    <script>
        document.getElementById("filterInput").addEventListener("input", function() {
            var filter = this.value.toLowerCase();
            var actors = document.getElementsByTagName("tr");

            for (var i = 1; i < actors.length; i++) {
                var actor = actors[i].getElementsByTagName("td")[0];

                if (actor.innerHTML.toLowerCase().indexOf(filter) > -1) {
                    actors[i].style.display = "";
                } else {
                    actors[i].style.display = "none";
                }
            }
        });
    </script>
@endsection
