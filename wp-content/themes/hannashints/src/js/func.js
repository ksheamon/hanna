"use strict";

import { Component } from 'react';

class Comp extends Component {
    constructor($el) {
    	$el = $el instanceof $ ? $el : $($el);

    	super($el, { noRender: true, tmpl: '' });

	    this._$el = $el;

	    this._$el.on('click', this._onSubmit.bind(this));
	}

	_onSubmit(evt) {
		
	}
}

export { Comp };