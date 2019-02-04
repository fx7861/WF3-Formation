<?php 

include_once plugin_dir_path(__FILE__) . '/newsletterwidget.php';

class Newsletter
{
	public function __construct()
	{
		add_action('widgets_init', function(){register_widget('Newsletterwidget');});
		add_action('wp_loaded', array($this, 'save_email'));
		add_action('admin_menu', array($this, 'add_admin_menu'), 20);
		add_action('admin_init', array($this, 'register_settings'));
	}

	public static function install() {
		global $wpdb;

		$wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}newsletter_email (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL);");
	}

	public static function uninstall() {
		global $wpdb;

		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}newsletter_email;");
	}

	public function save_email() {
		if (isset($_POST['newsletter_email']) && !empty($_POST['newsletter_email'])) {
			global $wpdb;
			$email = $_POST['newsletter_email'];
			$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}newsletter_email WHERE email = '$email'");

			if (is_null($row)) {
				$wpdb->insert("{$wpdb->prefix}newsletter_email", array('email' => $email));
			}
		}
	}

	public function add_admin_menu() {
		$hook = add_submenu_page('plug', 'Newsletter', 'Newsletter', 'manage_options', 'newsletter', array($this, 'menu_html'));
		add_action('load-' . $hook, array($this, 'process_action'));
	}

	public function process_action() {
		if (isset($_POST['send_newsletter'])) {
			$this->send_newsletter();
		}
	}

	public function send_newsletter(){
		global $wpdb;
		$req = $wpdb->get_results("SELECT email FROM {$wpdb->prefix}newsletter_email");
		$object = get_option('newsletter_object', 'Newsletter');
		$content = get_option('newsletter_content', 'Message');
		$sender = get_option('newsletter_sender', 'no-reply@monsite.com');
		$header = array('From: ' . $sender);
		foreach ($req as $r) {
			$res = wp_mail($r->email,$object,$content,$header);
		}
	}

	public function menu_html() {
		?>
		<h1><?= get_admin_page_title(); ?></h1>
		<p>Bienvenue sur la page de configuration de la newsletter</p>
		<form action='options.php' method='post'>
		<?php settings_fields('newsletter_settings'); ?>

		<?php do_settings_sections('newsletter_settings') ?>

		<?php submit_button(); ?>
		</form>

		<form method="post">
			<input type="hidden" name="send_newsletter" value="1">
			<?php submit_button('Envoyer la newsletter'); ?>
		</form>
		<?php
	}

	public function register_settings() {
		register_setting('newsletter_settings', 'newsletter_sender');
		register_setting('newsletter_settings', 'newsletter_content');
		register_setting('newsletter_settings', 'newsletter_object');

		add_settings_section('newsletter_section', 'Paramètres', array($this, 'section_html'), 'newsletter_settings');

		$tabs = array(
			'sender' => 'Expéditeur',
			'object' => 'Objet',
			'content' => 'Contenu'
		);

		foreach ($tabs as $k => $v) {
			add_settings_field('newsletter_' . $k, $v, array($this, 'render_html'), 'newsletter_settings', 'newsletter_section', $k);
		}
	}

	public function section_html() {}

	public function render_html($key) {
		echo '<input type="text" class="regular-text" name="newsletter_' . $key . '" value="' . get_option('newsletter_' . $key) . '">';
	}
}

?>

