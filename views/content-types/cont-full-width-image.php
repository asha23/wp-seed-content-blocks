<?php

$typeVar = $_SESSION['typeVar'];
$image = get_sub_field('image', $typeVar);
?>

<style>
	.breadcrumbs {
		margin-bottom:0!important;
	}
</style>

<section class="container-fluid full-width-image" data-parallax="scroll" data-image-src="<?php echo $image['url']; ?>" style="background-size: 100% auto;"></section>
