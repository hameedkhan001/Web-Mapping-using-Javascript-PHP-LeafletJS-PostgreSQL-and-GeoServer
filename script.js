/*var map = L.map('map').setView([69.3451, 30.3753], 2);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);*/

function updateMarkers(data) {
    for (let entry of data) {
        L.marker([entry.x, entry.y]).addTo(map)
            .bindPopup('<strong>${entry.village}</strong><br>${entry.lg_address}');
    }
}

document.getElementById('search-form').addEventListener('submit', function(e) {
    e.preventDefault();
    var searchInput = document.getElementById('search-input').value;

    fetch('backend.php?search=' + encodeURIComponent(searchInput))
        .then(response => response.json())
        .then(data => {
            updateMarkers(data);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
});
