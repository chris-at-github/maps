var Tile = require('./Tile.js');

$('.tile-container > .tile').each(function(i, item) {
	var tileInstance = new Tile(item);
});

// var tileContainer = $('#tile-container');
// $.each(Maps.data.tiles, function(i, tileData) {
// 	var tileInstance	= new Tile(tileData);
// 			tileContainer.append(tileInstance.render());
// });