<?php
	$top_str = (isset($toprate_title)?$toprate_title:'langId: Top-rated for %1');
	echo '<h3>';
	if ( isset($auth_name)) {
		$top_str = str_replace('%1', $auth_name, $top_str);
	}
	echo $top_str;
	echo '</h3>';?>
<ul class="nav nav-tabs">
<li role="presentation" class="active">
<a href="javascript: void(0);"><?php 
echo (isset($quote_title)?$quote_title:'langId: Quotes');
?></a></li>
<li role="presentation">
<a href="javascript: void(0);"><?php 
echo (isset($tag_title)?$tag_title:'langId: Tags');
?></a></li>
</ul>
