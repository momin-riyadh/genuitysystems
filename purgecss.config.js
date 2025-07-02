module.exports = {
  content: ['*.php', '*.html', 'js/**/*.js'], // Scan PHP, HTML, and JS files
  css: [
    'css/theme-default.css',
    'css/corporate.css',
    'css/shortcodes.css',
    'js/bootstrap/bootstrap.min.css',
    'js/megamenu/stylesheets/screen.css',
    'js/loaders/stylesheets/screen.css',
    'fonts/font-awesome/css/font-awesome.min.css',
    'fonts/Simple-Line-Icons-Webfont/simple-line-icons.css',
    'fonts/et-line-font/et-line-font.css',
    'js/revolution-slider/css/settings.css',
    'js/revolution-slider/css/layers.css',
    'js/revolution-slider/css/navigation.css',
    'js/owl-carousel/owl.carousel.css',
    'js/owl-carousel/owl.theme.css',
    'js/cubeportfolio/cubeportfolio.min.css',
    'js/accordion/css/smk-accordion.css',
    'js/ytplayer/ytplayer.css',
    'js/tabs/css/responsive-tabs.css',
    'js/jFlickrFeed/style.css',
    'js/parallax/main.css',
    'js/offcanvas/offcanvas.css',
    'js/smart-forms/smart-forms.css'
  ],
  safelist: {
    standard: [
      'active',
      'show',
      'hide',
      'open',
      'collapsed',
      'collapsing',
      'fade',
      'in',
      'modal-backdrop',
      'tooltip',
      'popover',
      /-(leave|enter|appear)(|-(to|from|active))$/,
      /^(.*?)-enter-active$/,
      /^(.*?)-leave-active$/,
      /^(.*?)-appear-active$/,
      /^(.*?)-enter-to$/,
      /^(.*?)-leave-to$/,
      /^(.*?)-appear-to$/,
      /^(.*?)-enter-from$/,
      /^(.*?)-leave-from$/,
      /^(.*?)-appear-from$/,
      /^carousel-item-/,
      /^modal-open$/,
      /^navbar-/,
      /^dropdown-/,
      /^data-v-/,
      /--open/,
      // Add common WordPress classes if applicable, though this project seems non-WP
      // /^(wp-)/,
      // /^(align)/,
      // /^(screen-reader-text)/
    ],
    deep: [
        /^rev_slider_wrapper/,
        /^rev_slider/,
        /^tp-revslider-mainul/,
        /^rs-/,
        /^(ui-)/,
        /^(owl-)/,
        /^(cbp-)/,
        /^(smk-)/,
        /^(mfp-)/,
        /^(slick-)/,
        /^(js-)/ // Common prefix for JavaScript hooks
    ],
    greedy: [ // Safelist patterns that might be too broad but necessary
        /slid/,
        /tooltip/,
        /popover/,
        /modal/,
        /dropdown/, // for bootstrap dropdowns
        /navbar/, // for bootstrap navbar
        /carousel/ // for bootstrap carousel
    ],
    keyframes: true,
    variables: true
  },
  output: './css_purged/', // Output directory for purged files
  // rejected: true // Keep this commented unless debugging specific selector issues
};
