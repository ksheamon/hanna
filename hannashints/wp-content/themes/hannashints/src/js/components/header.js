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
	    this._$els.searchBlock = $el.find('.block--search');
	    this._$els.searchToggle = $el.find('.search--toggle');
	    this._$els.search = this._$els.searchBlock.find('input[type="search"]');

	    this._$els.mToggle.on('click', this._onClick.bind(this));
	    this._$els.searchToggle.on('click', this._onSearch.bind(this));
	}

	_onClick() {
		this._$els.mToggle.toggleClass('is-open');
		this._$els.popout.toggleClass('is-open');
	}

	_onSearch() {
		this._$els.searchBlock.toggleClass('is-open');

		if($(this._$els.searchBlock).hasClass('is-open')) {
			this._$els.search.focus();
		}
	}
}

export { Comp };