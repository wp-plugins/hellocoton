<?php
/*
Plugin name: Hellocoton
Plugin URI: http://www.hellocoton.fr/
Author: Team Hellocoton
Author URI: http://www.hellocoton.fr/
Version: 0.1
Description: Ajoute un bouton "J'aime" par hellocoton.

INSTALL :
L'installation est automatique ! C'est terminé :)

*/

add_filter('the_content', 'hellocoton_hook');
add_filter('the_excerpt', 'hellocoton_hook');

function hellocoton_html() {
	
	$articleUrl = urlencode(strip_tags(get_permalink()));
	
	return '<script src="http://www.hellocoton.fr/widgets/js.php?url='.$articleUrl.'" type="text/javascript"></script>
	<noscript>Venez voter pour cet article sur <a href="http://www.hellocoton.fr">hellocoton</a></noscript>';
	
}

function hellocoton_hook($content='') {

	if (is_feed()) {
		$content .= hellocoton_html();
	} else {
		$content .= hellocoton_html();
	}
	return $content;

}

?>