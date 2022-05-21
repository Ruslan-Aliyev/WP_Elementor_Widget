<?php
namespace WVT;

use Elementor\Plugin;
use WVT\CustomWidgets\CustomWidgetTheme;

class Widget_Loader
{
	private static $_instance = null;

	public static function instance()
	{
		if (is_null(self::$_instance)) 
		{
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct()
	{
		add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets'], 99);
	}

	public function register_widgets()
	{
		$this->include_widgets_files();

		Plugin::instance()->widgets_manager->register_widget_type(new CustomWidgetTheme());
	}

	private function include_widgets_files()
	{
		require_once(__DIR__ . '/widgets/custom-widget-theme.php');
	}
}

Widget_Loader::instance();
