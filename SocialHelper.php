<?php
class SocialHelper extends AppHelper {
	
	// TODO
	function facebook($url = "", $options = array()) {
		
	}
	
	/**
	 * Add the Twitter button
	 * @param href String with the url to socialize (if is empty "" use the current page)
	 * @param options Array of options:
	 * - counter = true|false (true by default)
	 * - big_button = true|false (false by default)
	 * - title = Title of page
	 * - lang = ['es', 'pt-PT', ...]
	 * For more information go to http://twitter.com/about/resources/buttons#tweet
	 */
	function twitter($href = "", $options = array()) {
		$output = '';
		
		$counter = ''; if (array_key_exists('counter', $options) && $options['counter'] == false) $counter = ' data-count="none"';
		$big_button = ''; if (array_key_exists('big_button', $options) && $options['big_button'] == true) $big_button = ' data-size="large"';
		$title = ''; if (array_key_exists('title', $options)) $title = ' data-text="'.$options['title'].'"';
		$lang = ''; if (array_key_exists('lang', $options)) $lang = ' data-lang="'.$options['lang'].'"';
		if ($href != '') $href = ' data-url="'.$href.'"';
		
		$output .= '<a href="https://twitter.com/share" class="twitter-share-button"'.$href.$title.$lang.$big_button.$counter.'>Tweet</a>';
		$output .= '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
		
		return $this->output($output);
	}
	
	// TODO
	function delicius() {
		
	}
	
	/**
	 * Add the Tuenti button
	 * @param href String with the url to socialize (if is empty "" use the current page)
	 * @param options Array of options:
	 * - icon_type = ['light', 'small'] (Dark by default)
	 * - text = Text to show in the publication
	 * For more information go to http://www.tuenti.com/desarrolladores/
	 */
	function tuenti($href = "", $options = array()) {
		$output = '';
		
		$text = ''; if (array_key_exists('text', $options)) $text = ' suggested-text="'.$options['text'].'"';
		$icon_type = ''; if (array_key_exists('icon_type', $options)) $icon_type = ' icon-style="'.$options['icon_type'].'"';
		if ($href != '') $href = ' share-url="'.$href.'"';
		
		$output = '<script type="text/javascript" src="http://widgets.tuenti.com/widgets.js"></script>';
		$output .= '<a href="http://www.tuenti.com/share" class="tuenti-share-button"'.$icon_type.$href.$text.'></a>';
		
		return $this->output($output);
	}
	
	/**
	 * Add the google Plus button
	 * @param href String with the url to socialize (if is empty "" use the current page)
	 * @param options Array of options:
	 * - size = ['small', 'medium', 'tall']
	 * - annotation = ['inline', 'none']
	 * - lang = ['es', 'pt-PT', ...]
	 * - name = Name of the content
	 * - description = A descriptive text about the content
	 * - image = Url of the image for the content
	 * For more information go to http://www.google.com/intl/es/webmasters/+1/button/index.html
	 */
	function googlePlus($href = "", $options = array()) {
		$output = ''; $script = '';
		
		$size = ''; if (array_key_exists('size', $options)) $size = ' size="'.$options['size'].'"';
		$annotation = ''; if (array_key_exists('annotation', $options)) $annotation = ' annotation="'.$options['annotation'].'"';
		if ($href != '') $href = ' href="'.$href.'"';
		
		$name = ''; if (array_key_exists('name', $options)) $name = $options['name'];
		$description = ''; if (array_key_exists('description', $options)) $description = $options['description'];
		$image = ''; if (array_key_exists('image', $options)) $image = $options['image'];
		$lang = ''; if (array_key_exists('lang', $options)) $lang = $options['lang'];
		
		$output .= '<g:plusone'.$size.$annotation.$href.'></g:plusone>';
		if ($name != '') $output .= '<span itemprop="name">'.$name.'</span>';
		if ($description != '') $output .= '<span itemprop="name">'.$description.'</span>';
		if ($image != '') $output .= '<img itemprop="image" src="'.$image.'>';
		
		if ($lang != '') $script .= "window.___gcfg = {lang: '".$lang."'};";
		$script .= "
			(function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			})();
		";
		$output .= $this->Html->scriptBlock($script, array('inline' => true));
		return $this->output($output);
	}
}
?>