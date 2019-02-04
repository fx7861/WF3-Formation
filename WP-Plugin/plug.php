<?php 
/*
Plugin Name: My-plugin
Plugin URI: https://mon-siteweb.com/
Description: Ceci est mon premier plugin
Version: 1.0
Author: FX
Author URI: http://mon-siteweb.com/
*/

class Myplugin
{
	
	public function __construct()
	{
		include_once plugin_dir_path(__FILE__).'/pagetitle.php';
		new PageTitle();

		include_once plugin_dir_path(__FILE__).'/newsletter.php';
		new Newsletter();

		register_activation_hook(__FILE__, array('Newsletter', 'install'));
		register_uninstall_hook(__FILE__, array('Newsletter', 'uninstall'));
		add_action('admin_menu', array($this, 'add_amin_menu'));
	}

	public function add_amin_menu() {
		add_menu_page('Mon plugin', 'Mon plugin', 'manage_options', 'plug', array($this, 'menu_html'));
		add_submenu_page('plug', 'Réglages généraux', 'Général', 'manage_options', 'plug', array($this, 'menu_html'));
	}

	public function menu_html() {
		$html = "<h1>" . get_admin_page_title() . "</h1>";
		$html .= "<p>Bienvenue sur la page d'accueil du plugin</p>";

		echo $html;
	}

}

new Myplugin();

?>
