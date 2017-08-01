/**
 * SCRUM - Agile project management
 * Copyright 2015 agilescrumsolutions.com
 *
 */
(function () {
    angular.module('SCRUM', [
        'ui.router',                    // Routing
        'oc.lazyLoad',                  // ocLazyLoad
        'ui.bootstrap',                 // Ui Bootstrap
        'pascalprecht.translate',       // Angular Translate
        'ngIdle'                        // Idle timer
    ])
})();

// Other libraries are loaded dynamically in the config.js file using the library ocLazyLoad