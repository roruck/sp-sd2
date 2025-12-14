import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import Swal from 'sweetalert2';

// Used in Admin conferences list (delete confirmation)
window.confirmDelete = function (formId) {
  const t = window.sd1Texts || {};
  Swal.fire({
    title: t.deleteTitle || 'Delete?',
    text: t.deleteText || 'This action cannot be undone',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: t.deleteConfirm || 'Yes, delete',
    cancelButtonText: t.deleteCancel || 'Cancel',
  }).then((result) => {
    if (result.isConfirmed) {
      const form = document.getElementById(formId);
      if (form) form.submit();
    }
  });
};
