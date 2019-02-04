<?php 

class Newsletterwidget extends WP_Widget
{
	
	public function __construct()
	{
		parent::__construct( 'my_newsletter', 'Newsletter', array('description' => 'Ceci est un formulaire pour la newsletter'));
	}

	public function widget($args, $instance) {
		echo $args['before_widget'];
		echo $args['before_title'];
		echo apply_filters('widget_title', $instance['title']);
		echo $args['after_title'];

		$html = '<form method="post">';
		$html .= '<label for="newsletter_email"></label>';
		$html .= '<input type="email" name="newsletter_email" id="newsletter_email">';
		$html .= '<input type="submit">';
		$html .= '</form>';
		echo $html;

		echo $args['after_widget'];
	}

	public function form($instance) {

		$title = isset($instance['title']) ? $instance['title'] : "";

		$html = '<p>';
		$html .= '<label for="' . $this->get_field_name('title') . '">' . __('Title:') . '</label>';
		$html .= '<input type="text" class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" value="' . $title . '">';
		$html .= '</p>';
		
		echo $html;
	}

}


?>


	
	
	


