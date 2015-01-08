!function($) {
	$(function() {

		var s = Snap('#world-map-container');

		$.each(tileCollection, function(i, tileModel) {
			var tileGroup 		= s.paper.g();
			var tilePolygon 	= s.paper.polygon(tileModel.coordinates);

			tilePolygon.attr({
				fill: '#eee',
				stroke: "#bbb",
				strokeWidth: 0.5
			});

			tileGroup.add(tilePolygon);
			tileGroupData = tileGroup.getBBox();

			var tilePosition	= s.paper.text(tileGroupData.x, tileGroupData.y, tileModel.x + ' / ' + tileModel.y);
					tilePosition.attr({x: tileGroupData.cx - (25 / 2), y: tileGroupData.cy + (15 / 2)});


			tileGroup.add(tilePosition);
		});
	});
} (window.jQuery);