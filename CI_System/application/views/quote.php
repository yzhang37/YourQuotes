<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('proto_emit_quote'))
{
/**
 * The very basic function for directly print the quote data.
 * 
 * Notice:
 * Should avoid directly call this in order to avoid
 * emiting the invalid data without multi-language support.
 * @param string, string, string
 * @return none
 */
function proto_emit_quote($quote = 'langId-quote',
	 $author = 'langId-author', $author_id = -1, $tag_title = 'langId: tag',
	 $tags = array(), $tagIDs = array()) {
	?>
<div class="container quote-item">
<div class="row quote-content">
<div class="quote"><?php
	echo $quote;
?></div>
</div>
<div class="row quote-content">
<div class="author"><?php
	echo '<a class="au-btn" href="javascript:void(0);"';
	if ($author_id >= 0)
		echo ' author_id = "'.$author_id.'"';
	echo '>'.$author.'</a>';
?></div>
</div>
<div class="row quote-footer"><?php
	echo $tag_title;
	
	$tag_count = count($tags);
	for ($i = 0; $i < $tag_count; ++$i)
	{	
		echo '<a href="javascript: void(0);" class="btn btn-link tag_link"';
		echo ' onclick='; ?>"window.location.href='tag/<?php echo $tagIDs[$i];?>'"><?php
		echo $tags[$i];
		echo '</a>';	
	}
?></div>
</div><?php
}

}

$item_count = count($quote_data);
foreach ($quote_data as $data) {
	proto_emit_quote($data['content'], 
	$data['author'],
	$data['author_id'],
	$tag_label,
	$data['tags'],
	$data['tags_id']);
}