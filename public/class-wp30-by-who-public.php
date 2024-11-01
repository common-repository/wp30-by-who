<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.terrytsang.com
 * @since      1.0.0
 *
 * @package    WP30_By_Who
 * @subpackage WP30_By_Who/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    WP30_By_Who
 * @subpackage WP30_By_Who/public
 * @author     Terry Tsang <terry@terrytsang.com>
 */
class WP30_By_Who_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $wp30_by_who    The ID of this plugin.
	 */
	private $wp30_by_who;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $wp30_by_who       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wp30_by_who, $version ) {

		$this->wp30_by_who = $wp30_by_who;
		$this->version = $version;
	}

	public function wp30_public_display() {
		$options = get_option( 'wp30_by_who_input_settings' );

		$input_text 		= $options['input_text'];
		$url_link 			= $options['url_link'];
		$email 				= trim($options['email']);
		$position 			= $options['position'];


		$options_social 	= get_option( 'wp30_by_who_social_options' );

		$instagram 			= $options_social['instagram'];
		$facebook 			= $options_social['facebook'];
		$twitter 			= $options_social['twitter'];
		$googleplus 		= $options_social['googleplus'];
		$linkedin 			= $options_social['linkedin'];
		$behance 			= $options_social['behance'];
		$dribbble 			= $options_social['dribbble'];

		$icon_gravatar   	= get_avatar($email, 18);

		$icon_facebook = plugin_dir_url( __FILE__ ) . 'images/social/facebook.png';
		$icon_instagram = plugin_dir_url( __FILE__ ) . 'images/social/instagram.png';
		$icon_twitter = plugin_dir_url( __FILE__ ) . 'images/social/twitter.png';
		$icon_googleplus = plugin_dir_url( __FILE__ ) . 'images/social/googleplus.png';
		$icon_linkedin = plugin_dir_url( __FILE__ ) . 'images/social/linkedin.png';
		$icon_behance = plugin_dir_url( __FILE__ ) . 'images/social/behance.png';
		$icon_dribbble = plugin_dir_url( __FILE__ ) . 'images/social/dribbble.png';

		$label_facebook = '<img src="'.$icon_facebook.'" alt="Instagram" title="Instagram" />';
		$label_instagram = '<img src="'.$icon_instagram.'" alt="Instagram" title="Instagram" />';
		$label_twitter = '<img src="'.$icon_twitter.'" alt="Twitter" title="Twitter" />';
		$label_googleplus = '<img src="'.$icon_googleplus.'" alt="Google+" title="Google+" />';
		$label_linkedin = '<img src="'.$icon_linkedin.'" alt="Linkedin" title="Linkedin" />';
		$label_behance = '<img src="'.$icon_behance.'" alt="Behance" title="Behance" />';
		$label_dribbble = '<img src="'.$icon_dribbble.'" alt="Dribbble" title="Dribbble" />';


		if($position == 1)
    		echo '<div id="wp30-bywho-left">&nbsp;&nbsp;<a href="'.$url_link.'#" target="_blank" style="color:white"> '.$input_text.'</a> &nbsp;&nbsp;';
    	else
    		echo '<div id="wp30-bywho">&nbsp;&nbsp;<a href="'.$url_link.'#" target="_blank" style="color:white"> '.$input_text.'</a> &nbsp;';

    	if($email)
	 		echo '<a href="mailto:'.$email.'" target="_blank"> '.$icon_gravatar.'</a>&nbsp;&nbsp;&nbsp;&nbsp;';

    		if($facebook)
	    		echo '<a href="'.$facebook.'" target="_blank"> '.$label_facebook.'</a>&nbsp;&nbsp;';
	    	if($instagram)
	    		echo '<a href="'.$instagram.'" target="_blank"> '.$label_instagram .'</a>&nbsp;&nbsp;';
	    	if($twitter)
	    		echo '<a href="'.$twitter.'" target="_blank"> '.$label_twitter .'</a>&nbsp;&nbsp;';
	    	if($googleplus)
	    		echo '<a href="'.$googleplus.'" target="_blank"> '.$label_googleplus.'</a>&nbsp;&nbsp;';
	    	if($linkedin)
	    		echo '<a href="'.$linkedin.'" target="_blank"> '.$label_linkedin .'</a>&nbsp;&nbsp;';
	    	if($behance)
	    		echo '<a href="'.$behance.'" target="_blank"> '.$label_behance.'</a>&nbsp;&nbsp;';
	    	if($dribbble)
	    		echo '<a href="'.$dribbble.'" target="_blank"> '.$label_dribbble .'</a>&nbsp;&nbsp;';

    	echo '</div>';
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP30_By_Who_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP30_By_Who_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->wp30_by_who, plugin_dir_url( __FILE__ ) . 'css/wp30-by-who-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->wp30_by_who, plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', array(), $this->version, 'all'  );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP30_By_Who_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP30_By_Who_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->wp30_by_who, plugin_dir_url( __FILE__ ) . 'js/wp30-by-who-public.js', array( 'jquery' ), $this->version, false );
		

	}

}
