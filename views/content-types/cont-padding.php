<?php

$typeVar = $_SESSION['typeVar'];
$padding = get_sub_field('padding', $typeVar)
?>

<section class="container-fluid" style="margin-top:<?php echo $padding; ?>"></section>
