function openEditModal() {
    document.getElementById('editModalProfil').classList.remove('hidden');
    document.getElementById('editModalProfil').classList.add('flex');
    resetModal('editModalProfil');
}

function closeEditModal() {
    document.getElementById('editModalProfil').classList.add('hidden');
    document.getElementById('editModalProfil').classList.remove('flex');
}

function openEditModalPassword() {
    document.getElementById('editModalPassword').classList.remove('hidden');
    document.getElementById('editModalPassword').classList.add('flex');
    resetModal('editModalPassword');
}

function closeEditModalPassword() {
    document.getElementById('editModalPassword').classList.add('hidden');
    document.getElementById('editModalPassword').classList.remove('flex');
}

function openEditModalEmail() {
    const modal = document.getElementById('editModalEmail');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeEditModalEmail() {
    const modal = document.getElementById('editModalEmail');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    resetModal('editModalEmail');
}

function openLogoutModal() {
    const modal = document.getElementById('modalLogout');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModalLogout() {
    const modal = document.getElementById('modalLogout');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}



function resetModal(modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) return;

    // Jangan reset input penting Laravel
    const skip = ["_token", "_method"];

    // Reset semua input
    modal.querySelectorAll("input").forEach(input => {
        // Lewati CSRF & method spoofing
        if (skip.includes(input.name)) return;

        switch (input.type) {
            case "file":
                input.value = "";
                break;

            case "checkbox":
            case "radio":
                input.checked = false;
                break;

            default:
                input.value = "";
                break;
        }
    });

    // Reset textarea
    modal.querySelectorAll("textarea").forEach(textarea => {
        textarea.value = "";
    });

    // Reset select
    modal.querySelectorAll("select").forEach(select => {
        select.selectedIndex = 0;
    });

    // Reset preview image (jika ada)
    modal.querySelectorAll('img[data-default]').forEach(img => {
        img.src = img.getAttribute('data-default');
    });

    // Hapus error Laravel atau custom
    modal.querySelectorAll(".text-red-500, .error-message").forEach(err => {
        err.textContent = "";
    });
}



function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const eyeIcon = document.getElementById('eye-' + inputId);
    if (input.type === 'password') {
        input.type = 'text';
        eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />'; // Eye-off icon
    } else {
        input.type = 'password';
        eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />'; // Eye icon
    }
}