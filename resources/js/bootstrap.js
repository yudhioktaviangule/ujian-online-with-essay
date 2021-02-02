
import Main from './component/main';
import MyCKE from './component/ckeditor';
window._ = require('lodash');
try {
    window.Popper = require('popper.js').default;
    
    require('bootstrap');
    window.CKE = new MyCKE();
} catch (e) {}
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

