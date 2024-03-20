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
        const searchForm = document.getElementById("searchForm");
        const searchInput = document.getElementById("searchInput");
        const searchButton = document.getElementById("searchButton");
        const resultsBody = document.querySelector("#results tbody");

        searchForm.addEventListener("submit", handleSubmit);

        async function handleSubmit(event) {
            event.preventDefault(); // Prevent form submission
            const searchTerm = searchInput.value.trim();
            if (searchTerm.length > 2) {
                disableForm();
                try {
                    const data = await fetchResults(searchTerm);
                    displayResults(data);
                } catch (error) {
                    handleError(error);
                } finally {
                    enableForm();
                }
            }
        }

        function disableForm() {
            searchInput.disabled = true;
            searchButton.disabled = true;
        }

        function enableForm() {
            searchInput.disabled = false;
            searchButton.disabled = false;
        }

        async function fetchResults(searchTerm) {
            const response = await fetch(`/starwars/search?search=${searchTerm}`);
            if (!response.ok) {
                throw new Error('Failed to fetch data');
            }
            return response.json();
        }

        function displayResults(data) {
            resultsBody.innerHTML = "";
            data.forEach(character => {
                const row = document.createElement("tr");
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

        function handleError(error) {
            console.error('Error fetching data:', error);
        }
    </script>
@endsection
