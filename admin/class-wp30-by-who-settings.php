<?php

/**
 * The settings of the plugin.
 *
 * @link       http://wp30orleaveit.com/wp30/by-who
 * @since      1.0.0
 *
 * @package    WP30_By_Who
 * @subpackage WP30_By_Who/admin
 */

/**
 * Class WordPress_Plugin_Template_Settings
 *
 */
class WP30_By_Who_Settings {

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
	 * @param      string    $wp30_by_who       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wp30_by_who, $version ) {

		$this->wp30_by_who = $wp30_by_who;
		$this->version = $version;

	}

	/**
	 * This function introduces the theme options into the 'Appearance' menu and into a top-level
	 * 'WPPB Demo' menu.
	 */
	public function setup_plugin_options_menu() {
		if ( ! has_nav_menu( 'wp30-plugin' ) ){
			add_menu_page('WP30', 'WP30', 'manage_options', 'wp30', array( $this, 'render_settings_page_wp30'), 'dashicons-controls-play');
		}

		add_submenu_page('wp30', 'By Who', 'By Who', 'manage_options', __FILE__.'/by-who', array( $this, 'render_settings_page_content'));
  
	}

	/**
	 * Provides default values for the Display Options.
	 *
	 * @return array
	 */
	public function default_display_options() {

		$defaults = array(
			'show_left'		=>	'',
			'show_right'		=>	'yes',
		);

		return $defaults;

	}

	/**
	 * Provide default values for the Social Options.
	 *
	 * @return array
	 */
	public function default_social_options() {

		$defaults = array(
			'instagram'		=>	'http://instagram.com',
			'twitter'		=>	'http://twitter.com',
			'facebook'		=>	'http://facebook.com',
			'googleplus'	=>	'',
			'linkedin'		=>	'',
			'behance'		=>	'',
			'dribbble'		=>	'',
		);

		return  $defaults;

	}

	/**
	 * Provides default values for the Input Options.
	 *
	 * @return array
	 */
	public function default_input_options() {

		$defaults = array(
			'input_text'		=>	'By WP30',
			'url_link'	=>	'http://www.terrytsang.com/wp30',
			'email'	=>	'',
			'position' => 'right'
		);

		return $defaults;

	}

	/**
	 * Renders a simple page to display for the theme menu defined above.
	 */
	public function render_settings_page_wp30( ) {
		?>
		<!-- Create a header in the default WordPress 'wrap' container -->
		<div class="wrap">

			<h2><?php _e( 'WP30 - Starter Kit for WordPress', 'wp30-by-who' ); ?></h2>
			
            <p>Hey, i'm <a href="http://terrytsang.com" target="_blank">Terry Tsang</a>, I am working on this challenge <b>"30 WordPress Plugins in 30 Days", <a href="http://terrytsang.com/wp30" target="_blank">WP30</a></b>, which is a starter kit for any WordPress site.</p>


		</div><!-- /.wrap -->
	<?php
	}

	/**
	 * Renders a simple page to display for the theme menu defined above.
	 */
	public function render_settings_page_content( $active_tab = '' ) {
		?>
		<!-- Create a header in the default WordPress 'wrap' container -->
		<div class="wrap">

			<h2><?php _e( 'WP30 - By Who', 'wp30-by-who' ); ?></h2>
			<?php settings_errors(); ?>

			<?php if( isset( $_GET[ 'tab' ] ) ) {
				$active_tab = $_GET[ 'tab' ];
			} else if( $active_tab == 'social_options' ) {
				$active_tab = 'social_options';
			} else if( $active_tab == 'display_options' ) {
				$active_tab = 'input_settings';
			} else {
				$active_tab = 'input_settings';
			} // end if/else ?>

			<h2 class="nav-tab-wrapper">
				<a href="?page=wp30-by-who/admin/class-wp30-by-who-settings.php/by-who&tab=input_settings" class="nav-tab <?php echo $active_tab == 'input_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Settings', 'wp30-by-who' ); ?></a>
				<!-- <a href="?page=wp30-by-who/admin/class-wp30-by-who-settings.php/by-who&tab=display_options" class="nav-tab <?php echo $active_tab == 'display_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Display Options', 'wp30-by-who' ); ?></a> -->
				<a href="?page=wp30-by-who/admin/class-wp30-by-who-settings.php/by-who&tab=social_options" class="nav-tab <?php echo $active_tab == 'social_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Social Options', 'wp30-by-who' ); ?></a>
				
			</h2>

			<form method="post" action="options.php">
				<?php

				if( $active_tab == 'display_options' ) {

					settings_fields( 'wp30_by_who_display_options' );
					do_settings_sections( 'wp30_by_who_display_options' );

				} elseif( $active_tab == 'social_options' ) {

					settings_fields( 'wp30_by_who_social_options' );
					do_settings_sections( 'wp30_by_who_social_options' );

				} else {

					settings_fields( 'wp30_by_who_input_settings' );
					do_settings_sections( 'wp30_by_who_input_settings' );

				} // end if/else

				submit_button();

				?>
			</form>

		</div><!-- /.wrap -->
	<?php
	}


	/**
	 * This function provides a simple description for the General Options page.
	 *
	 * It's called from the 'wppb-demo_initialize_theme_options' function by being passed as a parameter
	 * in the add_settings_section function.
	 */
	public function general_options_callback() {
		$options = get_option('wp30_by_who_display_options');
		//var_dump($options);
		echo '<p>' . __( 'Select which areas of content you wish to display.', 'wp30-by-who' ) . '</p>';
	} // end general_options_callback

	/**
	 * This function provides a simple description for the Social Options page.
	 *
	 * It's called from the 'wppb-demo_theme_initialize_social_options' function by being passed as a parameter
	 * in the add_settings_section function.
	 */
	public function social_options_callback() {
		$options = get_option('wp30_by_who_social_options');
		//var_dump($options);
		echo '<p>' . __( 'Provide the URL to the social networks you\'d like to display.', 'wp30-by-who' ) . '</p>';
	} // end general_options_callback

	/**
	 * This function provides a simple description for the By Who Settings page.
	 *
	 * It's called from the 'wppb-demo_theme_initialize_input_settings_options' function by being passed as a parameter
	 * in the add_settings_section function.
	 */
	public function input_settings_callback() {
		$options = get_option('wp30_by_who_input_settings');
		//var_dump($options);
		echo '<p>' . __( 'The display setting for the WP30 - By Who', 'wp30-by-who' ) . '</p>';
	} // end general_options_callback


	/**
	 * Initializes the theme's display options page by registering the Sections,
	 * Fields, and Settings.
	 *
	 * This function is registered with the 'admin_init' hook.
	 */
	public function initialize_display_options() {

		// If the theme options don't exist, create them.
		if( false == get_option( 'wp30_by_who_display_options' ) ) {
			$default_array = $this->default_display_options();
			add_option( 'wp30_by_who_display_options', $default_array );
		}


		add_settings_section(
			'general_settings_section',			            // ID used to identify this section and with which to register options
			__( 'Display Position', 'wp30-by-who' ),		        // Title to be displayed on the administration page
			array( $this, 'general_options_callback'),	    // Callback used to render the description of the section
			'wp30_by_who_display_options'		                // Page on which to add this section of options
		);

		// Next, we'll introduce the fields for toggling the visibility of content elements.
		add_settings_field(
			'show_left',						        // ID used to identify the field throughout the theme
			__( 'Left', 'wp30-by-who' ),					// The label to the left of the option interface element
			array( $this, 'toggle_header_callback'),	// The name of the function responsible for rendering the option interface
			'wp30_by_who_display_options',	            // The page on which this option will be displayed
			'general_settings_section',			        // The name of the section to which this field belongs
			array(								        // The array of arguments to pass to the callback. In this case, just a description.
				__( 'Activate this setting to display the link on left side.', 'wp30-by-who' ),
			)
		);

		add_settings_field(
			'show_right',
			__( 'Right', 'wp30-by-who' ),
			array( $this, 'toggle_footer_callback'),
			'wp30_by_who_display_options',
			'general_settings_section',
			array(
				__( 'Activate this setting to display the link on right side.', 'wp30-by-who' ),
			)
		);

		// Finally, we register the fields with WordPress
		register_setting(
			'wp30_by_who_display_options',
			'wp30_by_who_display_options'
		);

	} // end wppb-demo_initialize_theme_options


	/**
	 * Initializes the theme's social options by registering the Sections,
	 * Fields, and Settings.
	 *
	 * This function is registered with the 'admin_init' hook.
	 */
	public function initialize_social_options() {
		//delete_option('wp30_by_who_social_options');
		if( false == get_option( 'wp30_by_who_social_options' ) ) {
			$default_array = $this->default_social_options();
			update_option( 'wp30_by_who_social_options', $default_array );
		} // end if

		$icon_facebook = plugin_dir_url( __FILE__ ) . '../public/images/social/grey/facebook.png';
		$icon_instagram = plugin_dir_url( __FILE__ ) . '../public/images/social/grey/instagram.png';
		$icon_twitter = plugin_dir_url( __FILE__ ) . '../public/images/social/grey/twitter.png';
		$icon_googleplus = plugin_dir_url( __FILE__ ) . '../public/images/social/grey/googleplus.png';
		$icon_linkedin = plugin_dir_url( __FILE__ ) . '../public/images/social/grey/linkedin.png';
		$icon_behance = plugin_dir_url( __FILE__ ) . '../public/images/social/grey/behance.png';
		$icon_dribbble = plugin_dir_url( __FILE__ ) . '../public/images/social/grey/dribbble.png';

		$label_facebook = '<img src="'.$icon_facebook.'" alt="Instagram" title="Instagram" />';
		$label_instagram = '<img src="'.$icon_instagram.'" alt="Instagram" title="Instagram" />';
		$label_twitter = '<img src="'.$icon_twitter.'" alt="Twitter" title="Twitter" />';
		$label_googleplus = '<img src="'.$icon_googleplus.'" alt="Google+" title="Google+" />';
		$label_linkedin = '<img src="'.$icon_linkedin.'" alt="Linkedin" title="Linkedin" />';
		$label_behance = '<img src="'.$icon_behance.'" alt="Behance" title="Behance" />';
		$label_dribbble = '<img src="'.$icon_dribbble.'" alt="Dribbble" title="Dribbble" />';

		add_settings_section(
			'social_settings_section',			// ID used to identify this section and with which to register options
			__( 'Social Options', 'wp30-by-who' ),		// Title to be displayed on the administration page
			array( $this, 'social_options_callback'),	// Callback used to render the description of the section
			'wp30_by_who_social_options'		// Page on which to add this section of options
		);

		add_settings_field(
			'facebook',
			$label_facebook,
			array( $this, 'facebook_callback'),
			'wp30_by_who_social_options',
			'social_settings_section'
		);

		add_settings_field(
			'instagram',
			$label_instagram,
			array( $this, 'instagram_callback'),
			'wp30_by_who_social_options',
			'social_settings_section'
		);

		add_settings_field(
			'twitter',
			$label_twitter,
			array( $this, 'twitter_callback'),
			'wp30_by_who_social_options',
			'social_settings_section'
		);

		add_settings_field(
			'googleplus',
			$label_googleplus,
			array( $this, 'googleplus_callback'),
			'wp30_by_who_social_options',
			'social_settings_section'
		);

		add_settings_field(
			'linkedin',
			$label_linkedin,
			array( $this, 'linkedin_callback'),
			'wp30_by_who_social_options',
			'social_settings_section'
		);

		add_settings_field(
			'behance',
			$label_behance,
			array( $this, 'behance_callback'),
			'wp30_by_who_social_options',
			'social_settings_section'
		);

		add_settings_field(
			'dribbble',
			$label_dribbble,
			array( $this, 'dribbble_callback'),
			'wp30_by_who_social_options',
			'social_settings_section'
		);

		register_setting(
			'wp30_by_who_social_options',
			'wp30_by_who_social_options',
			array( $this, 'sanitize_social_options')
		);

	}


	/**
	 * Initializes the theme's input example by registering the Sections,
	 * Fields, and Settings. This particular group of options is used to demonstration
	 * validation and sanitization.
	 *
	 * This function is registered with the 'admin_init' hook.
	 */
	public function initialize_input_settings() {
		//delete_option('wp30_by_who_input_settings');
		if( false == get_option( 'wp30_by_who_input_settings' ) ) {
			$default_array = $this->default_input_options();
			update_option( 'wp30_by_who_input_settings', $default_array );
		} // end if

		add_settings_section(
			'input_settings_section',
			__( 'Settings', 'wp30-by-who' ),
			array( $this, 'input_settings_callback'),
			'wp30_by_who_input_settings'
		);

		add_settings_field(
			'Text Format',
			__( 'Text Format', 'wp30-by-who' ),
			array( $this, 'input_text_callback'),
			'wp30_by_who_input_settings',
			'input_settings_section'
		);

		add_settings_field(
			'URL Link',
			__( 'URL Link', 'wp30-by-who' ),
			array( $this, 'url_link_callback'),
			'wp30_by_who_input_settings',
			'input_settings_section'
		);

		add_settings_field(
			'Email',
			__( 'Email', 'wp30-by-who' ),
			array( $this, 'email_callback'),
			'wp30_by_who_input_settings',
			'input_settings_section'
		);

		add_settings_field(
			'Position',
			__( 'Position', 'wp30-by-who' ),
			array( $this, 'position_callback'),
			'wp30_by_who_input_settings',
			'input_settings_section'
		);


		register_setting(
			'wp30_by_who_input_settings',
			'wp30_by_who_input_settings',
			array( $this, 'validate_input_settings')
		);

	}

	/**
	 * This function renders the interface elements for toggling the visibility of the header element.
	 *
	 * It accepts an array or arguments and expects the first element in the array to be the description
	 * to be displayed next to the checkbox.
	 */
	public function toggle_header_callback($args) {

		// First, we read the options collection
		$options = get_option('wp30_by_who_display_options');

		// Next, we update the name attribute to access this element's ID in the context of the display options array
		// We also access the show_left element of the options collection in the call to the checked() helper function
		$html = '<input type="checkbox" id="show_left" name="wp30_by_who_display_options[show_left]" value="1" ' . checked( 1, isset( $options['show_left'] ) ? $options['show_left'] : 0, false ) . '/>';

		// Here, we'll take the first argument of the array and add it to a label next to the checkbox
		$html .= '<label for="show_left">&nbsp;'  . $args[0] . '</label>';

		echo $html;

	} // end toggle_header_callback

	public function toggle_footer_callback($args) {

		$options = get_option('wp30_by_who_display_options');

		$html = '<input type="checkbox" id="show_right" name="wp30_by_who_display_options[show_right]" value="1" ' . checked( 1, isset( $options['show_right'] ) ? $options['show_right'] : 0, false ) . '/>';
		$html .= '<label for="show_right">&nbsp;'  . $args[0] . '</label>';

		echo $html;

	} // end toggle_footer_callback

	public function instagram_callback() {

		// First, we read the social options collection
		$options = get_option( 'wp30_by_who_social_options' );

		// Next, we need to make sure the element is defined in the options. If not, we'll set an empty string.
		$url = '';
		if( isset( $options['instagram'] ) ) {
			$url = esc_url( $options['instagram'] );
		} // end if

		// Render the output
		
		echo '<input type="text" id="instagram" name="wp30_by_who_social_options[instagram]" value="' . $url . '" style="width:300px" />';

	} // end website_callback

	public function twitter_callback() {

		// First, we read the social options collection
		$options = get_option( 'wp30_by_who_social_options' );

		// Next, we need to make sure the element is defined in the options. If not, we'll set an empty string.
		$url = '';
		if( isset( $options['twitter'] ) ) {
			$url = esc_url( $options['twitter'] );
		} // end if

		// Render the output
		echo '<input type="text" id="twitter" name="wp30_by_who_social_options[twitter]" placeholder="http://twitter.com/" value="' . $url . '" style="width:300px" />';

	} // end twitter_callback

	public function facebook_callback() {

		$options = get_option( 'wp30_by_who_social_options' );

		$url = '';
		if( isset( $options['facebook'] ) ) {
			$url = esc_url( $options['facebook'] );
		} // end if

		// Render the output
		echo '<input type="text" id="facebook" name="wp30_by_who_social_options[facebook]" placeholder="http://facebook.com/" value="' . $url . '" style="width:300px" />';

	} // end facebook_callback

	public function googleplus_callback() {

		$options = get_option( 'wp30_by_who_social_options' );

		$url = '';
		if( isset( $options['googleplus'] ) ) {
			$url = esc_url( $options['googleplus'] );
		} // end if

		// Render the output
		echo '<input type="text" id="googleplus" name="wp30_by_who_social_options[googleplus]" placeholder="http://plus.google.com/" value="' . $url . '" style="width:300px" />';

	} // end googleplus_callback

	public function linkedin_callback() {

		$options = get_option( 'wp30_by_who_social_options' );

		$url = '';
		if( isset( $options['linkedin'] ) ) {
			$url = esc_url( $options['linkedin'] );
		} // end if

		// Render the output
		echo '<input type="text" id="googleplus" name="wp30_by_who_social_options[linkedin]" placeholder="http://linkedin.com/" value="' . $url . '" style="width:300px" />';

	} // end linkedin_callback

	public function behance_callback() {

		$options = get_option( 'wp30_by_who_social_options' );

		$url = '';
		if( isset( $options['behance'] ) ) {
			$url = esc_url( $options['behance'] );
		} // end if

		// Render the output
		echo '<input type="text" id="googleplus" name="wp30_by_who_social_options[behance]" placeholder="http://behance.com/" value="' . $url . '" style="width:300px" />';

	} // end behance_callback

	public function dribbble_callback() {

		$options = get_option( 'wp30_by_who_social_options' );

		$url = '';
		if( isset( $options['dribbble'] ) ) {
			$url = esc_url( $options['dribbble'] );
		} // end if

		// Render the output
		echo '<input type="text" id="googleplus" name="wp30_by_who_social_options[dribbble]" placeholder="http://dribbble.com/" value="' . $url . '" style="width:300px" />';

	} // end dribbble_callback


	public function input_text_callback() {

		$options = get_option( 'wp30_by_who_input_settings' );

		// Render the output
		echo '<input type="text" id="input_text" name="wp30_by_who_input_settings[input_text]" value="' . $options['input_text'] . '" style="width:300px" />';

	} // end input_element_callback

	public function url_link_callback() {

		$options = get_option( 'wp30_by_who_input_settings' );

		// Render the output
		echo '<input type="text" id="url_link" name="wp30_by_who_input_settings[url_link]" value="' . $options['url_link'] . '" style="width:300px" />';

	} // end url_link_callback

	public function email_callback() {

		$options = get_option( 'wp30_by_who_input_settings' );

		// Render the output
		echo '<input type="text" id="email" name="wp30_by_who_input_settings[email]" value="' . $options['email'] . '" style="width:300px" />';

	} // end url_link_callback

	public function position_callback() {

		$options = get_option( 'wp30_by_who_input_settings' );

		$html = '<input type="radio" id="position_one" name="wp30_by_who_input_settings[position]" value="1"' . checked( 1, $options['position'], false ) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="position_one">Left</label>';
		$html .= '&nbsp;';
		$html .= '<input type="radio" id="position_two" name="wp30_by_who_input_settings[position]" value="2"' . checked( 2, $options['position'], false ) . '/>';
		$html .= '&nbsp;';
		$html .= '<label for="position_two">Right</label>';

		echo $html;

	} // end radio_element_callback

	public function select_element_callback() {

		$options = get_option( 'wp30_by_who_input_settings' );

		$html = '<select id="time_options" name="wp30_by_who_input_settings[time_options]">';
		$html .= '<option value="default">' . __( 'Select a time option...', 'wp30-by-who' ) . '</option>';
		$html .= '<option value="never"' . selected( $options['time_options'], 'never', false) . '>' . __( 'Never', 'wp30-by-who' ) . '</option>';
		$html .= '<option value="sometimes"' . selected( $options['time_options'], 'sometimes', false) . '>' . __( 'Sometimes', 'wp30-by-who' ) . '</option>';
		$html .= '<option value="always"' . selected( $options['time_options'], 'always', false) . '>' . __( 'Always', 'wp30-by-who' ) . '</option>';	$html .= '</select>';

		echo $html;

	} // end select_element_callback


	/**
	 * Sanitization callback for the social options. Since each of the social options are text inputs,
	 * this function loops through the incoming option and strips all tags and slashes from the value
	 * before serializing it.
	 *
	 * @params	$input	The unsanitized collection of options.
	 *
	 * @returns			The collection of sanitized values.
	 */
	public function sanitize_social_options( $input ) {

		// Define the array for the updated options
		$output = array();

		// Loop through each of the options sanitizing the data
		foreach( $input as $key => $val ) {

			if( isset ( $input[$key] ) ) {
				$output[$key] = esc_url_raw( strip_tags( stripslashes( $input[$key] ) ) );
			} // end if

		} // end foreach

		// Return the new collection
		return apply_filters( 'sanitize_social_options', $output, $input );

	} // end sanitize_social_options

	public function validate_input_settings( $input ) {

		// Create our array for storing the validated options
		$output = array();

		// Loop through each of the incoming options
		foreach( $input as $key => $value ) {

			// Check to see if the current option has a value. If so, process it.
			if( isset( $input[$key] ) ) {

				// Strip all HTML and PHP tags and properly handle quoted strings
				$output[$key] = strip_tags( stripslashes( $input[ $key ] ) );

			} // end if

		} // end foreach

		// Return the array processing any additional functions filtered by this action
		return apply_filters( 'validate_input_settings', $output, $input );

	} // end validate_input_settings




}