// assets/js/search_and_sort.js

document.addEventListener('DOMContentLoaded', function() {
    // Handle the search input
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let cards = document.querySelectorAll('#results .card');
        cards.forEach(card => {
            let title = card.querySelector('.card-title').innerText.toLowerCase();
            let artist = card.querySelector('.card-text').innerText.toLowerCase();
            if (title.includes(filter) || artist.includes(filter)) {
                card.parentElement.style.display = 'block';
            } else {
                card.parentElement.style.display = 'none';
            }
        });
    });

    // Handle sorting
    document.getElementById('sortOptions').addEventListener('change', function() {
        let sortBy = this.value;
        let cards = Array.from(document.querySelectorAll('#results .card')).sort((a, b) => {
            let aValue = a.querySelector(`.card-title`).innerText;
            let bValue = b.querySelector(`.card-title`).innerText;
            if (sortBy === 'artist') {
                aValue = a.querySelector('.card-text').innerText.split(' | ')[0];
                bValue = b.querySelector('.card-text').innerText.split(' | ')[0];
            } else if (sortBy === 'year') {
                aValue = a.querySelector('.card-text').innerText.split(' | ')[1];
                bValue = b.querySelector('.card-text').innerText.split(' | ')[1];
            }
            return aValue.localeCompare(bValue);
        });

        let resultsDiv = document.getElementById('results');
        resultsDiv.innerHTML = '';
        cards.forEach(card => resultsDiv.appendChild(card.parentElement));
    });
});
