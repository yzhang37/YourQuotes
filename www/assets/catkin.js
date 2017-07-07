var hex = new Array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F');
var tagcat_btntype = new Array("btn-xs", "btn-sm", "btn-md", "btn-lg");
function RandInt(min, max) {
	return (min + Math.round(Math.random() * (max - min)));  
}
jQuery(function() {
	init_display();
	function checkIn(px, py, arr) {
		return ((arr[0] <= px && px <= arr[2]) ||
		   (arr[1] <= py && py <= arr[3]));
	}
	function refresh_tag(box) {
		var b_width = Number(box.width());
		var b_height = Number(box.height());
		var base = box.offset();
		box.find("ul.tag-list:first").each(function() {
			var idx = 0;
			var type = 3;
			if (b_width <= 300) {type = 0;}
			else if (b_width <= 400) { type=1; }
			else if (b_width <= 640) { type = 2; }
			var item = $(this).find("li");
			var hist_pts = new Array();
			item.each(function() {
				var alnk = $(this).find("a");
				var this_width = 0.0, this_height = 0.0, this_posx = 0.0, this_posy = 0.0;
				var x1 = 0.0, x2 = 0.0, y1 = 0.0, y2 = 0.0;
				var flag = false;
				++type;
				do {
					--type;
					for (var i = 0; i < 4; ++i)
						alnk.removeClass(tagcat_btntype[i]);
					alnk.addClass(tagcat_btntype[type]);
					var try_count = 0;
					do {
						this_width = Number($(this).width());
						this_height = Number($(this).height());
						if (typeof($(this).attr("posx")) != "undefined") {
							this_posx = Number($(this).attr("posx"));
							this_posy = Number($(this).attr("posy"));
						} else {
							this_posx = Math.random().toFixed(3);
							this_posy = Math.random().toFixed(3);					
						}
						$(this).attr("posx", this_posx);
						$(this).attr("posy", this_posy);	
						try_count++;
						x1 = base.left + (b_width - this_width) * this_posx;
						y1 = base.top + (b_height - this_height) * this_posy;
						x2 = x1+this_width;
						y2 = y1+this_height; 
						for (var i = 0; i < idx; ++i) {
							if (  	
							(((hist_pts[i][0] <= x1 && x1 <= hist_pts[i][2]) || (hist_pts[i][0] <= x2 && x2 <= hist_pts[i][2])) && (y1 <= hist_pts[i][1] && hist_pts[i][1] <= y2 || y1 <= hist_pts[i][3] && hist_pts[i][3] <= y2)) ||
							(((hist_pts[i][1] <= y1 && y1 <= hist_pts[i][3]) || (hist_pts[i][1] <= y2 && y2 <= hist_pts[i][3])) && (x1 <= hist_pts[i][0] && hist_pts[i][0] <= x2 || x1 <= hist_pts[i][2] && hist_pts[i][2] <= x2))  ) {
								flag = true;
								$(this).removeAttr("posx");
								$(this).removeAttr("posy");
								break;
							}
						}
					} while (flag && try_count <= 10);
				} while (flag && (type >= 1 || try_count <= 10));
				hist_pts.push(new Array(x1, y1, x2, y2));
				$(this).css("left", x1.toString()+"px");
				$(this).css("top", y1.toString()+"px");
				$(this).attr("posx", this_posx);
				$(this).attr("posy", this_posy);	
				++idx;
			});
		});
	}
	$("#display-box").each(function() {
		var box = $(this);
		box.find("ul.tag-list").each(function() {
			$(this).find("li").each(function() {
				var btn = $(this).find("a");
				btn.removeAttr("class");
				$(this).removeAttr("posx");
				$(this).removeAttr("posy");
				btn.addClass("btn");
				btn.addClass("btn-color-"+hex[RandInt(0, 15)]);
			});
		});
		setTimeout(function() {
			refresh_tag(box);
		}, 20);
	});
	
	function init_display() {
		$("#display-box").each(function () {
			if (typeof($(this).attr("orig_width")) == "undefined" || 
				$(this).attr("orig_width") != $(this).width()) {
				$(this).height($(this).width() / 5 * 2);
				$(this).attr("orig_width", $(this).width());
			}
			refresh_tag($(this));
		});
	}
	$(window).resize(init_display);
});