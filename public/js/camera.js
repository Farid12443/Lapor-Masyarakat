const openModalBtn = document.getElementById('openModalBtn');
const modal = document.getElementById('modal');
const closeModalBtn = document.getElementById('closeModalBtn');
const cameraBtn = document.getElementById('cameraBtn');
const galleryBtn = document.getElementById('galleryBtn');
const cameraInput = document.getElementById('cameraInput');
const galleryInput = document.getElementById('galleryInput');
const imagePreview = document.getElementById('imagePreview');
const previewImg = document.getElementById('previewImg');
const removeImageBtn = document.getElementById('removeImageBtn');

// Buka modal
openModalBtn.addEventListener('click', () => {
    modal.classList.remove('opacity-0', 'pointer-events-none');
});

// Tutup modal
closeModalBtn.addEventListener('click', () => {
    modal.classList.add('opacity-0', 'pointer-events-none');
});

// Klik luar modal untuk tutup
modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.add('opacity-0', 'pointer-events-none');
    }
});

// Pilih kamera
cameraBtn.addEventListener('click', () => {
    modal.classList.add('hidden');
    cameraInput.click();
});

// Pilih galeri
galleryBtn.addEventListener('click', () => {
    modal.classList.add('hidden');
    galleryInput.click();
});

// Fungsi untuk preview gambar
function handleFileSelect(input) {
    input.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                imagePreview.classList.remove('hidden');
                openModalBtn.textContent = 'Ganti Foto';
            };
            reader.readAsDataURL(file);
        }
    });
}

// Terapkan pada kedua input
handleFileSelect(cameraInput);
handleFileSelect(galleryInput);

cameraInput.addEventListener('change', () => {
    if (cameraInput.files.length > 0) {
        mainInput.files = cameraInput.files;
        showPreview(mainInput.files[0]);
    }
});

galleryInput.addEventListener('change', () => {
    if (galleryInput.files.length > 0) {
        mainInput.files = galleryInput.files;
        showPreview(mainInput.files[0]);
    }
});

// Hapus gambar
removeImageBtn.addEventListener('click', () => {
    imagePreview.classList.add('hidden');
    previewImg.src = '';
    cameraInput.value = '';
    galleryInput.value = '';
    openModalBtn.textContent = 'Pilih Foto';
});