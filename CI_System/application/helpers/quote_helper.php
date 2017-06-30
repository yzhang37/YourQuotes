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
function proto_emit_quote($quote = 'langId-quote', $author = 'langId-author', $tag_notice = 'landId-tag: ', $tags) {
	$arg_count = func_num_args();
	?>
<div class="container quote-item">
<div class="row quote-content">
<div class="quote"><?php
	echo $quote;
?></div>
</div>
<div class="row quote-content">
<div class="author"><?php
	echo $author;
?></div>
</div>
<div class="row quote-footer"><?php
	echo $tag_notice;
	for ($i = 3; $i < $arg_count; ++$i)
	{	
		echo '<a href="javascript: void(0);" class="btn btn-link tag_link" >';
		echo func_get_arg($i);
		echo '</a>';	
	}
?></div>
</div><?php
}

}


