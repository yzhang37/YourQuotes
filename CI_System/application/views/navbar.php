<nav class="navbar navbar-default">
<div class="container-fluid">
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
$item_count = count($nav_items);
for ($i = 0; $i < $item_count; ++$i) {
	echo '<li';
	if ($selected_item == $nav_items[$i]) {
		echo ' class="active"';
	}
	echo '><a href="'.$nav_itemurls[$i].'">'.$nav_items[$i].'</a><li>';
}
?>
</ul><?php
      //<ul class="nav navbar-nav navbar-right">
      //  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      //  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      //</ul>
?>
<div class="navbar-form navbar-right">
<div class="form-group has-feedback">
<input class="form-control" placeholder="<?php echo $search_ph;?>"></input>
<span class="glyphicon glyphicon-search form-control-feedback"></span>
</div>
<ul class="dropdown-menu">
    <li><a href="#">HTML</a></li>
    <li><a href="#">CSS</a></li>
    <li><a href="#">JavaScript</a></li>
</ul>
</div>

</div>  
</div>
</nav>