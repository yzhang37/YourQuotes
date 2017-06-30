<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function proto_emit_quote($quote, $author, $tags) {
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
	echo "TODO: langId-Tags";
	for ($i = 2; $i < $arg_count; ++$i)
	{	
		echo '<button class="btn btn-link">';
		echo func_get_arg($i);
		echo '</button>';	
	}
?></div>
</div><?php
}

proto_emit_quote('人要坚强', '坚强使者', '善良', '积极', '向上');
proto_emit_quote('人要自信', '自信使者', '善良', '积极', '向上');
proto_emit_quote('人要乐观', '乐观使者', '善良', '积极', '向上');
proto_emit_quote('人要真诚', '真诚使者', '善良', '积极', '向上');

