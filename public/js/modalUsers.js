function statusBadge(status) {
    switch (status) {
        case 'menunggu':
            return `<span class="inline-flex items-center rounded-md bg-yellow-100 px-2 py-0.5 text-xs font-medium text-yellow-800">
                Menunggu
            </span>`;

        case 'diproses':
            return `<span class="inline-flex items-center rounded-md bg-blue-100 px-2 py-0.5 text-xs font-medium text-blue-800">
                Diproses
            </span>`;

        case 'selesai':
            return `<span class="inline-flex items-center rounded-md bg-green-100 px-2 py-0.5 text-xs font-medium text-green-800">
                Selesai
            </span>`;

        default:
            return `<span class="inline-flex items-center rounded-md bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-800">
                Tidak diketahui
            </span>`;
    }
}

function openModalShowUser(el) {
    // // isi data modal
    // document.getElementById('modal-judul').innerText = capitalizeWords(el.dataset.judul);
    // document.getElementById('modal-kategori').innerText = el.dataset.kategori;
    // document.getElementById('modal-deskripsi').innerText = el.dataset.deskripsi;
    document.getElementById('modal-email').innerText = el.dataset.email;
    document.getElementById('modal-nama').innerText = el.dataset.nama;
    // document.getElementById('modal-tanggal').innerText = el.dataset.tanggal;
    document.getElementById('modal-no-hp').innerText = el.dataset.no_hp;
    document.getElementById('modal-id').innerText = el.dataset.id;
    document.getElementById('modal-registrasi').innerText = el.dataset.registrasi;
    document.getElementById('modal-alamat').innerText = el.dataset.alamat;

    // const latitude = parseFloat(el.dataset.latitude);
    // const longitude = parseFloat(el.dataset.longitude);

    // document.getElementById('modal-latitude').innerText = latitude;
    // document.getElementById('modal-longitude').innerText = longitude;
    const laporan = JSON.parse(el.dataset.riwayatLaporan)

    console.log(laporan) // array riwayat laporan

    let html = ''
    laporan.forEach((item, i) => {
        html += `
          <tr class="hover:bg-gray-50 transition">
            <td class="px-3 py-2">${i + 1}</td>

            <td class="px-3 py-2">
                ${item.judul}
            </td>
            
            <td class="px-3 py-2">
              ${item.kategori ? item.kategori.nama_kategori : '-'}
            </td>

            <td class="px-3 py-2">
                ${statusBadge(item.status)}
            </td>

            <td class="px-3 py-2">
                ${new Date(item.created_at).toLocaleDateString('id-ID')}
            </td>
        </tr>
        `
    })

    document.getElementById('riwayat-container').innerHTML = html


    // foto
    const foto = el.dataset.foto;
    const img = document.getElementById('modal-foto-profil');
    if (foto) {
        img.src = `/foto_profil_user/${foto}`;
        img.classList.remove('hidden');
    } else {
        img.classList.add('hidden');
    }

    // tampilkan modal
    const modal = document.getElementById('modalShowUser');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('overflow-hidden');

}

function closeModalShowUser() {
    console.log('Modal dibuka');
    const modal = document.getElementById('modalShowUser');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
}