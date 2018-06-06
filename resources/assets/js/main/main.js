
/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

window.$ = window.jQuery = require('jquery');

// BOOTSTRAP COMPONENTS
require('../_bootstrap/index.js');
require('../_bootstrap/util.js');
require('../_bootstrap/modal.js');


// APPLICATION COMPONENTS
require('./components/modal-ajax.js');
require('./components/likes.js');