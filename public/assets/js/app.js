import './bootstrap';

// Core JS
import './core/bootstrap.bundle.min.js';
import './core/popper.min.js';

// Soft UI Dashboard JS
import './soft-ui-dashboard.js';

// Plugins (if used)
import './plugins/perfect-scrollbar.min.js';
import './plugins/smooth-scrollbar.min.js';

// Alpine.js
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();
