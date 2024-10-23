document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('search-button').addEventListener('click', searchPaintings);
});

function searchPaintings() {
    const searchQuery = document.getElementById('search-input').value;
    const sortOrder = document.getElementById('sort-order').value;

    fetch(`search_and_sort_results.php?search=${searchQuery}&sort=${sortOrder}`)
        .then(response => response.json())
        .then(paintings => {
            let output = '';
            paintings.forEach(painting => {
                output += `<div class="painting">
                            <h2>${painting.title}</h2>
                            <img src="assets/img/${painting.image}" alt="${painting.title}">
                           </div>`;
            });
            document.getElementById('painting-results').innerHTML = output;
        })
        .catch(error => console.error('Error fetching search results:', error));
}
