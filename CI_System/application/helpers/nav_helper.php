<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('emit_pagination'))
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
function emit_pagination($start, $end, $current, $max_count = -1, $display_next = FALSE)
{
?>
<div style="text-align: center;">
<div class="pagination">
<?php
	if ($start > $end) {
		throw new Exception('Start should be smaller or equal End page.');
	}
	if ($current > $end OR $current < $start) {
		throw new Exception('Invalid argument. $current is '.$current.' and should be in '.$start.' and '.$end.'.');
	}
	if ($max_count == -1) {
		 $max_count = $end - $start + 1;
	} else if ($max_count < 7) {
		throw new Exception("The minimum number for the pagination should be 7.");
	} else if ($max_count > $end - $start + 1) {
		$max_count = $end - $start + 1;
	}
	if ($display_next == TRUE) {
		echo '<li';
		if ($current == $start)
			echo ' class = "disabled" ';
		echo '><a>langId:Previous</a></li>';
	}
	$left = $max_count;
	$first = FALSE;
	$last = FALSE;
	$adjust = FALSE;
	$partial = -1;
	if ($end - $start - 2 > $max_count - 3) {
		if ($current >= $end - 3) {
			$partial = $end - $max_count + 2;
		} else {
		$adjust = TRUE;
		$partial = $current - ceil(($max_count-3) / 2.0);
		if ($partial <= 1)
			$partial = 2;
		}
	}
	$i = $start;
	while ($left > 0)
	{
		if (! $last && ((! $adjust && $left <= 1) OR ($adjust && $left <= 2))) {
			if ( $adjust) {
				echo '<li class="disabled"><a>...</a></li>';
				--$left;
			}
			$i = $end;
			$last = TRUE;
		} else if ( ! $first) {
			$first = TRUE;
		} else if ($partial != -1)
		{
			if ($partial > $i) {
				echo '<li class="disabled"><a>...</a></li>';
				--$left;
				$i = $partial + 1;
			} else {
			$i = $partial;
			}
			$partial = -1;
			
		}
		$left--;
		//output procedure
		echo '<li';
		$cur_class = '';
		if ($i == $current) {
			$cur_class = $cur_class.' active';
		}
		if ( ! empty($cur_class)) {
			echo ' class="'.trim($cur_class).'"';
		}
		echo '><a ';
		echo '';
		echo '';
		echo '>'.$i.'</a></li>';
		++$i;
	}
	if ($display_next == TRUE) {
		echo '<li';
		if ($current == $end)
			echo ' class = "disabled" ';
		echo '><a>langId:Next</a></li>';
	}
	?>
</div>
</div><?php
}
}
