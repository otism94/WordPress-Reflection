<?php
/**
 * Main class to interace with the different Content Editors: CPSP_PAGEBUILDERS class
 *
 */
if(!class_exists('CPSP_PAGEBUILDERS'))
{
	class CPSP_PAGEBUILDERS
	{
		private static $_instance;

		private function __construct(){}
		private static function instance()
		{
			if(!isset(self::$_instance)) self::$_instance = new self();
			return self::$_instance;
		} // End instance

		public static function run()
		{
			$instance = self::instance();
			add_action('init', array($instance, 'init'));
			add_action('after_setup_theme', array($instance, 'after_setup_theme'));
			if(function_exists('register_block_type'))
				register_block_type(
					'searchinplace/sip',
					array(
						'render_callback' => array($instance, 'render_gutenberg_block'),
						'attributes' => array(
							'search_in_page' => array(
								'default' => 0,
								'type' => 'integer'
							),
							'no_popup' => array(
								'default' => 0,
								'type' => 'integer'
							),
							'exclude_hidden' => array(
								'default' => 0,
								'type' => 'integer'
							),
							'display_button' => array(
								'default' => 0,
								'type' => 'integer'
							)
						)
					)
				);
		}

		public static function init()
		{
			$instance = self::instance();

			// Gutenberg
			add_action( 'enqueue_block_editor_assets', array($instance,'gutenberg_editor' ) );

			// Elementor
			add_action( 'elementor/widgets/widgets_registered', array($instance, 'elementor_editor') );
			add_action( 'elementor/elements/categories_registered', array($instance, 'elementor_editor_category') );
		}

		public function after_setup_theme()
		{
			$instance = self::instance();

			// SiteOrigin
			add_filter('siteorigin_widgets_widget_folders', array($instance, 'siteorigin_widgets_collection'));
			add_filter('siteorigin_panels_widget_dialog_tabs', array($instance, 'siteorigin_panels_widget_dialog_tabs'));
		} // End after_setup_theme

		/**************************** GUTENBERG ****************************/

		/**
		 * Loads the javascript resources to integrate the plugin with the Gutenberg editor
		 */
		public function gutenberg_editor()
		{
			wp_enqueue_script('search-in-place-gutenberg-editor', plugin_dir_url(__FILE__).'gutenberg/gutenberg.js', array( 'wp-blocks', 'wp-element' ), SEARCH_IN_PLACE_VERSION);
		} // End gutenberg_editor

		public function render_gutenberg_block($attributes)
		{
			$shortcode  = '[search-in-place-form';
			if(@intval($attributes['search_in_page'])) $shortcode .= ' in_current_page="1"';
			if(@intval($attributes['no_popup'])) $shortcode .= ' no_popup="1"';
			if(@intval($attributes['exclude_hidden'])) $shortcode .= ' exclude_hidden_terms="1"';
			if(@intval($attributes['display_button'])) $shortcode .= ' display_button="1"';
			$shortcode .= ']';
			return do_shortcode($shortcode);
		} // End render_gutenberg_block
		/**************************** ELEMENTOR ****************************/

		public function elementor_editor_category()
		{
			require_once dirname(__FILE__).'/elementor/elementor_category.pb.php';
		} // End elementor_editor

		public function elementor_editor()
		{
			require_once dirname(__FILE__).'/elementor/elementor.pb.php';
		} // End elementor_editor

		/**************************** SITEORIGIN ****************************/

		public function siteorigin_widgets_collection($folders)
		{
			$folders[] = dirname(__FILE__).'/siteorigin/';
			return $folders;
		} // End siteorigin_widgets_collection

		public function siteorigin_panels_widget_dialog_tabs($tabs)
		{
			$tabs[] = array(
				'title' => __('Search in Place', 'search-in-place'),
				'filter' => array(
					'groups' => array('search-in-place')
				)
			);

			return $tabs;
		} // End siteorigin_panels_widget_dialog_tabs
	} // End CPSP_PAGEBUILDERS
}