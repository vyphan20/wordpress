<?php
/*
Plugin Name: Easy Facebook Like Box
Plugin URI: http://activebizsolutions.com/
Description: Easy facebook like box display facebook like box. it enable Facebook Page owners to attract and gain Likes from their own website.
Version: 4.1.2
Author: shehryar  
Author URI: https://www.facebook.com/iamshehryar  
License: GPL2
*/

class easy_facebook_like_box extends WP_Widget {

  function __construct() {
    parent::__construct(
    // Base ID of your widget
      'easy_facebook_like_box',
      // Widget name will appear in UI
      esc_html__('Easy Facebook Like Box', 'easy-facebook-like-box')
    );
  }

  // widget form creation
  function form($instance) {

    // Check values
    $title = ( !empty($instance['title']) ) ? $instance['title'] : '';
    $text = ( !empty($instance['text']) ) ? $instance['text'] : '';
    $width = ( !empty($instance['width']) ) ? $instance['width'] : '';
    $height = ( !empty($instance['height']) ) ? $instance['height'] : '';
    $face = ( !empty($instance['face']) ) ? $instance['face'] : '';
    $hidecover = ( !empty($instance['hidecover']) ) ? $instance['hidecover'] : '';
    $hide_cta = ( !empty($instance['hide_cta']) ) ? $instance['hide_cta'] : '';
    $small_header = ( !empty($instance['small_header']) ) ? $instance['small_header'] : '';
    $acw = ( !empty($instance['acw']) ) ? $instance['acw'] : '';
    $tabs = ( !empty($instance['tabs']) ) ? $instance['tabs'] : '';
    $locale = ( !empty($instance['locale']) ) ? $instance['locale'] : '';

    $locales_data = array( 
      'af_ZA' => 'Afrikaans', 
      'ar_AR' => 'Arabic',
      'az_AZ' => 'Azeri', 
      'be_BY' => 'Belarusian', 
      'bg_BG' => 'Bulgarian', 
      'bn_IN' => 'Bengali', 
      'bs_BA' => 'Bosnian', 
      'ca_ES' => 'Catalan', 
      'cs_CZ' => 'Czech', 
      'cy_GB' => 'Welsh', 
      'da_DK' => 'Danish', 
      'de_DE' => 'German', 
      'el_GR' => 'Greek', 
      'en_US' => 'English (US)', 
      'en_GB' => 'English (UK)', 
      'eo_EO' => 'Esperanto', 
      'es_ES' => 'Spanish (Spain)', 
      'es_LA' => 'Spanish', 
      'et_EE' => 'Estonian', 
      'eu_ES' => 'Basque', 
      'fa_IR' => 'Persian', 
      'fb_LT' => 'Leet Speak', 
      'fi_FI' => 'Finnish', 
      'fo_FO' => 'Faroese', 
      'fr_FR' => 'French (France)', 
      'fr_CA' => 'French (Canada)', 
      'fy_NL' => 'NETHERLANDS (NL)', 
      'ga_IE' => 'Irish', 
      'gl_ES' => 'Galician', 
      'hi_IN' => 'Hindi', 
      'hr_HR' => 'Croatian', 
      'hu_HU' => 'Hungarian', 
      'hy_AM' => 'Armenian', 
      'id_ID' => 'Indonesian', 
      'is_IS' => 'Icelandic', 
      'it_IT' => 'Italian', 
      'ja_JP' => 'Japanese', 
      'ka_GE' => 'Georgian', 
      'km_KH' => 'Khmer', 
      'ko_KR' => 'Korean', 
      'ku_TR' => 'Kurdish', 
      'la_VA' => 'Latin', 
      'lt_LT' => 'Lithuanian', 
      'lv_LV' => 'Latvian', 
      'mk_MK' => 'Macedonian', 
      'ml_IN' => 'Malayalam', 
      'ms_MY' => 'Malay', 
      'nb_NO' => 'Norwegian (bokmal)', 
      'ne_NP' => 'Nepali', 
      'nl_NL' => 'Dutch', 
      'nn_NO' => 'Norwegian (nynorsk)', 
      'pa_IN' => 'Punjabi', 
      'pl_PL' => 'Polish', 
      'ps_AF' => 'Pashto', 
      'pt_PT' => 'Portuguese (Portugal)', 
      'pt_BR' => 'Portuguese (Brazil)', 
      'ro_RO' => 'Romanian', 
      'ru_RU' => 'Russian', 
      'sk_SK' => 'Slovak', 
      'sl_SI' => 'Slovenian', 
      'sq_AL' => 'Albanian', 
      'sr_RS' => 'Serbian', 
      'sv_SE' => 'Swedish', 
      'sw_KE' => 'Swahili', 
      'ta_IN' => 'Tamil', 
      'te_IN' => 'Telugu', 
      'th_TH' => 'Thai', 
      'tl_PH' => 'Filipino', 
      'tr_TR' => 'Turkish', 
      'uk_UA' => 'Ukrainian',
      'ur_PK' => 'Urdu',
      'vi_VN' => 'Vietnamese', 
      'zh_CN' => 'Simplified Chinese (China)', 
      'zh_HK' => 'Traditional Chinese (Hong Kong)', 
      'zh_TW' => 'Traditional Chinese (Taiwan)',
    );
?>

  <p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Widget Title', 'easy-facebook-like-box'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('text'); ?>"><?php esc_html_e('Facebook page url:', 'easy-facebook-like-box'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo esc_attr($text); ?>" placeholder="Ex: http://www.facebook.com/activebizsolution" />
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('tabs'); ?>"><?php esc_html_e('Tabs:', 'easy-facebook-like-box'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('tabs'); ?>" name="<?php echo $this->get_field_name('tabs'); ?>" type="text" value="<?php echo esc_attr($tabs); ?>" placeholder="Ex: timeline OR timeline,events,messages" />
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('width'); ?>"><?php esc_html_e('Width:', 'easy-facebook-like-box'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo esc_attr($width); ?>" placeholder="Ex: 300" />
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('height'); ?>"><?php esc_html_e('height:', 'easy-facebook-like-box'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo esc_attr($height); ?>" placeholder="Ex: 400" />
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('locale'); ?>"><?php esc_html_e('Locale:', 'easy-facebook-like-box'); ?></label>
    <select class="widefat" name="<?php echo $this->get_field_name('locale'); ?>">
      <option value=""><?php esc_html_e('Select..', 'easy-facebook-like-box'); ?></option>
      <?php foreach ($locales_data as $key => $value) : ?>
        <option <?php selected( $locale, $key , $echo = true); ?> value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
      <?php endforeach; ?>
    </select>
  </p>
  <p>
    <input id="<?php echo $this->get_field_id('face'); ?>" name="<?php echo $this->get_field_name('face'); ?>" type="checkbox" value="1" <?php checked( '1', $face ); ?> />
    <label for="<?php echo $this->get_field_id('face'); ?>"><?php esc_html_e('Show Friend\'s Faces', 'easy-facebook-like-box'); ?></label>
  </p>
  <p>
    <input id="<?php echo $this->get_field_id('hidecover'); ?>" name="<?php echo $this->get_field_name('hidecover'); ?>" type="checkbox" value="1" <?php checked( '1', $hidecover ); ?> />
    <label for="<?php echo $this->get_field_id('hidecover'); ?>"><?php esc_html_e('Hide Cover Photo', 'easy-facebook-like-box'); ?></label>
  </p>
  <p>
    <input id="<?php echo $this->get_field_id('hide_cta'); ?>" name="<?php echo $this->get_field_name('hide_cta'); ?>" type="checkbox" value="1" <?php checked( '1', $hide_cta ); ?> />
    <label for="<?php echo $this->get_field_id('hide_cta'); ?>"><?php esc_html_e('Call to action button (if available)', 'easy-facebook-like-box'); ?></label>
  </p>
  <p>
    <input id="<?php echo $this->get_field_id('small_header'); ?>" name="<?php echo $this->get_field_name('small_header'); ?>" type="checkbox" value="1" <?php checked( '1', $small_header ); ?> />
    <label for="<?php echo $this->get_field_id('small_header'); ?>"><?php esc_html_e('Use Small Header ', 'easy-facebook-like-box'); ?></label>
  </p>
  <p>
    <input id="<?php echo $this->get_field_id('acw'); ?>" name="<?php echo $this->get_field_name('acw'); ?>" type="checkbox" value="1" <?php checked( '1', $acw ); ?> />
    <label for="<?php echo $this->get_field_id('acw'); ?>"><?php esc_html_e('Adapt to plugin container width', 'easy-facebook-like-box'); ?></label>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('shortcode'); ?>"><?php esc_html_e('Shortcode:', 'easy-facebook-like-box'); ?></label>
    <?php
      $face = ( $face == 1 ) ? 'true' : 'false';
      $hidecover = ( $hidecover == 1 ) ? 'true' : 'false';
      $hide_cta = ( $hide_cta == 1 ) ? 'true' : 'false';
      $small_header = ( $small_header == 1 ) ? 'true' : 'false';
      $acw = ( $acw == 1 ) ? 'true' : 'false';
    ?>
    <textarea  rows="4" cols="50" class="widefat" id="<?php echo $this->get_field_id('shortcode'); ?>" name="<?php echo $this->get_field_name('shortcode'); ?>" readonly>
      <?php echo '[easy-fb-like-box url="'.esc_attr($text).'" width="'.esc_attr($width).'" height="'.esc_attr($height).'" faces="'.esc_attr($face).'" hidecover="'.esc_attr($hidecover).'" tabs="'.esc_attr($tabs).'" small_header="'.esc_attr($small_header).'"hide_cta="'.esc_attr($hide_cta).'" "acw="'.esc_attr($acw).'" locale="'.esc_attr($locale).'"]'; ?>
    </textarea>
  </p>

<?php
}// form


  // update widget
  function update($new_instance, $old_instance) {
    $instance = $old_instance;

    // Fields
    $instance['title'] = sanitize_text_field($new_instance['title']);
    $instance['text'] = sanitize_text_field($new_instance['text']);
    $instance['width'] = sanitize_text_field($new_instance['width']);
    $instance['height'] = sanitize_text_field($new_instance['height']);
    $instance['tabs'] = sanitize_text_field($new_instance['tabs']);
    $instance['face'] = sanitize_text_field($new_instance['face']);
    $instance['hidecover'] = sanitize_text_field($new_instance['hidecover']);
    $instance['hide_cta'] = sanitize_text_field($new_instance['hide_cta']);
    $instance['small_header'] = sanitize_text_field($new_instance['small_header']);
    $instance['acw'] = sanitize_text_field($new_instance['acw']);
    $instance['locale'] = sanitize_text_field($new_instance['locale']);
    

    return $instance;
  }

  // display widget
  function widget($args, $instance) {
    extract( $args );

    // these are the widget options
    $title = apply_filters('widget_title', $instance['title']);
    $text = $instance['text'];
    $width = $instance['width'];
    $height = $instance['height'];
    $tabs = $instance['tabs'];
    $face = $instance['face'];
    $hidecover = $instance['hidecover'];
    $hide_cta = $instance['hide_cta'];
    $small_header = $instance['small_header'];
    $acw = $instance['acw'];
    $locale = (!empty($instance['locale'])) ? $instance['locale'] : 'en_US';
    echo $before_widget;

    // Display the widget
    echo '<div class="widget-text easy-facebook-like-box_box">';

    // Check if title is set
    if ( $title ) {
      echo $before_title . $title . $after_title;
    }

    // Check if text is set
    if( $text ) {

      $face = ( $face == 1 ) ? 'true' : 'false';
      $hidecover = ( $hidecover == 1 ) ? 'true' : 'false';
      $hide_cta = ( $hide_cta == 1 ) ? 'true' : 'false';
      $small_header = ( $small_header == 1 ) ? 'true' : 'false';
      $acw = ( $acw == 1 ) ? 'true' : 'false';

      echo '<div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/'.$locale.'/sdk.js#xfbml=1&version=v2.10";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, "script", "facebook-jssdk"));</script>'.'<div class="fb-page" data-href="'.esc_url($text).'" data-width="'.esc_attr($width).'" data-height="'.esc_attr($height).'" data-hide-cover="'.esc_attr($hidecover).'" data-tabs="'.esc_attr($tabs).'" data-small-header="'.esc_attr($small_header).'" data-hide-cta="'.esc_attr($hide_cta).'" data-adapt-container-width="'.esc_attr($acw).'" data-show-facepile="'.esc_attr($face).'"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>';
    } //text

    echo '</div>';
    echo $after_widget;
  }
}


// register widget
function easy_facebook_like_box_register_widget() {
  if(class_exists ('easy_facebook_like_box')) :
      register_widget( 'easy_facebook_like_box' );
  endif;
}
add_action( 'widgets_init', 'easy_facebook_like_box_register_widget' );


function easy_facebook_like_box_shortcode_function($atts){

   extract(shortcode_atts(array(
    'url' => 'www.facebook.com/FacebookDevelopers',
    'width' => '',
    'height' => '',
    'faces' => 'true',
    'hidecover' => 'false',
    'tabs' => 'timeline',
    'small_header' => 'false',
    'hide_cta' => 'false',
    'acw' => 'false',
    'locale' => 'en_US',
   ), $atts));

   $return_string = '<div class="easy-facebook-like-box">';

   $return_string .= '<div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/'.$locale.'/sdk.js#xfbml=1&version=v2.10";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, "script", "facebook-jssdk"));</script>';
    
    $return_string .= '<div class="fb-page" data-href="'.esc_url($url).'" data-width="'.esc_attr($width).'" data-height="'.esc_attr($height).'" data-hide-cover="'.esc_attr($hidecover).'" data-tabs="'.esc_attr($tabs).'" data-small-header="'.esc_attr($small_header).'" data-hide-cta="'.esc_attr($hide_cta).'" data-adapt-container-width="'.esc_attr($acw).'" data-show-facepile="'.esc_attr($faces).'"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>';

    $return_string .= '</div>';

    return $return_string;
}

function easy_facebook_like_box_register_shortcode(){
  add_shortcode('easy-fb-like-box', 'easy_facebook_like_box_shortcode_function');
}
add_action( 'init', 'easy_facebook_like_box_register_shortcode');
?>