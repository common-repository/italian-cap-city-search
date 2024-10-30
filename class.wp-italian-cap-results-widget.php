<?php
/**
 * Author: Principe Orazio - http://www.ricevitoriaonline.it
 * Date: 25/08/2016
 * Time: 08:59
 *
 * Version: 1.0
 *
 * @package Wp_Italian_Cap_Search
 */
class Wp_Italian_Cap_Results_Widget extends WP_Widget {

	function __construct() {
		load_plugin_textdomain( 'wpics' );
		
		parent::__construct(
			'wpics_results_widget',
			__( 'WP Italian Cap Results Widget' , 'wpics'),
			array( 'description' => __( 'Allow to show search results by cap or vice versa' , 'wpics') )
		);

	}

	function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'];
			echo esc_html( $instance['title'] );
			echo $args['after_title'];
		}
		?>
		<div class="a-stats">
			<? require_once (WPICS__PLUGIN_DIR."views/widget_results.php"); ?>
		</div>
		<?php
		echo $args['after_widget'];
	}
}

function wpisc_results_register_widgets() {
	register_widget( 'Wp_Italian_Cap_Results_Widget' );
}

add_action( 'widgets_init', 'wpisc_results_register_widgets' );
