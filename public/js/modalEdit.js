function openEditModal(el) {

    // isi konten
    document.getElementById('modal-judulLaporan').innerText = el.dataset.judulLaporan;
    document.getElementById('modal-deskripsiLaporan').innerText = el.dataset.deskripsiLaporan;
    document.getElementById('modal-kategoriLaporan').innerText = el.dataset.kategoriLaporan;
    document.getElementById('modal-tanggalLaporan').innerText = el.dataset.tanggalLaporan;
    document.getElementById('modal-namaPelapor').innerText = el.dataset.namaPelapor;

    // set status
    document.getElementById('modal-statusLaporan').value = el.dataset.statusLaporan;

    const form = document.getElementById('editForm');
    form.action = `/admin/reports/update/${el.dataset.idLaporan}`;

    // tampilkan modal
    const modal = document.getElementById('editModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('overflow-hidden');
}

function closeEditModal() {
    const modal = document.getElementById('editModal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}