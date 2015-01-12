var Tile = require('./Tile.js');
var DataContainer = require('./DataContainer.js');

var data = new DataContainer($('.data-container'));
		data.set('<b>Hello Chris</b>');
		data.activate();

$('.tile-container > .tile').each(function(i, item) {
	var tileInstance = new Tile(item);
});

// var tileContainer = $('#tile-container');
// $.each(Maps.data.tiles, function(i, tileData) {
// 	var tileInstance	= new Tile(tileData);
// 			tileContainer.append(tileInstance.render());
// });