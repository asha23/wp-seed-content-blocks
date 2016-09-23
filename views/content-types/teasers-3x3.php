<?php

$typeVar = $_SESSION['typeVar'];
$teasers = get_sub_field('teaser_component');
?>

<section class="container teaser-block">

	<div class="row">
<?php
	if($teasers):
		foreach($teasers as $post):
			setup_postdata($post);
			$teaser = get_field('teaser_text', $post);
?>
			<article class="teaser-item match">
<?php
				// Generate random numbers to change background position
				$randx = rand(3, 8) * 10;
				$randy = rand(3, 8) * 10;
?>
				<a href="<?php the_permalink(); ?>">
					<div class="inner" style="background-position:<?php echo $randx; ?>% <?php echo $randy; ?>%;">
						<div class="text">
							<header>
								<h2><?php the_title(); ?></h2>
							</header>
<?php
							if($teaser):
?>
							<div class="teaser-text">
								<?php echo $teaser; ?>
							</div>
<?php
							endif;
?>
						</div>
						<div class="overlay"></div>

					</div>
				</a>
			</article>
<?php
		endforeach;
		wp_reset_postdata();
	endif;
?>
	</div>
</section>
