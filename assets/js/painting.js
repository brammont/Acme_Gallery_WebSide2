// assets/js/paintings.js

// Function to load paintings
function loadPaintings() {
    fetch('fetch_paintings.php')
        .then(response => response.json())
        .then(paintings => {
            const container = document.getElementById('paintings-container');
            container.innerHTML = ''; // Clear existing content
            
            paintings.forEach(painting => {
                // Create card for each painting
                const paintingCard = `
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="uploads/${painting.image}" class="card-img-top" alt="${painting.title}">
                            <div class="card-body">
                                <h5 class="card-title">${painting.title}</h5>
                                <p class="card-text">Artist: ${painting.artist} | Year: ${painting.year}</p>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                `;
                container.innerHTML += paintingCard;
            });
        })
        .catch(error => console.error('Error fetching paintings:', error));
}

// Load paintings when the page loads
window.onload = loadPaintings;
