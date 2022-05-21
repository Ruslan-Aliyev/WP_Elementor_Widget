<?php

namespace WVP\CustomWidgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class CustomWidgetPlugin extends Widget_Base
{
  // public function __construct( $data = array(), $args = null )
  // {
  // 	parent::__construct( $data, $args );
  //   add_action('admin_enqueue_scripts', [$this, 'load_custom_wp_admin_style']);
  // }

  // function load_custom_wp_admin_style()
  // {
  //   wp_register_style( 'custom-widget-plugin', __DIR__ . '../styles/styles.css' );
  //   wp_enqueue_style( 'custom-widget-plugin' );
  // }
	
  public function get_name()
  {
    return 'custom-widget-plugin';
  }

  public function get_title()
  {
    return 'Custom Widget Plugin'; // Human readable
  }

  public function get_icon()
  {
    return 'eicon-elementor-circle'; // https://elementor.github.io/elementor-icons/
  }

  public function get_categories()
  {
    return ['general']; // Elementor widget category
  }

  protected function _register_controls()
  {
    $this->start_controls_section(
      'section_content',
      [
        'label' => 'Settings',
      ]
    );

    // https://developers.elementor.com/docs/controls/data-controls/
    $this->add_control(
      'label_heading',
      [
        'label' => 'Label Heading',
        'type' => Controls_Manager::TEXT,
        'default' => 'Label Custom Heading'
      ]
    );

    $this->add_control(
      'content_heading',
      [
        'label' => 'Content Heading',
        'type' => Controls_Manager::TEXT,
        'default' => 'Content Custom Heading'
      ]
    );

    $this->add_control(
      'content',
      [
        'label' => 'Content',
        'type' => Controls_Manager::WYSIWYG,
        'default' => 'Content...'
      ]
    );

    $this->end_controls_section();
  }
  
  // https://github.com/elementor/elementor/issues/9208#issuecomment-753969073
  protected function render()
  {
    $settings = $this->get_settings_for_display();

    $this->add_inline_editing_attributes('label_heading', 'basic');

    $this->add_render_attribute(
      'label_heading',
      [
        'class' => ['custom-widget-plugin__label-heading'],
      ]
    );

    ?>
      <div class="custom-widget-plugin">
        <div <?php echo $this->get_render_attribute_string('label_heading'); ?>>
          <?php echo $settings['label_heading']?>
        </div>
        <div class="custom-widget-plugin__content">
          <div class="custom-widget-plugin__content__heading" <?php echo $this->get_render_attribute_string('content_heading'); ?>>
            <?php echo $settings['content_heading'] ?>
          </div>
          <div class="custom-widget-plugin__content__copy" <?php echo $this->get_render_attribute_string('content'); ?>>
            <?php echo $settings['content'] ?>
          </div>
        </div>
      </div>
    <?php
  }

  protected function _content_template()
  {
    ?>
      <#
        view.addInlineEditingAttributes( 'label_heading', 'basic' );

        view.addRenderAttribute(
          'label_heading',
          {
            'class': [ 'custom-widget-plugin__label-heading' ],
          }
        );
      #>
      <div class="custom-widget-plugin">
        <div {{{ view.getRenderAttributeString( 'label_heading' ) }}}>{{{ settings.label_heading }}}</div>
        <div class="custom-widget-plugin__content">
          <div class="custom-widget-plugin__content__heading">{{{ settings.content_heading }}}</div>
          <div class="custom-widget-plugin__content__copy"> {{{ settings.content }}} </div>
        </div>
      </div>
    <?php
  }
}
