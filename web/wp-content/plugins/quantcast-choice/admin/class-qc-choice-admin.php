<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.quantcast.com
 * @since      1.0.0
 *
 * @package    QC_Choice
 * @subpackage QC_Choice/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    QC_Choice
 * @subpackage QC_Choice/admin
 * @author     Ryan Baron <rbaron@quantcast.com>
 */
class QC_Choice_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * A quantcast.com account Universal Tag ID (UTID/pCode).
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $version    Quantcast UTID/pCode.
	 */
	private $qc_choice_cmp_utid;

	/**
	 * Enable the Quantcast Chioce CMP
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $version    Enable the Choice TCF v2.0 CMP.
	 */
	private $qc_choice_cmp_enable;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->qc_choice_cmp_utid = esc_attr( get_option( 'qc_choice_cmp_utid' ) );
		$this->qc_choice_cmp_enable = esc_attr( get_option( 'qc_choice_cmp_enable' ) );

		add_action( 'admin_notices', array( $this, 'qc_choice_utid_missing_notice' ) );

	}

	/**
	 * Display a notice in the admin section the the Choice Plugin does not have a UTID.
	 *
	 * @since    2.0.0
	 */
	public function qc_choice_utid_missing_notice() {
		if( empty( $this->qc_choice_cmp_utid ) && empty( $this->qc_choice_cmp_enable ) ) {
			$class = 'notice notice-error';
			$message = __( 'The Quantcast Choice CMP is not setup is not complete.  You must <strong>enter your Universal Tag ID</strong> and <strong>enable the CMP</strong>.  You can find setup instructions on the', 'qc-choice' );
			$link_text = __( 'Choice settings page', 'qc-choice' );
			printf( '<div class="%1$s"><p>%2$s <a href="%3$s">%4$s</a></p></div>', esc_attr( $class ),  $message, esc_url( '/wp-admin/admin.php?page=qc-choice-options&tab=overview_screen' ), esc_html( $link_text ) );
		}
		elseif( ! empty( $this->qc_choice_cmp_utid ) && empty( $this->qc_choice_cmp_enable ) ) {
			$class = 'notice notice-warning';
			$message = __( 'The Quantcast Choice CMP must be <strong>enabled</strong> from the setting page before it is shown to site visitors.', 'qc-choice' );
			$link_text = __( 'View Choice CMP Settings', 'qc-choice' );
			printf( '<div class="%1$s"><p>%2$s <a href="%3$s">%4$s</a></p></div>', esc_attr( $class ), $message, esc_url( '/wp-admin/admin.php?page=qc-choice-options&tab=overview_screen' ), esc_html( $link_text ) );
		}
		elseif( empty( $this->qc_choice_cmp_utid ) ) {
			$class = 'notice notice-error';
			$message = __( 'The Quantcast Choice CMP is not setup is not complete.  You must <strong>enter your Universal Tag ID</strong>.  You can find setup instructions on the', 'qc-choice' );
			$link_text = __( 'Choice settings page', 'qc-choice' );
			printf( '<div class="%1$s"><p>%2$s <a href="%3$s">%4$s</a></p></div>', esc_attr( $class ), $message, esc_url( '/wp-admin/admin.php?page=qc-choice-options&tab=overview_screen' ), esc_html( $link_text ) );
		}
		else {
			// TCF v2 Enabled
		}
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/style.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		if( empty( $this->qc_choice_cmp_utid ) || empty( $this->qc_choice_cmp_enable ) ) {
			// TCF v1 Enabled (Scheduled deprecation of TCFv1 on August 16, 2020 by the IAB).
			wp_enqueue_script( 'qc-choice-ext', 'https://quantcast.mgr.consensu.org/cmp.js', array( ), $this->version, false );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/script.min.js', array( 'jquery', 'qc-choice-ext' ), $this->version, true );
		}
		else {
			// TCF v2 Enabled
		}
	}
}
