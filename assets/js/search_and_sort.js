document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('searchForm').addEventListener('submit', function (event) {
        event.preventDefault();
        loadPaintings();
    });

    async function loadPaintings() {
        const searchQuery = document.getElementById('searchInput').value;
        const sortOption = document.getElementById('sortSelect').value;

        try {
            const response = await fetch('fetch_paintings_search_sort.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ searchQuery, sortOption }),
            });
            
            const paintings = await response.json();

            if (Array.isArray(paintings)) {
                displayPaintings(paintings);
            } else {
                console.error("Error: Data is not in array format.");
            }
        } catch (error) {
            console.error('Error fetching paintings:', error);
        }
    }

    function displayPaintings(paintings) {
        const paintingsContainer = document.getElementById('paintingsContainer');
        paintingsContainer.innerHTML = '';

        paintings.forEach(painting => {
            const paintingCard = `
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="assets/img/${painting.image}" class="card-img-top" alt="${painting.title}">
                        <div class="card-body">
                            <h5 class="card-title">${painting.title}</h5>
                            <p class="card-text">Artist: ${painting.artist} | Year: ${painting.year}</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            `;
            paintingsContainer.innerHTML += paintingCard;
        });
    }
});
