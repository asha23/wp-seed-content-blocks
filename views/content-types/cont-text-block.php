<?php

$typeVar = $_SESSION['typeVar'];

$block_title = get_sub_field('title', $typeVar);
$block_type = get_sub_field('block_type', $typeVar);
$full_content = get_sub_field('full_width_content', $typeVar);

// Left block

$l_image_or_plain_text = get_sub_field('left_image_or_plain_text', $typeVar);
$l_column_width = get_sub_field('left_column_width', $typeVar);
$l_text = get_sub_field('left_text', $typeVar);
$l_image = get_sub_field('left_image', $typeVar);

// Right block

$r_image_or_plain_text = get_sub_field('right_image_or_plain_text', $typeVar);
$r_column_width = get_sub_field('right_column_width', $typeVar);
$r_text = get_sub_field('right_text', $typeVar);
$r_image = get_sub_field('right_image', $typeVar);

?>

<section class="container text-block">

<?php
		if($block_title):
?>
			<header>
				<h1><?php echo $block_title; ?></h1>
			<header>
<?php
		endif;

		switch($block_type) {
			case "full-width":
?>
				<article class="full-width">
					<?php echo $full_content; ?>
				</article>
<?php
			break;
			case "split":
?>
			<div class="row">
				<article class="col-md-<?php echo $l_column_width; ?> col-sm-6">
<?php
					if($l_image_or_plain_text == "plain-text"):
						echo $l_text;
					else:
?>
					<figure>
						<img src="<?php echo $l_image['url']; ?>" class="img-respond" alt="">
					</figure>
<?php
					endif;
?>
				</article>

				<article class="col-md-<?php echo $r_column_width; ?> col-sm-6">
<?php
					if($r_image_or_plain_text == "plain-text"):
						echo $r_text;
					else:
?>
					<figure>
						<img src="<?php echo $r_image['url']; ?>" class="img-respond" alt="">
					</figure>
<?php
					endif;
?>
				</article>
			</div>
<?php
		break;
	}
?>

</section>
