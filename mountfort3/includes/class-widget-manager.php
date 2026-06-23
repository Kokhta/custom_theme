<?php
namespace Mountfort3;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Widget_Manager {

	public function __construct() {
		add_action( 'elementor/elements/categories_registered', array( $this, 'register_categories' ) );
		add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
	}

	public function register_categories( $elements_manager ) {
		$elements_manager->add_category(
			'mountfort',
			array(
				'title' => 'Mountfort',
				'icon'  => 'fa fa-plug',
			)
		);
	}

	public function register_widgets( $widgets_manager ) {
		$widgets = array(
			'1-cursor'            => 'Cursor_Widget',
			'2-header'            => 'Header_Widget',
			'3-menu'              => 'Menu_Widget',
			'4-canvas-wrapper'    => 'Canvas_Wrapper_Widget',
			'5-sound-buttons'     => 'Sound_Buttons_Widget',
			'6-hero-transition'   => 'Hero_Transition_Widget',
			'7-hero'              => 'Hero_Widget',
			'8-who-we-are'        => 'Who_We_Are_Widget',
			'9-what-we-do'        => 'What_We_Do_Widget',
			'10-global-connectivity' => 'Global_Connectivity_Widget',
			'11-sustainability'   => 'Sustainability_Widget',
			'12-solutions'        => 'Solutions_Widget',
			'13-equality'         => 'Equality_Widget',
			'14-social'           => 'Social_Widget',
			'15-chapters-navigation' => 'Chapters_Navigation_Widget',
			'16-footer'           => 'Footer_Widget',
		);

		foreach ( $widgets as $file => $class ) {
			require_once MOUNTFORT3_PATH . 'widgets/' . $file . '.php';
			$class_name = '\Mountfort3\Widgets\\' . $class;
			$widgets_manager->register( new $class_name() );
		}
	}
}
