function filterReports(status) {
    const items = document.querySelectorAll('.report-item');
    let visibleCount = 0;

    items.forEach(card => {
        const textStatus = card.querySelector('span').textContent.trim().toLowerCase();
        if (status === 'all' || textStatus === status) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    // Tampilkan pesan kosong filter
    const emptyFilterBox = document.getElementById('empty-filter');
    const emptyDefaultBox = document.getElementById('empty-default');

    if (visibleCount === 0) {
        emptyFilterBox.classList.remove('hidden');
        if (emptyDefaultBox) emptyDefaultBox.classList.add('hidden');
    } else {
        emptyFilterBox.classList.add('hidden');
        // Jika tidak ada item sama sekali, empty-default sudah ditangani oleh Blade
    }
}