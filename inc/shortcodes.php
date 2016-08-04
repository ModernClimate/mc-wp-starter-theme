<?php

if( ! class_exists('AdShortcode') ) :

class AdShortcodes {

  public function __construct () {
    add_shortcode('button',   array($this, 'button'));
    add_shortcode('tooltip',  array($this, 'tooltip'));
  }

  // bootstrap button
  // http://getbootstrap.com/css/#buttons
  public function button($atts, $content = NULL) {
    $classes = 'btn';
    $classes .= (isset($atts['style'])) ? ' '. $atts['style'] : ' btn-default';
    $classes .= (isset($atts['block']) and $atts['block'] == true) ? ' btn-block': '';
    $classes .= (isset($atts['size'])) ? ' ' . $atts['size']: '';
    $link = (isset($atts['link'])) ? $atts['link'] : '#';
    $target = (isset($atts['target']) and $atts['target'] == 'blank') ? '_blank' : NULL;
    return "<a class=\"{$classes}\" href=\"{$link}\" target=\"{$target}\">{$content}</a>";
  }

  // bootstrap tooltip
  // http://getbootstrap.com/javascript/#tooltips
  public function tooltip($atts, $content = NULL) {
    $text = (isset($atts['text'])) ? $atts['text'] : 'NO TEXT ENTERED';
    $placement = (isset($atts['placement'])) ? $atts['placement'] : 'top';
    return "<span data-toggle=\"tooltip\" data-placement=\"{$placement}\" title=\"{$text}\">" . do_shortcode($content) . "</span>";
  }

}

new AdShortcodes();

endif;
