function switchToQuotes(cur) {
	jQuery(function() {
		var a_id = $("#top-rated-nav").attr('aid');
		$.post("/search",
		{
			aid:a_id,
			type:'toprated',
		},
		function(msg) {
			//alert(msg);
			clearTopRated(cur, msg);
			adjustQuotes();
		});
	});
}

function clearTopRated(curItem, data) {
	jQuery(function() {
		var div = $("#disp_div");
		$("#top-rated-nav").find("li").each(function() {
			$(this).removeClass("active");
		});
		curItem.parent().addClass("active");
		div.html(data);
	});
}

jQuery(function() {
	$("#auth_tab_quote").click(function() { 
		switchToQuotes($(this));
	});
	
	$("#auth_tab_tags").click(function() {
		clearTopRated($(this), "靠前标签");
	});
});
