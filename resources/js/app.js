require('./bootstrap');

import bootstrap from 'bootstrap/dist/js/bootstrap.bundle';
window.bootstrap = bootstrap;

import Swal from 'sweetalert2'

window.addEventListener('swal', event => {
    Swal.fire(event.detail)
})





// Show and Hide Edit Modal Task
let editModal = document.getElementById('editForm');
if (editModal) {
    var editModalBootstrap = new bootstrap.Modal(editModal);
}
Livewire.on('showEditModal', () => {
    editModalBootstrap.show()
})
Livewire.on('hideEditModal', () => {
    editModalBootstrap.hide()
})
