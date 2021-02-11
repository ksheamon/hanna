"use strict";

import { Component } from 'react';


class Comp extends Component {
    constructor($el) {
    	$el = $el instanceof $ ? $el : $($el);

    	super($el, { noRender: true, tmpl: '' });

	    this._$el = $el;
	    this._$els = {};

	    this._$els.mTrigger = $el.find('.heading--trigger');

	    this._$els.mTrigger.on('click', this._onClick.bind(this));
	}

	/*
	* Runs on click mobile function
	*/
	_onClick(evt) {
		var clicked = $(evt.target);
		var section = $(clicked).parents('.widget');
		
		section.toggleClass('is-open');
	}
}

export { Comp };