function switchToQuotes(cur) {
	jQuery(function() {
		var tag_id = $("#top-rated-nav").attr('tid');
		$.post("/search",
		{
			aid:tag_id,
			type:'toprated',
		},
		function(msg) {
			clearTopRated(cur, msg);
			adjustQuotes();
		});
	});
}