<?php
/*
Plugin name: Hellocoton
Plugin URI: http://www.hellocoton.fr/
Author: Team Hellocoton
Author URI: http://www.hellocoton.fr/
Version: 0.4
Description: Ajoute un bouton "J'aime cet article" par hellocoton.

INSTALL :
L'installation est automatique ! C'est terminé :)

*/

if(!defined('WP_CONTENT_URL')) define('WP_CONTENT_URL',get_option('siteurl').'/wp-content');
if(!defined('WP_PLUGIN_URL')) define('WP_PLUGIN_URL',WP_CONTENT_URL.'/plugins');

add_filter('the_content', 'hellocoton_hook');
add_filter('the_excerpt', 'hellocoton_hook');

function hellocoton_html() {
	
	$articleUrl = urlencode(strip_tags(get_permalink()));
	
	$rand = rand(0,1000000);
	
	$wpurl = WP_PLUGIN_URL."/hellocoton/";

	$return = '<span id="hellocoton_'.$rand.'" style="display:block;width:147px;height:26px;position:relative;padding:0;border:10px 0px;margin:0;clear:both;">
	<a id="hellocoton_load_'.$rand.'" href="#" onclick="javascript:return false;"  style="display:block;width:120px;height:26px;position:absolute;top:0;left:0;padding:0;border:0;margin:0;"><img src="'.$wpurl.'action-on-h.gif" border="0" style="padding:0;border:0;margin:0;float:none;" /></a>
	<a id="hellocoton_vote_'.$rand.'" href="#" onclick="return false;"  style="display:none;width:120px;height:26px;position:absolute;top:0;left:0;padding:0;border:0;margin:0;"><img src="'.$wpurl.'action-on.gif" border="0" style="padding:0;border:0;margin:0;float:none;" onmouseover="javascript:this.src=\''.$wpurl.'action-on-h.gif\'" onmouseout="javascript:this.src=\''.$wpurl.'action-on.gif\'" /></a>
	<a id="hellocoton_unvote_'.$rand.'" href="#" onclick="javascript:return false;"  style="display:none;width:120px;height:26px;position:absolute;top:0;left:0;padding:0;border:0;margin:0;"><img src="'.$wpurl.'action-off.gif" border="0" style="padding:0;border:0;margin:0;float:none;" onmouseover="javascript:this.src=\''.$wpurl.'action-off-h.gif\'" onmouseout="javascript:this.src=\''.$wpurl.'action-off.gif\'" /></a>
	<a href="http://www.hellocoton.fr" target="_blank" style="display:block;width:27px;height:26px;position:absolute;top:0;left:120px;"><img src="'.$wpurl.'hellocoton.gif" border="0" alt="Rendez-vous sur Hellocoton !" style="padding:0;border:0;margin:0;float:none;" /></a></span>';
	
	return $return.'<script type="text/javascript">hellocoton_plugin_url="'.$wpurl.'"</script><script src="http://widget.hellocoton.fr/widget03.js?uniq='.$rand.'&url='.$articleUrl.'" type="text/javascript"></script>';
	
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