<?php
/**
 * Default template: index.php.
 *
 * @see https://wphierarchy.com
 * @see https://codex.wordpress.org/Theme_Development#Index_.28index.php.29
 * @see https://developer.wordpress.org/reference/functions/wp_head/
 * @see https://developer.wordpress.org/reference/functions/body_class/
 * @see https://developer.wordpress.org/reference/hooks/wp_footer/
 * @see https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 * @package ⽔
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_footer(); ?>
</body>
</html>
