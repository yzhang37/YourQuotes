<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="panel panel-default">
<div class="panel-body">
<h1><?php echo (isset($need)?$need:'langId: Need brain-storming?');?></h1>
<h3><?php echo (isset($doWhat)?$doWhat:'langId: Need brain-storming?');?></h3>
</div><?php 
	//var_dump($tagdata);
?><div class="panel-body" id="display-box">
<ul class="tag-list">
<?php 
foreach ($tagdata as $item)
{
	?><li><a href='javascript: void(0);' onclick='window.location.href="/tag/<?php 
		echo $item['tid'];	
	?>"'><?php
	echo $item['resname'];
	echo '</a></li>';
}
?>
</ul>
</div>
<div class="panel-footer">
<h1>或者可以搜索标签</h1>
</div>
</div>