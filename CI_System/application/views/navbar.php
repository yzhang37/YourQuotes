<div class="container-fluid">
<nav class="navbar navbar-default">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="javascript: void(0);"><?php echo $website_name;?></a>
</div>

<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">
<?php
$item_count = count((isset($nav_items)?$nav_items:array()));
for ($i = 0; $i < $item_count; ++$i) {
	echo '<li';
	if ($selected_item == $nav_items[$i]) {
		echo ' class="active"';
	}
	echo '><a href="'.$nav_itemurls[$i].'">'.$nav_items[$i].'</a><li>';
}
?>
</ul>
<ul class="nav navbar-form navbar-nav navbar-right">
<li class="dropdown has-feedback">
<input class="form-control dropdown-toggle" data-toggle="dropdown"	 aria-haspopup="true" aria-expanded="false" placeholder="<?php echo $search_ph;?>"></input>
<span class="glyphicon glyphicon-search form-control-feedback"></span>
<ul class="dropdown-menu">
    <li><a href="#" id="direct-search">搜索...</a></li>
</ul>
</li>
</ul>
</div>  
</nav> </div>
<div class="container">
