'use strict';

function Tile(element, options) {
	this.container 	= $('<div>');
	this.options		= $.extend({}, Tile.DEFAULTS, options);
	this.x					= 0;
	this.y					= 0;

	var instance 		= this;
	var initialize 	= function() {
		instance.container.addClass('tile');
		instance.container
			.on('mouseenter', $.proxy(instance.on, instance))
			.on('mouseout', $.proxy(instance.off, instance))
			.on('click', $.proxy(instance.activate, instance));
	}

	if(element !== undefined) {
		this.container = $(element);
	}

	initialize();
}

Tile.DEFAULTS = {
	x: 0,
	y: 0,
	position: {
		x: 0,
		y: 0
	}
}

Tile.prototype.render = function() {
	this.container.css({
		'top': 	this.options.position.y,
		'left': this.options.position.x
	});

	return this.container;
}

Tile.prototype.on = function() {
	this.container.addClass('on');
}

Tile.prototype.off = function() {
	this.container.removeClass('on');
}

Tile.prototype.activate = function(e) {
	var url = '/tile/' + this.x + '/' + this.y;

	$.get(url);
}

module.exports = Tile;