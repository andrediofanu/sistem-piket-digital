import './bootstrap';
// Core JS
import './core/bootstrap.bundle.min';
import './core/popper.min';

// Plugins
import './plugins/perfect-scrollbar.min';
import './plugins/smooth-scrollbar.min';
import './plugins/chartjs.min';
import './plugins/bootstrap-notify';

// Dashboard main JS
import './soft-ui-dashboard.min';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
