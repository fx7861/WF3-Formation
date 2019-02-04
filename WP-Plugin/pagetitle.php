<?php 

class PageTitle
{
	function __construct()
	{
		add_filter('the_title', array($this, 'myplugin_modify_page_title'), 20);
	}

	public function myplugin_modify_page_title($title) {
		return $title . ' | Mon titre fonctionne avec My-plugin';
	}
}



?>