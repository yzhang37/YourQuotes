jQuery(adjustQuotes);

function adjustQuotes()
{
	$("div.quote").each(function() {
		$(this).attr("class", "quote-ok");
		var htm = $(this).html();
		htm = '<span class="quoteblock bg-quote">“</span>' + htm + '<span class="quoteblock ed-quote">”</span>';
		$(this).html(htm);
	});
	$("div.author").each(function() {
		$(this).attr("class", "author-ok");
		var htm = $(this).html();
		htm = "——" + htm;
		$(this).html(htm);
	});
	$(".au-btn").click(function() {
		if (typeof($(this).attr('author_id')) == "undefined") {
			window.location.href = "/author/" + $(this).text();
		} else {
			window.location.href = "/author/" + $(this).attr('author_id');
		}
	});
	$(".pagi_button").click(function() {
		window.location.href = "?page=" + $(this).attr('pagi_id');
	});
}
