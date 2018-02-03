var $ = require('jquery');
window.$ = $;

import { Comp as SampleTest } from './func.js';

const bodyEl = $('body');

bodyEl.each((i, val) => new SampleTest(val));