window._ = require('lodash');

try {
    window.bootstrap = require('bootstrap5/dist/js/bootstrap.bundle');
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}