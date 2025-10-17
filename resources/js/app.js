import './bootstrap';

// Core JS
import './core/bootstrap.bundle.min.js';
import './core/popper.min.js';

// resources/js/app.js

 // This is the most important one for styling!

// 2. Import core JavaScript files
// Ensure this order is correct: Bootstrap dependencies first, then the theme's JS.
// You will likely need to adjust these paths based on how you have them structured.

// Example Imports (adjust paths as necessary):
import './core/popper.min.js'; // Often required for Bootstrap components
import './bootstrap.js';
import './soft-ui-dashboard.js'; // The main JS for the dashboard's functionality (including sidebar logic)

// 3. Import plugins (if your Soft UI setup requires them to be global)
// import './plugins/perfect-scrollber.min.js';
// import './plugins/smooth-scrollber.min.js';

// If you are using Vue/React/Alpine, initialize your framework here.

window.Alpine = Alpine;
Alpine.start();
