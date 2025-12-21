let marker = null;

// Coba dapatkan lokasi awal pengguna
function initMap() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (pos) => {
                const lat = pos.coords.latitude;
                const lng = pos.coords.longitude;

                startMap(lat, lng); // lokasi awal = lokasi user
            },
            () => {
                startMap(-7.7956, 110.3695); // fallback Yogyakarta
            }
        );
    } else {
        startMap(-7.7956, 110.3695);
    }
}

// Inisialisasi peta
function startMap(lat, lng) {
    window.map = L.map('map').setView([lat, lng], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);

    // Klik map → pindah marker
    map.on("click", function (e) {
        placeMarker(e.latlng.lat, e.latlng.lng);
    });
}

// Fungsi pasang marker (hapus dulu yang lama)
function placeMarker(lat, lng) {

    if (marker) {
        map.removeLayer(marker);
    }

    marker = L.marker([lat, lng], { draggable: true }).addTo(map);

    // Update input ketika marker digeser
    marker.on("dragend", function (e) {
        const pos = e.target.getLatLng();
        document.getElementById("latitude").value = pos.lat;
        document.getElementById("longitude").value = pos.lng;
    });

    // Isi input hidden
    document.getElementById("latitude").value = lat;
    document.getElementById("longitude").value = lng;
}

// Tombol “Dapatkan Lokasi Saya”
document.getElementById("btnLokasi").addEventListener("click", () => {

    if (!navigator.geolocation) {
        alert("Browser tidak mendukung Geolocation");
        return;
    }

    navigator.geolocation.getCurrentPosition(
        (pos) => {
            const lat = pos.coords.latitude;
            const lng = pos.coords.longitude;

            placeMarker(lat, lng);
            map.setView([lat, lng], 18);
        },
        (err) => {
            alert("Gagal mendapatkan lokasi: " + err.message);
        }
    );
});

// Jalankan map dengan lokasi awal user
initMap();