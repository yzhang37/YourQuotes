<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><script type="text/javascript">
	jQuery(function() {
		//TODO: 增加初始化选择的代码
	});
</script>
<div class="panel panel-default">
<div class="panel-body">
<h1><?php 
	$tag_header_text = str_replace('%1', $tag_resname, $tag_header_text);	
	echo $tag_header_text;
?></h1>
</div>
<ul class="list-group">
<li class="list-group-item">
<p>选择查看最受欢迎的名言或作者。</p>
<ul class="nav nav-tabs" id="top-rated-nav" tid="<?php echo $tag_id;?>">
<li class='active' role="presentation">
<a href="javascript: void(0);" id="tag_tab_quote"><?php 
	echo (isset($tabname_1)?$tabname_1:'langId: Quotes');
?></a>
</li>
<li role="presentation">
<a href="javascript: void(0);" id="tag_tab_tags"><?php 
	echo (isset($tabname_2)?$tabname_2:'langId: Authors');
?></a>
</li>
</ul>
<div id="disp_div"></div>
</li>
</ul>
</div>
