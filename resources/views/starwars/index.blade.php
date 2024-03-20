<!-- resources/views/starwars/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Search Star Wars Characters</h1>
    <form id="searchForm">
        <div>
            <input type="text" id="searchInput" placeholder="Enter character name">
            <button type="submit" id="searchButton">Search</button>
        </div>
    </form>
    <table id="results">
        <thead>
        <tr>
            <th>Name</th>
            <th>Height</th>
            <th>Mass</th>
            <th>Hair Color</th>
            <th>Skin Color</th>
            <th>Eye Color</th>
            <th>Birth Year</th>
            <th>Gender</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@endsection

@section('scripts')
    <script>
        document.getElementById("searchForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission
            var searchInput = document.getElementById("searchInput");
            var searchButton = document.getElementById("searchButton");

            searchInput.disabled = true;
            searchButton.disabled = true;
            fetchResults(searchInput.value.trim());
        });

        function fetchResults(search) {
            fetch("/starwars/search?search=" + search)
                .then(response => response.json())
                .then(data => {
                    displayResults(data);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                })
                .finally(() => {
                    var searchInput = document.getElementById("searchInput");
                    var searchButton = document.getElementById("searchButton");
                    searchInput.disabled = false;
                    searchButton.disabled = false;
                });
        }

        function displayResults(data) {
            var resultsBody = document.querySelector("#results tbody");
            resultsBody.innerHTML = "";

            data.forEach(function(character) {
                var row = document.createElement("tr");
                row.innerHTML = `
                    <td>${character.name}</td>
                    <td>${character.height}</td>
                    <td>${character.mass}</td>
                    <td>${character.hair_color}</td>
                    <td>${character.skin_color}</td>
                    <td>${character.eye_color}</td>
                    <td>${character.birth_year}</td>
                    <td>${character.gender}</td>
                `;
                resultsBody.appendChild(row);
            });
        }
    </script>
@endsection
