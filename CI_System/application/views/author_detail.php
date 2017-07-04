<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="container">
<div class="panel panel-default author-panel">
<div class="panel-heading">
<?php
if ( ! empty($auth_scndname)) {
	echo '<small>'.$auth_scndname.'</small>';
}
?>
<h3><?php echo (empty($auth_name)?'Invalid author name':$auth_name);?></h3>
</div>
<div class="panel-body">
<div class="col-md-5 col-lg-4">
<table class="table">
<tbody>
<?php
$item_nums = count($key_data);
for ($i = 0; $i < $item_nums; ++$i) {
	echo '<tr><td>'.$key_data[$i].'</td><td>'.$value_data[$i].'</td></tr>';
}
?></tbody>
</table>
</div>
<div class="col-md-7 col-lg-8">
<?php if ( ! empty($auth_dspr)) {
	echo $auth_dspr;
}?></div>
</div>
</div>
</div>
