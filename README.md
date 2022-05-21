# Custom Elementor Widgets

- https://www.youtube.com/watch?v=Ko9i153o_iU (via theme)
	- https://github.com/alexander-young/custom-elementor-widget/
- https://www.youtube.com/watch?v=T4zPh1wbxrk (via theme)
	- https://develowp.com/build-a-custom-elementor-widget/
- https://www.benmarshall.me/create-an-elementor-widget/ (via plugin)
- https://github.com/elementor/elementor-hello-world (via plugin)

## Preliminaries

1. Install Elementor plugin
2. (Optional) Get Font Awesome 
	- https://fontawesome.com/v5/docs/web/use-with/wordpress/
	- https://alienwp.com/font-awesome-wordpress-guide/

## Via theme

1. In `functions.php` append `require_once('custom-elementor-widget-via-theme.php');`
2. Register the widget `custom-elementor-widget-via-theme.php`
3. Make the widget `widgets/custom-widget-theme.php`

## Via plugin

1. In `plugins/custom-elementor-widget-via-plugin/loader.php` register the widget `function register_widgets( $widgets_manager )`
2. Make the widget `plugins/custom-elementor-widget-via-plugin/widget/custom-widget-plugin.php`

## Widget rendering

- https://developers.elementor.com/docs/widgets/widget-rendering/
- https://developers.elementor.com/docs/widgets/widget-settings/
- https://github.com/elementor/elementor/issues/9208#issuecomment-753969073

## Hooks

- PHP https://developers.elementor.com/docs/hooks/php/
- JS https://developers.elementor.com/docs/hooks/js/
