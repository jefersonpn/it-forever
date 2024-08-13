import 'bootstrap/dist/css/bootstrap.min.css';

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import toastr from 'toastr';
window.toastr = toastr;

// Configure Toastr globally
toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-top-right',
    timeOut: '5000',
};
