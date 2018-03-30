"use strict";

import { Component } from 'react';


class Comp extends Component {
    constructor($el) {
    	$el = $el instanceof $ ? $el : $($el);

    	super($el, { noRender: true, tmpl: '' });

	    this._$el = $el;
	    this._$els = {};

	    this._$els.mToggle = $el.find('#toggle');
	    this._$els.popout = $el.find('.popout');

	    this._$els.mToggle.on('click', this._onClick.bind(this));
	}

	_onClick() {
		this._$els.mToggle.toggleClass('is-open');
		this._$els.popout.toggleClass('is-open');
	}
}

export { Comp };