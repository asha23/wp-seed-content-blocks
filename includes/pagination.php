<?php


//******************************************************************************
// SETUP PAGINATION
//******************************************************************************
function seed_pagination($pages = '', $range = 2, $nextPrev = 0, $next ='', $prev = '', $separator = '|'){
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;

		if(!$pages){
			$pages = 1;
		}
	}

	if(1 != $pages){
		echo '<nav class="pagination">';
			if($nextPrev == 1){
				previousPage($prev,$separator);
			}

			if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<a href="'.fixCategory(get_pagenum_link(1)).'">&laquo;</a>';
			if($paged > 1 && $showitems < $pages) echo '<a href="'.fixCategory(get_pagenum_link($paged - 1)).'">&laquo;</a>';

			for ($i=1; $i <= $pages; $i++){
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
					echo ($paged == $i)? '<span class="current"> '.$i.' </span>':'<a href="'.fixCategory(get_pagenum_link($i)).'" class="inactive" >'.$i.'</a>';
				}
			}

			if ($paged < $pages && $showitems < $pages) echo '<a href="'.fixCategory(get_pagenum_link($paged + 1)).'">&rsaquo;</a>';
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<a href="'.fixCategory(get_pagenum_link($pages)).'">&raquo;</a>';

			if($nextPrev == 1){
				nextPage($next,$separator,$pages);
			}
		echo '</nav>';
	}
}

// Create previous button
function previousPage($prev,$separator){
	global $paged;
	if(empty($paged)) $paged = 1;
	if(empty($prev)) $prev = '&laquo;';
	if($paged != 1)
		echo '<a class="btn prev" href="'.fixCategory(get_pagenum_link($paged - 1)).'">'.$prev.'</a> '.$separator.' ';
}

// Create next button
function nextPage($next,$separator,$pages){
	global $paged;
	if(empty($paged)) $paged = 1;
	if(empty($next)) $next = '&raquo;';
	if($paged != $pages)
		echo ' '.$separator.' <a class="btn next" href="'.fixCategory(get_pagenum_link($paged + 1)).'">'.$next.'</a>';
}

// Fix category
function fixCategory($str){
	return $str;
	$base = get_bloginfo('url');
	return str_replace("{$base}/news/", "{$base}/category/news/", $str);
}
