"use strict";

import { Component } from 'react';

import 'slick-carousel';

class Comp extends Component {
    constructor($el) {
    	$el = $el instanceof $ ? $el : $($el);

    	super($el, { noRender: true, tmpl: '' });

	    this._$el = $el;
	    this._$els = {};

	    this._$els.slides = this._$el.find('.slides');

	    this._initSlider();
	}

	_initSlider() {
		this._$els.slides.slick();
	}
}

export { Comp };