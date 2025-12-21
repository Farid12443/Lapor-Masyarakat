function capitalizeWords(text) {
    return text.toLowerCase().replace(/\b\w/g, c => c.toUpperCase());
}

function openModalShow(el) {
    // isi data modal
    document.getElementById('modal-judul').innerText = capitalizeWords(el.dataset.judul);
    document.getElementById('modal-kategori').innerText = el.dataset.kategori;
    document.getElementById('modal-deskripsi').innerText = el.dataset.deskripsi;
    document.getElementById('modal-email').innerText = el.dataset.email;
    document.getElementById('modal-nama').innerText = el.dataset.nama;
    document.getElementById('modal-tanggal').innerText = el.dataset.tanggal;
    document.getElementById('modal-no_hp').innerText = el.dataset.no_hp;
    document.getElementById('modal-id').innerText = el.dataset.id;
    document.getElementById('modal-buat').innerText = el.dataset.buat;
    document.getElementById('modal-status').innerText = el.dataset.status;

    const latitude = parseFloat(el.dataset.latitude);
    const longitude = parseFloat(el.dataset.longitude);

    document.getElementById('modal-latitude').innerText = latitude;
    document.getElementById('modal-longitude').innerText = longitude;

    // foto
    const foto = el.dataset.foto;
    const img = document.getElementById('modal-foto');
    if (foto) {
        img.src = `/foto_laporan/${foto}`;
        img.classList.remove('hidden');
    } else {
        img.classList.add('hidden');
    }

    // tampilkan modal
    const modal = document.getElementById('modalshow');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('overflow-hidden');

    // === MAP LOGIC ===
    setTimeout(() => {
        if (!map) {
            map = L.map('map').setView([latitude, longitude], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

            marker = L.marker([latitude, longitude]).addTo(map);
        } else {
            map.setView([latitude, longitude], 15);
            marker.setLatLng([latitude, longitude]);
        }

        // reverse geocoding (alamat)
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`)
            .then(res => res.json())
            .then(data => {
                marker.bindPopup(`
                        <b>Lokasi Laporan</b><br>
                        ${data.display_name}
                    `).openPopup();
            })
            .catch(() => {
                marker.bindPopup("Alamat tidak ditemukan");
            });

        map.invalidateSize();

        map.setView([latitude, longitude], map.getZoom(), {
            animate: true
        });

    }, 200); // tunggu modal render
}

function closeModalShow() {
    console.log('Modal dibuka');
    const modal = document.getElementById('modalshow');
    modal.classList.add('hidden');

    document.body.classList.remove('overflow-hidden');
}