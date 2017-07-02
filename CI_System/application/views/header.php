<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title><?php echo $title;?></title>
<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.min.js'></script>
<link href='https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css' rel="stylesheet" />
<style>
	span.quoteblock
	{
		font-size: 1.5em;
		font-weight: bold;
	}
	span.bg-quote
	{
		margin-right: 5px;
		float:left;
	}
	span.ed-quote
	{
		margin-left: 5px;
		float:right;
	}
	div.author { display:none; }
	div.author-ok {	text-align: right;}
	div.quote { display:none; }
	div.quote-ok
	{
		font-size: 1.5em;
	}
	div.quote-item
	{
		border: rgba(208, 208, 208, 1.0) 1px solid;
		box-shadow: rgba(208, 208, 208, 1.0) 0 0 8px;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	div.quote-header
	{
		padding:10px 10px 10px 10px;
		border-bottom: rgba(208, 208, 208, 1.0) solid 1px;
	}
	div.quote-content
	{
		padding:2px 10px 2px 10px;
	}
	div.quote-footer
	{
		padding: 0px 10px 0px 10px;
		border-top: rgba(208, 208, 208, 1.0) solid 1px;
		background: rgba(232, 232, 232, 1.0);
	}
</style>
<script type="text/javascript">
	jQuery(function(){
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
	});
</script>
</head>
