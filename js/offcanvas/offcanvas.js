(function($) {
    "use strict";

    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        initializeOffcanvas();
    });

    function initializeOffcanvas() {
        // Cache DOM elements with null checks
        const sidebarBox = document.querySelector('#box');
        const sidebarBtn = document.querySelector('#btn');
        const pageWrapper = document.querySelector('#main-content');

        // Check if required elements exist
        if (!sidebarBox || !sidebarBtn) {
            console.warn('Offcanvas: Required elements (#box, #btn) not found in DOM');
            return;
        }

        // Toggle sidebar on button click
        sidebarBtn.addEventListener('click', function(event) {
            event.preventDefault();
            toggleSidebar();
        });

        // Close sidebar on ESC key
        window.addEventListener('keydown', function(event) {
            if (sidebarBox.classList.contains('active') && event.keyCode === 27) {
                closeSidebar();
            }
        });

        // Optional: Close sidebar when clicking outside (uncomment if needed)
        // if (pageWrapper) {
        //     pageWrapper.addEventListener('click', function(event) {
        //         if (sidebarBox.classList.contains('active')) {
        //             closeSidebar();
        //         }
        //     });
        // }

        // Helper functions
        function toggleSidebar() {
            const isActive = sidebarBtn.classList.contains('active');

            if (isActive) {
                closeSidebar();
            } else {
                openSidebar();
            }
        }

        function openSidebar() {
            sidebarBtn.classList.add('active');
            sidebarBox.classList.add('active');
        }

        function closeSidebar() {
            sidebarBtn.classList.remove('active');
            sidebarBox.classList.remove('active');
        }
    }

    // Optional: Smooth scroll functionality (uncomment if needed)
    /*
    $(function() {
        $('a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 450);
                    return false;
                }
            }
        });
    });
    */

})(jQuery);
