<?php
/*
Plugin name: Hellocoton
Plugin URI: http://www.hellocoton.fr/
Author: Team Hellocoton
Author URI: http://www.hellocoton.fr/
Version: 0.3
Description: Ajoute un bouton "J'aime cet article" par hellocoton.

INSTALL :
L'installation est automatique ! C'est terminé :)

*/

add_filter('the_content', 'hellocoton_hook');
add_filter('the_excerpt', 'hellocoton_hook');

function hellocoton_html() {
	
	$articleUrl = urlencode(strip_tags(get_permalink()));
	
	$rand = rand(0,1000000);
	
	$return = '<span id="hellocoton_'.$rand.'" style="display:block;width:147px;height:26px;position:relative;padding:0;border:10px 0px;margin:0;clear:both;"><a href="#" onclick="javascript:return false;"  style="display:block;width:120px;height:26px;position:absolute;top:0;left:0;padding:0;border:0;margin:0;"><img src="http://www.hellocoton.fr/widgets/img/action-on-h.gif" border="0" style="padding:0;border:0;margin:0;float:none;" /></a><a href="http://www.hellocoton.fr" target="_blank" style="display:block;width:27px;height:26px;position:absolute;top:0;left:120px;"><img src="http://www.hellocoton.fr/widgets/img/hellocoton.gif" border="0" alt="Rendez-vous sur Hellocoton !" style="padding:0;border:0;margin:0;float:none;" /></a></span>';
	
	return $return.'<script src="http://www.hellocoton.fr/widgets/js.php?uniq='.$rand.'&url='.$articleUrl.'" type="text/javascript"></script>';
	
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