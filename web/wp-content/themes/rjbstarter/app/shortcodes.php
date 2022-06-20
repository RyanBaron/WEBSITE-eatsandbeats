<?php

namespace App;

use App\Controllers\App;

/**
 * Return if Shortcodes already exists.
 */
if (class_exists('Shortcodes')) {
    return;
}

/**
 * Shortcodes
 */
class Shortcodes
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $shortcodes = [
            'box',
            'date',
            'month',
            'day',
            'year',
            'add_sidebar',
            'sidebar_nav',
            'service_sidebar_left',
            'guide_cta',
            'sidebar_cta',
            'sidebar_image',
            'sidebar_questions_cta',
            'sidebar_social'
        ];

        return collect($shortcodes)
            ->map(function ($shortcode) {
                return add_shortcode($shortcode, [$this, strtr($shortcode, ['-' => '_'])]);
            });
    }

    /**
     * Box
     * Wraps content in a box.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function box($atts, $content = null)
    {
        return '<div class="box">' . do_shortcode($content) . '</div>';
    }

    /**
     * Date
     * Returns the current date.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function date($atts, $content = null)
    {
        return date('F d, Y');
    }

    /**
     * Month
     * Returns the current month.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function month($atts, $content = null)
    {
        return date('F');
    }

    /**
    * Day
    * Returns the current day.
    *
    * @param  array  $atts
    * @param  string $content
    * @return string
    */
    public function day($atts, $content = null)
    {
        return date('d');
    }

    /**
     * Year
     * Returns the current year.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function year($atts, $content = null)
    {
        return date('Y');
    }

    /**
     * Year
     * Returns the current year.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function sidebar_nav($atts, $content = null) {
      $html = '';
      extract(shortcode_atts(array( 'menu' => null, 'menu_title' => null, 'class' => null ), $atts));

      if( is_nav_menu( $menu ) ) :
        if( $menu_title ) :
          $html .= '<div class="sidebar-block sidebar-block-nav"><div class="header">' . $menu_title . '</div></div>';
        endif;

        $html .= wp_nav_menu( array( 'menu' => $menu, 'menu_class' => 'sidebar-nav', 'echo' => false ) );

        $html = '<div class="sidebar-widget">' . $html . '</div>';

      endif;
      return $html;
    }
    /**
     * Year
     * Returns the current year.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function service_sidebar_left($atts, $content = null) {
      $html = '';
      extract(shortcode_atts(array( 'menu' => null, 'menu_title' => null, 'class' => null ), $atts));

      if( is_nav_menu( $menu ) ) :
        if( $menu_title ) :
          $html .= '<div class="sidebar-block sidebar-block-nav"><div class="header">' . $menu_title . '</div></div>';
        endif;

        $html .= wp_nav_menu( array( 'menu' => $menu, 'menu_class' => 'sidebar-nav', 'echo' => false ) );

        $html = '<div class="sidebar-widget">' . $html . '</div>';

      endif;
      return $html;
    }

    /**
     * Year
     * Returns the current year.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function add_sidebar($atts, $content = null) {
      $html = '';
      extract(shortcode_atts(array( 'sidebar_id' => null, 'class' => null ), $atts));

      ob_start();
      if( $sidebar_id ) :
        if ( is_active_sidebar( $sidebar_id ) ) : ?>
          <ul id="sidebar">
            <?php dynamic_sidebar( $sidebar_id ); ?>
          </ul>
        <?php endif;
      endif;

      $html = ob_get_contents();
      ob_end_clean();

      return $html;
    }

    /**
     * Year
     * Returns the current year.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function sidebar_cta($atts, $content = null) {


      //print_r($atts);
      /*
      $html = '';
      //extract(shortcode_atts(array( 'image_id' => null, 'superheadline' => null, 'headline' => null, 'text' => null, 'button_text' => null, 'button_url' => null, 'class' => null ), $atts));
      extract(shortcode_atts(array( 'image_id' => null, 'class' => null ), $atts));

      if ( $image_id ) :
        //$image = \App\post_image( $image_id );
      endif;

      return print_r($atts);

      return '<br><br>bbb: ' . $image_id ;
      */



      $html = '';
      extract(shortcode_atts(array( 'image_id' => null, 'superheadline' => null, 'headline' => null, 'text' => null, 'button_text' => null, 'button_url' => null, 'class' => null ), $atts));

      ob_start();

      echo '<div class="sidebar-item p-3 p-md-4 bg-lighter mb-3 hl-xs">';

      if ( $image_id ) :
        $image_html = \App\get_image( $image_id );

        //$post_image = \App\post_image('', 'landscape_sm', array('class' => 'rounded'));

        echo '<figure class="py-1 pb-2 pb-lg-3">';
        echo $image_html;
        echo '</figure>';
        //$html = $image_html;
      endif;

      if ( $superheadline || $headline ) :
        if ( $superheadline ) :
          echo '<h5 class="headline headline-sidebar">
            <span class="superheadline">' . $superheadline . '</span>' .
              $headline . '
            </h5>
            ';
        endif;
      endif;

      if ( $text ) :
        echo '<div class="text-wrapper text-sidebar">
          <p class="text">' . $text . '</p>
        </div>';
      endif;

      if ( $button_text && $button_url ) :
        echo '<div class="button-footer button-footer-sidebar pt-2 w-100">
               <a class="btn btn-secondary w-100" href="'.$button_url.'">'.$button_text.'</a>
             </div>';
      endif;

      echo '</div>';


      $html = ob_get_contents();
      ob_end_clean();

      return $html;

      //return $image_id;

      /*
      ob_start();
        //if ( $image_id ) :
        //  $image = \App\post_image( $image_id );
        //endif;

        if ( $superheadline || $headline ) :
          if ( $superheadline ) :
            echo '<h4 class="headline headline-sidebar">
              <span class="superheadline">' . $superheadline . '</span>' .
                $headline . '
              </h4>
              ';
          endif;
        endif;

      $html = ob_get_contents();
      ob_end_clean();
      */
      //return $html;
    }

    /**
     * Sidebar Image
     * Returns an image for sidebar dispaly.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function sidebar_image($atts, $content = null) {

      $html = '';
      $headline = isset($headline) ? $headline : '';
      $superheadline = isset($superheadline) ? $superheadline : '';
      extract(shortcode_atts(array( 'image_id' => null, 'image_size' => 'full', 'class' => null ), $atts));
      $image_size = isset( $image_size ) && ! empty( $image_size ) ? esc_attr( $image_size ) : 'full';

      ob_start();

      if ( $image_id ) :
        $image_html = \App\get_image( $image_id, $image_size );
        echo '<figure class="figure figure-sidebar w-100 bg-offset-fade-primary bg-offset-fade-rounded">';
        echo $image_html;
        echo '<figure>';
      endif;

      if ( $superheadline || $headline ) :
        if ( $superheadline ) :
          echo '<h5 class="headline headline-sidebar">
            <span class="superheadline">' . $superheadline . '</span>' .
              $headline . '
            </h5>
            ';
        endif;
      endif;


      $html = ob_get_contents();
      ob_end_clean();

      return $html;
    }


    /**
     * Sidebar Questions CTA
     * Returns html for a sidebar CTA.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function sidebar_questions_cta($atts, $content = null) {

      $html = '';
      extract(shortcode_atts(array( 'headline' => null, 'text' => null, 'button_text' => null, 'button_url' => null, 'class' => null ), $atts));


      if ( $headline || $text ) :
        ob_start();

        echo '<div class="sidebar-item p-3 p-md-4 bg-lighter mb-3">';

        if ( $headline ) :
          echo '<h5 class="headline headline-sidebar">'
                 . $headline .
               '</h5>';
        endif;

        if ( $text ) :
          echo '<div class="copy copy-sidebar">'
                 . $text .
               '</div>';
        endif;

        if ( $button_text && $button_url ) :
          echo '<div class="button-footer button-footer-sidebar pt-2 w-100">
                 <a class="btn btn-primary w-100" href="'.$button_url.'">'.$button_text.'</a>
               </div>';
        endif;

        echo "</div>";

        $html = ob_get_contents();
        ob_end_clean();
      endif;

      return $html;
    }

    /**
     * Sidebar Follow/Social
     * Returns html for a sidebar social.
     *
     * @param  array  $atts
     * @param  string $content
     * @return string
     */
    public function sidebar_social($atts, $content = null) {

      $html = '';
      extract(shortcode_atts(array( 'headline' => null, 'linkedin_url' => null, 'twitter_url' => null, 'facebook_url' => null, 'class' => null ), $atts));


      if ( $headline || $linkedin_url ) :
        ob_start();

        echo '<div class="sidebar-item p-3 p-md-4 mb-3">';

        if ( $headline ) :
          echo '<h5 class="headline headline-sidebar">'
                 . $headline .
               '</h5>';
        endif;

        if ( $linkedin_url || $twitter_url || $facebook_url ) :
          echo '<div class="social-links social-links-sidebar">';
          if ( $linkedin_url ) :
            echo '<div class="social-link">';
            echo '<a href="'.$linkedin_url.'" target="_blank"><span class="sr-only">LinkedIn</span><i class="fab fa-linkedin fa-2x"></i></a>';
            echo '</div>';
          endif;

          if ( $twitter_url ) :
            echo '<div class="social-link">';
            echo '<a href="'.$twitter_url.'" target="_blank"><span class="sr-only">Twitter</span><i class="fab fa-twitter fa-2x"></i></a>';
            echo '</div>';
          endif;

          if ( $facebook_url ) :
            echo '<div class="social-link">';
            echo '<a href="'.$twitter_url.'" target="_blank"><span class="sr-only">Facebook</span><i class="fab fa-facebook fa-2x"></i></a>';
            echo '</div>';
          endif;
          echo "</div>";
        endif;
        echo "</div>";

        $html = ob_get_contents();
        ob_end_clean();
      endif;

      return $html;
    }
}

new Shortcodes();
