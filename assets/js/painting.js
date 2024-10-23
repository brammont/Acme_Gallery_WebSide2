document.addEventListener('DOMContentLoaded', loadPaintings);

function loadPaintings() {
    fetch('fetch_paintings.php')
        .then(response => response.json())
        .then(paintings => {
            if (Array.isArray(paintings)) {
                let output = '';
                paintings.forEach(painting => {
                    output += `<div class="painting">
                                <h2>${painting.title}</h2>
                                <img src="assets/img/${painting.image}" alt="${painting.title}">
                               </div>`;
                });
                document.getElementById('painting-list').innerHTML = output;
            } else {
                console.error('Error fetching paintings: Data is not an array');
            }
        })
        .catch(error => console.error('Error fetching paintings:', error));
}
