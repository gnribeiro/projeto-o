<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Simple Template Library
 *
 * Provides a simple library for wrapping views in layouts.
 * HMVC-compatible.
 * Doesn't do anything sneaky, like trying to access protected properties in CI core classes.
 * Originally derived from Lonnie Ezell's Ocular 3 / Bonfire Template library, but very heavily 
 * modified from the original.
 * If you want a more full-featured solution, take a look at Bonfire. cibonfire.com.
 *
 * @version		1.0
 * @author		Max Schwanekamp
 * @link		http://github.com/anaxamaxan/codeigniter_simple_template
 * @license     MIT http://www.opensource.org/licenses/mit-license.php
 */
class Template {
	
	/**
	 * Name of folder to look for layouts in.
	 * 
	 * @var string
	 */
	protected static $layouts_folder = 'layouts';	
		
	/**
	 * The layout to render the views into.  No .php extension.
	 * 
	 * @var string
	 */
	protected static $layout = 'default';
	
	/**
	 * The view to load.
	 * 
	 * @var string
	 */
	protected static $current_view;
	
	/**
	 * If true, CodeIgniter's Template Parser will be used to parse the view. 
	 * If false, the view is displayed with no parsing. Used by the yield() and partial(). 
	 * 
	 * @var bool
	 */
	protected static $parse_views = false;

	/**
	 * When $autorender is true, the self::autorender() method will call self::render().
	 * If false, the autorender() method will do nothing.
	 * Call the autorender() method via the post_controller hook.
	 * @var bool $autorender
	 */
	private static $autorender = TRUE;
		
	/**
	 * The data to be passed into the views. 
	 * The keys are the names of the variables and the values are the values.
	 * 
	 * @var array
	 */
	protected static $data = array();
	
	/**
	 * An array of partials. 
	 * The key is the name to reference the partial by, and the value is the file. 
	 * The class will loop through these, parse them, and push them into the layout.
	 * 
	 * @var array
	 */
	protected static $partials = array();

	/**
	* CI superobject
	*
	* @var \MY_Controller
	*/
	private static $ci;

	//--------------------------------------------------------------------

	/**
	 * Constructor just grabs the CI superobject and calls the class init method
	 */
	public function __construct() 
	{	
		self::$ci =& get_instance();
		self::init();		
	}
	
	//--------------------------------------------------------------------
	
	/**
	 * Grabs an instance of the CI superobject, set defaults from config.
	 * 
	 * @static
	 * @return void
	 */
	public static function init($config_values = array()) 
	{		
		//load config options
		foreach(array('layouts_folder','layout','current_view','parse_views') as $opt)
		{
			(isset($config_values[$opt]) AND $config_values[$opt] AND self::$opt = $config_values[$opt]);
		}
		
		log_message('debug', 'Simple Template spark loaded.');
	}
	
	// -------------------------------------------------------------
	
	/**
	 * Set the layouts folder
	 * 
	 * @static
	 * @param $folder
	 * @return void
	 */
	public static function set_layouts_folder($folder)
	{
		self::$layouts_folder = (string)$folder;
	}
	
	// -------------------------------------------------------------
	
	/**
	 * Return the name of the currently-set layouts folder.
	 * 
	 * @static
	 * @return string
	 */
	public static function get_layouts_folder()
	{
		return self::$layouts_folder;
	}
	
	// -------------------------------------------------------------
	
	/**
	 * Set the layout file (no file extension)
	 * 
	 * @static
	 * @param string $layout
	 * @return void
	 */
	public static function set_layout($layout = '')
	{
		if($layout) self::$layout = $layout;
	}
	
	// -------------------------------------------------------------
	
	/**
	 * Return the name of the current layout to be rendered.
	 * 
	 * @static
	 * @return string
	 */
	public static function get_layout()
	{
		return self::$layout;
	}
	
	//--------------------------------------------------------------------

	/**
	 * Set the current view to render.
	 * 
	 * @static
	 * @param string $view The name of the view file to render as content.
	 * @return void
	 */
	public static function set_view($view = '') 
	{
		(is_string($view) AND self::$current_view = $view);
	}
	
	// -------------------------------------------------------------
	
	/**
	 * Get the name of the current view to be rendered.
	 * 
	 * @static
	 * @return string
	 */
	public static function get_view()
	{
		return self::$current_view;
	}
		
	//--------------------------------------------------------------------
	
	/**
	 * Set whether or not the views will be passed through CI's parser.
	 * 
	 * @param bool $parse 
	 * @return void
	 */
	public static function set_parse_views($parse = true) 
	{
		self::$parse_views = (bool)$parse;
	}
	
	// -------------------------------------------------------------
	
	/**
	 * Return current parse_views setting.
	 * 
	 * @static
	 * @return bool
	 */
	public static function get_parse_views()
	{
		return self::$parse_views;
	}
		
	//--------------------------------------------------------------------
	
	/**
	 * Set a template data variable.
	 * If $var is an array, iterate recursively.
	 * If $overwrite is false, and the variable has been set previously, the method call is ignored.
	 * 
	 * @static
	 * @param string $var
	 * @param string $value
	 * @param bool $overwrite 
	 * @return void
	 */
	public static function set($var = '', $value = '', $overwrite = true) 
	{		
		if(is_array($var))
	    {
	        foreach($var as $key => $value)
	        {
	        	self::set($key, $value, $overwrite);
	        }           
	    }
	    else
	    {
		    if($overwrite OR ! isset(self::$data[$var])) self::$data[$var] = $value;
	    }
	}

	//--------------------------------------------------------------------
	
	/**
	 * Bind a template data variable.
	 * If $var is an array, iterate recursively.
	 * If $overwrite is false, and the variable has been set previously, the method call is ignored.
	 * 
	 * @static
	 * @param string $var
	 * @param string $value
	 * @param bool $overwrite 
	 * @return void
	 */
	public static function bind($var ,  &$value ) 
	{		
		    self::$data[$var] = & $value;
		   # if($overwrite OR ! isset(self::$data[$var])) self::$data[$var] = &$value;
	}
	
	//--------------------------------------------------------------------
	
	/**
	 * Return the value of a specified template variable.
	 * Returns null if template variable does not exist. 
	 * 
	 * @static
	 * @param string $var
	 * @param mixed $default_value
	 * @return mixed
	 */
	public static function get($var = '', $default_value = null) 
	{
		if (empty($var)) return null;
		
		if (isset(self::$data[$var])) return self::$data[$var];
		
		return $default_value;
		
	}
	
	//--------------------------------------------------------------------
		
	/**
	 * Renders out the specified layout, which starts the process of rendering the page content. 
	 * Also determines the correct view to use based on the current controller/method.
	 * 
	 * Reminder: The layout should have a call to Template::yield() in order to load the view.
	 * 
	 * @static
	 * @param string $layout
	 * @return void
	 */
	public static function render($layout = '') 
	{
		$output = '';
		$layouts_folder = (self::$layouts_folder ? self::$layouts_folder.'/' : '');
	
		// We need to know which layout to render
		$layout = empty($layout) ? self::$layout : $layout;
		
		// If we don't have a view explicitly set, we can  
		// grab our current view name based on controller/method
		// which routes to views/controller/method.
		if (empty(self::$current_view))
		{		
			self::$current_view =  self::$ci->router->class . '/' . self::$ci->router->method;
		}
		
		// Time to render the layout
		$output = self::load_view($layouts_folder.$layout, null);
		
		//empty output means something is screwed up.  abort.
		if (empty($output))
		{ 
			show_error('Unable to load layout: '. $layouts_folder.$layout); 
		}
		
		//hand over the output to CI's Output class.
		self::$ci->output->set_output($output); 
	}
	
	//--------------------------------------------------------------------
	
	/**
	 * Renders the current view into the layout.
	 * 
	 * @static
	 * @return string A string containing the output of the render process.
	 */
	public static function yield() 
	{ 	
		$output = '';
		
		log_message('debug',__METHOD__.'(): Current View = '.self::$current_view);

		$output = self::load_view(self::$current_view, null);
		
		return $output;
	}
	
	// -------------------------------------------------------------

	/**
	 * Stores the partial named $partial_name in the partials array for later rendering. 
	 * The $view_name variable is the name of the view file to be rendered. 
	 * If $view_name is empty, the partial is effectively deleted.
	 * 
	 * @static
	 * @param string $partial_name
	 * @param string $view_name
	 * @return void
	 */
	public static function set_partial($partial_name = '', $view_name = '') 
	{
		(empty($partial_name) OR self::$partials[$partial_name] = $view_name);
	}
	
	//--------------------------------------------------------------------
	
	/**
	 * Render a "partial" view, for sidebar, footer text, etc. 
	 * It is recommended to set a default when calling this function within a layout. 
	 * The default will be rendered if no methods override the view (using the set_partial() method).
	 * 
	 * @static
	 * @param string $partial_name The name of the partial view to render.
	 * @param string $default_view The view to render if no other view has been set with the set_partial() method.
	 * @param array $data An array of data to pass only to the partial.
	 * @param bool $return If true, just return the resulting output.  Else echo it.
	 * @return string|void
	 */
	public static function partial($partial_name = '', $default_view = '', $data = array(), $return = false)
	{		
		if (empty($partial_name)) 
		{
			log_message('debug', __METHOD__.'() No partial_name provided.');
			return;
		}

		// If a partial has been set previously use that
		if (isset(self::$partials[$partial_name]))
		{
			$partial_view = self::$partials[$partial_name];
		} 
		// Otherwise, use the $default_view argument.
		else 
		{
			$partial_view = $default_view;
		}
		
		log_message('debug', __METHOD__."() Looking for partial {$partial_name}: {$partial_view}");

		if (empty($partial_view)) 
		{ 
			log_message('debug', __METHOD__.'() Unable to find the default partial: ' . $default_view);
			return;
		}
		
		$output = self::load_view($partial_view, $data);
		
		if($return) return $output;
		else echo $output;
	}
	
	//--------------------------------------------------------------------
	
	/**
	 * Load a view.  Yeah, I suppose you got that already.
	 * Optionally provide view-specific data as an array.
	 * 
	 * @static
	 * @param string $view
	 * @param array|null $data
	 * @return string
	 */
	public static function load_view($view = '', $data = null) 
	{ 
		if (empty($view)) return '';
		
		if(is_array($data)) $view_data = array_merge($data, self::$data);
		else $view_data = self::$data;
		
		if (self::$parse_views)
		{
			$output = self::$ci->parser->parse($view, $view_data, true);
		}
		else 
		{
			$output = self::$ci->load->view($view, $view_data, true);
		}
		
		return $output;
	}
	
	//--------------------------------------------------------------------
	
	/**
	 * Render the layout and view automatically.
	 * This is only useful if called via the post_controller hook.
	 * @return void
	 */
	function autorender()
	{
		log_message('debug',__METHOD__.'() called.');
		if(self::$autorender)
		{
			self::render();
		}
	}

	//--------------------------------------------------------------------
	
	/**
	 * Toggle the $autorender flag on/off.
	 * @static
	 * @param bool $autorender
	 * @return void
	 */
	public static function set_autorender($autorender = TRUE)
	{
		self::$autorender = (bool)$autorender;
	}
		
	// -------------------------------------------------------------
	
}

/* End of file template.php */
