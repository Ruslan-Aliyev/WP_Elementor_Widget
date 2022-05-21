<?php
/**
 * Plugin Name: Custom Widget Plugin
 * Description: Custom Widget via Plugin
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Ruslan Aliyev
 * Author URI:  https://elementor.com/
 * Text Domain: custom-elementor-widget-via-plugin
 */

namespace WVP;

use WVP\CustomWidgets\CustomWidgetPlugin;

class Widget_Loader 
{
	private static $_instance = null;

	public static function instance() 
	{
		if ( is_null( self::$_instance ) ) 
		{
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct() 
	{
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
	}

	public function register_widgets( $widgets_manager ) 
	{
		require_once( __DIR__ . '/widgets/custom-widget-plugin.php' );

		$widgets_manager->register( new CustomWidgetPlugin() );
	}
}

Widget_Loader::instance();
