'use strict';

function DataContainer(element, options) {
	this.container 	= $('<div>');
	this.options		= $.extend({}, DataContainer.DEFAULTS, options);

	var instance 		= this;
	var initialize 	= function() {

	}

	if(element !== undefined) {
		this.container = $(element);
	}

	initialize();
}

DataContainer.DEFAULTS = {
}

DataContainer.prototype.activate = function() {
	this.container.removeClass('hide');
	return this;
}

DataContainer.prototype.set = function(data) {
	this.container.html(data);
	return this;
}

DataContainer.prototype.load = function(url) {
	var instance = this;

	$.ajax({
  	url: url
  })
	.done(function(data) {
  	instance
  		.set(data)
  		.activate();
  });

	return this;
}

module.exports = DataContainer;