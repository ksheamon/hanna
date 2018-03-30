var $ = require('jquery');
window.$ = $;

import is from './utils/is.js';


import { Comp as Header } from './components/header.js';
import { Comp as Slider } from './components/slider.js';
import { Comp as Sidebar } from './components/sidebar.js';

// ------------------------------------------------
// Functions

/**
 * Initializes base
 */
const initBase = () => {
    const body = document.body;
    const formEl = $('form');

    // Lets initialize general stuff
    body.classList.remove('no-script');
    is.ie() && body.classList.add('is-ie');
    is.edge() && body.classList.add('is-edge');
    is.chrome() && body.classList.add('is-chrome');
    is.safari() && body.classList.add('is-safari');
    is.ios() && body.classList.add('is-ios');
    is.android() && body.classList.add('is-android');
    is.mobile() && body.classList.add('is-mobile-type');
    is.touch() && body.classList.add('is-touch');

    
};

/**
 * Initializes components
 */
const initComponents = () => {
    const headerEl = $('header');
    const dropdownEl = $('.dropdown__custom');
    const sliderEl = $('.img-slider, .gallery');
    const sidebarEl = $('#secondary');

    //dropdownEl.each((i, val) => new Dropdown(val, { targetClose: dropdownEl }));
    headerEl.each((i, val) => new Header(val));
    sliderEl.each((i, val) => new Slider(val));
    sidebarEl.each((i, val) => new Sidebar(val));
};

/**
 * Initializes blocks
 */
const initBlocks = () => {
  
};

// ------------------------------------------------
// Runtime

try {
    // Wait for all to actually be ready
    $(document).ready(() => {
        // Now set all the others
        initBase();
        initComponents();
        initBlocks();
    });
} catch (err) {
    console.error(err);
}
