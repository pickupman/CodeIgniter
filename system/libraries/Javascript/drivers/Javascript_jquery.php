<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://www.codeigniter.com/user_guide/license.html
 * @link		http://www.codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

/**
 * Jquery Adapter for Javascript Driver
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @author		ExpressionEngine Dev Team
 * @category	Loader
 * @link		http://www.codeigniter.com/user_guide/libraries/javascript.html
 */

class CI_Javascript_jquery extends CI_Driver {


	var $CI;

	/**
	 * JavaScript directory location
	 *
	 * @var	string
	 */
	protected $_javascript_folder = 'js';

	/**
	 * JQuery code for load
	 *
	 * @var	array
	 */
	public $jquery_code_for_load = array();

	/**
	 * JQuery code for compile
	 *
	 * @var	array
	 */
	public $jquery_code_for_compile = array();

	/**
	 * JQuery corner active flag
	 *
	 * @var	bool
	 */
	public $jquery_corner_active = FALSE;

	/**
	 * JQuery table sorter active flag
	 *
	 * @var	bool
	 */
	public $jquery_table_sorter_active = FALSE;

	/**
	 * JQuery table sorder pager active
	 *
	 * @var	bool
	 */
	public $jquery_table_sorter_pager_active = FALSE;

	/**
	 * JQuery AJAX image
	 *
	 * @var	string
	 */
	public $jquery_ajax_img = '';


	public function __construct()
	{
		log_message('debug', "Jquery Class Initialized");                
	}

	// --------------------------------------------------------------------	 
	// Event Code
	// --------------------------------------------------------------------	
	// --------------------------------------------------------------------
	// Event Code
	// --------------------------------------------------------------------

	/**
	 * Blur
	 *
	 * Outputs a jQuery blur event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _blur($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'blur');
	}

	// --------------------------------------------------------------------

	/**
	 * Change
	 *
	 * Outputs a jQuery change event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _change($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'change');
	}

	// --------------------------------------------------------------------

	/**
	 * Click
	 *
	 * Outputs a jQuery click event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @param	bool	whether or not to return false
	 * @return	string
	 */
	function _click($element = 'this', $js = '', $ret_false = TRUE)
	{
		is_array($js) OR $js = array($js);

		if ($ret_false)
		{
			$js[] = 'return false;';
		}

		return $this->_add_event($element, $js, 'click');
	}

	// --------------------------------------------------------------------

	/**
	 * Double Click
	 *
	 * Outputs a jQuery dblclick event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _dblclick($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'dblclick');
	}

	// --------------------------------------------------------------------

	/**
	 * Error
	 *
	 * Outputs a jQuery error event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _error($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'error');
	}

	// --------------------------------------------------------------------

	/**
	 * Focus
	 *
	 * Outputs a jQuery focus event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _focus($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'focus');
	}

	// --------------------------------------------------------------------

	/**
	 * Hover
	 *
	 * Outputs a jQuery hover event
	 *
	 * @param	string	- element
	 * @param	string	- Javascript code for mouse over
	 * @param	string	- Javascript code for mouse out
	 * @return	string
	 */
	function _hover($element = 'this', $over, $out)
	{
		$event = "\n\t$(".$this->_prep_element($element).").hover(\n\t\tfunction()\n\t\t{\n\t\t\t{$over}\n\t\t}, \n\t\tfunction()\n\t\t{\n\t\t\t{$out}\n\t\t});\n";

		$this->jquery_code_for_compile[] = $event;

		return $event;
	}

	// --------------------------------------------------------------------

	/**
	 * Keydown
	 *
	 * Outputs a jQuery keydown event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _keydown($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'keydown');
	}

	// --------------------------------------------------------------------

	/**
	 * Keyup
	 *
	 * Outputs a jQuery keydown event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _keyup($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'keyup');
	}

	// --------------------------------------------------------------------

	/**
	 * Load
	 *
	 * Outputs a jQuery load event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _load($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'load');
	}

	// --------------------------------------------------------------------

	/**
	 * Mousedown
	 *
	 * Outputs a jQuery mousedown event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _mousedown($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'mousedown');
	}

	// --------------------------------------------------------------------

	/**
	 * Mouse Out
	 *
	 * Outputs a jQuery mouseout event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _mouseout($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'mouseout');
	}

	// --------------------------------------------------------------------

	/**
	 * Mouse Over
	 *
	 * Outputs a jQuery mouseover event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _mouseover($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'mouseover');
	}

	// --------------------------------------------------------------------

	/**
	 * Mouseup
	 *
	 * Outputs a jQuery mouseup event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _mouseup($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'mouseup');
	}

	// --------------------------------------------------------------------

	/**
	 * Output
	 *
	 * Outputs script directly
	 *
	 * @param	array	$array_js = array()
	 * @return	void
	 */
	function _output($array_js = array())
	{
		if ( ! is_array($array_js))
		{
			$array_js = array($array_js);
		}

		foreach ($array_js as $js)
		{
			$this->jquery_code_for_compile[] = "\t".$js."\n";
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Resize
	 *
	 * Outputs a jQuery resize event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _resize($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'resize');
	}

	// --------------------------------------------------------------------

	/**
	 * Scroll
	 *
	 * Outputs a jQuery scroll event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _scroll($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'scroll');
	}

	// --------------------------------------------------------------------

	/**
	 * Unload
	 *
	 * Outputs a jQuery unload event
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function _unload($element = 'this', $js = '')
	{
		return $this->_add_event($element, $js, 'unload');
	}

	// --------------------------------------------------------------------
	// Effects
	// --------------------------------------------------------------------

	/**
	 * Add Class
	 *
	 * Outputs a jQuery addClass event
	 *
	 * @param	string	$element
	 * @param	string	$class
	 * @return	string
	 */
	function _addClass($element = 'this', $class = '')
	{
		$element = $this->_prep_element($element);
		return '$('.$element.').addClass("'.$class.'");';
	}

	// --------------------------------------------------------------------

	/**
	 * Animate
	 *
	 * Outputs a jQuery animate event
	 *
	 * @param	string	$element
	 * @param	array	$params
	 * @param	string	$speed	'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	$extra
	 * @return	string
	 */
	function _animate($element = 'this', $params = array(), $speed = '', $extra = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		$animations = "\t\t\t";

		foreach ($params as $param => $value)
		{
			$animations .= $param.": '".$value."', ";
		}

		$animations = substr($animations, 0, -2); // remove the last ", "

		if ($speed !== '')
		{
			$speed = ', '.$speed;
		}

		if ($extra !== '')
		{
			$extra = ', '.$extra;
		}

		return "$({$element}).animate({\n$animations\n\t\t}".$speed.$extra.');';
	}

	// --------------------------------------------------------------------

	/**
	 * Fade In
	 *
	 * Outputs a jQuery hide event
	 *
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function _fadeIn($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		if ($callback !== '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}

		return "$({$element}).fadeIn({$speed}{$callback});";
	}

	// --------------------------------------------------------------------

	/**
	 * Fade Out
	 *
	 * Outputs a jQuery hide event
	 *
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function _fadeOut($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		if ($callback !== '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}

		return '$('.$element.').fadeOut('.$speed.$callback.');';
	}

	// --------------------------------------------------------------------

	/**
	 * Hide
	 *
	 * Outputs a jQuery hide action
	 *
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function _hide($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		if ($callback !== '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}

		return "$({$element}).hide({$speed}{$callback});";
	}

	// --------------------------------------------------------------------

	/**
	 * Remove Class
	 *
	 * Outputs a jQuery remove class event
	 *
	 * @param	string	$element
	 * @param	string	$class
	 * @return	string
	 */
	function _removeClass($element = 'this', $class = '')
	{
		$element = $this->_prep_element($element);
		return '$('.$element.').removeClass("'.$class.'");';
	}

	// --------------------------------------------------------------------

	/**
	 * Slide Up
	 *
	 * Outputs a jQuery slideUp event
	 *
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function _slideUp($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		if ($callback !== '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}

		return '$('.$element.').slideUp('.$speed.$callback.');';
	}

	// --------------------------------------------------------------------

	/**
	 * Slide Down
	 *
	 * Outputs a jQuery slideDown event
	 *
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function _slideDown($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		if ($callback !== '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}

		return '$('.$element.').slideDown('.$speed.$callback.');';
	}

	// --------------------------------------------------------------------

	/**
	 * Slide Toggle
	 *
	 * Outputs a jQuery slideToggle event
	 *
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function _slideToggle($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		if ($callback !== '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}

		return '$('.$element.').slideToggle('.$speed.$callback.');';
	}

	// --------------------------------------------------------------------

	/**
	 * Toggle
	 *
	 * Outputs a jQuery toggle event
	 *
	 * @param	string	- element
	 * @return	string
	 */
	function _toggle($element = 'this')
	{
		$element = $this->_prep_element($element);
		return '$('.$element.').toggle();';
	}

	// --------------------------------------------------------------------

	/**
	 * Toggle Class
	 *
	 * Outputs a jQuery toggle class event
	 *
	 * @param	string	$element
	 * @param	string	$class
	 * @return	string
	 */
	function _toggleClass($element = 'this', $class = '')
	{
		$element = $this->_prep_element($element);
		return '$('.$element.').toggleClass("'.$class.'");';
	}

	// --------------------------------------------------------------------

	/**
	 * Show
	 *
	 * Outputs a jQuery show event
	 *
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function _show($element = 'this', $speed = '', $callback = '')
	{
		$element = $this->_prep_element($element);
		$speed = $this->_validate_speed($speed);

		if ($callback !== '')
		{
			$callback = ", function(){\n{$callback}\n}";
		}

		return '$('.$element.').show('.$speed.$callback.');';
	}

	// --------------------------------------------------------------------

	/**
	 * Updater
	 *
	 * An Ajax call that populates the designated DOM node with
	 * returned content
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	the controller to run the call against
	 * @param	string	optional parameters
	 * @return	string
	 */

	function _updater($container = 'this', $controller, $options = '')
	{
		$container = $this->_prep_element($container);
		$controller = (strpos('://', $controller) === FALSE) ? $controller : $this->CI->config->site_url($controller);

		// ajaxStart and ajaxStop are better choices here... but this is a stop gap
		if ($this->CI->config->item('javascript_ajax_img') === '')
		{
			$loading_notifier = 'Loading...';
		}
		else
		{
			$loading_notifier = '<img src="'.$this->CI->config->slash_item('base_url').$this->CI->config->item('javascript_ajax_img').'" alt="Loading" />';
		}

		$updater = '$('.$container.").empty();\n" // anything that was in... get it out
			."\t\t$(".$container.').prepend("'.$loading_notifier."\");\n"; // to replace with an image

		$request_options = '';
		if ($options !== '')
		{
			$request_options .= ', {'
					.(is_array($options) ? "'".implode("', '", $options)."'" : "'".str_replace(':', "':'", $options)."'")
					.'}';
		}

		return $updater."\t\t$($container).load('$controller'$request_options);";
	}

	// --------------------------------------------------------------------
	// Pre-written handy stuff
	// --------------------------------------------------------------------

	/**
	 * Zebra tables
	 *
	 * @param	string	$class
	 * @param	string	$odd
	 * @param	string	$hover
	 * @return	string
	 */
	function _zebraTables($class = '', $odd = 'odd', $hover = '')
	{
		$class = ($class !== '') ? '.'.$class : '';
		$zebra = "\t\$(\"table{$class} tbody tr:nth-child(even)\").addClass(\"{$odd}\");";

		$this->jquery_code_for_compile[] = $zebra;

		if ($hover !== '')
		{
			$hover = $this->hover("table{$class} tbody tr", "$(this).addClass('hover');", "$(this).removeClass('hover');");
		}

		return $zebra;
	}

	// --------------------------------------------------------------------
	// Plugins
	// --------------------------------------------------------------------

	/**
	 * Corner Plugin
	 *
	 * @link	http://www.malsup.com/jquery/corner/
	 * @param	string	$element
	 * @param	string	$corner_style
	 * @return	string
	 */
	public function corner($element = '', $corner_style = '')
	{
		// may want to make this configurable down the road
		$corner_location = '/plugins/jquery.corner.js';

		if ($corner_style !== '')
		{
			$corner_style = '"'.$corner_style.'"';
		}

		return '$('.$this->_prep_element($element).').corner('.$corner_style.');';
	}

	// --------------------------------------------------------------------

	/**
	 * Modal window
	 *
	 * Load a thickbox modal window
	 *
	 * @param	string	$src
	 * @param	bool	$relative
	 * @return	void
	 */
	public function modal($src, $relative = FALSE)
	{
		$this->jquery_code_for_load[] = $this->external($src, $relative);
	}

	// --------------------------------------------------------------------

	/**
	 * Effect
	 *
	 * Load an Effect library
	 *
	 * @param	string	$src
	 * @param	bool	$relative
	 * @return	void
	 */
	public function effect($src, $relative = FALSE)
	{
		$this->jquery_code_for_load[] = $this->external($src, $relative);
	}

	// --------------------------------------------------------------------

	/**
	 * Plugin
	 *
	 * Load a plugin library
	 *
	 * @param	string	$src
	 * @param	bool	$relative
	 * @return	void
	 */
	public function plugin($src, $relative = FALSE)
	{
		$this->jquery_code_for_load[] = $this->external($src, $relative);
	}

	// --------------------------------------------------------------------

	/**
	 * UI
	 *
	 * Load a user interface library
	 *
	 * @param	string	$src
	 * @param	bool	$relative
	 * @return	void
	 */
	public function ui($src, $relative = FALSE)
	{
		$this->jquery_code_for_load[] = $this->external($src, $relative);
	}

	// --------------------------------------------------------------------

	/**
	 * Sortable
	 *
	 * Creates a jQuery sortable
	 *
	 * @param	string	$element
	 * @param	array	$options
	 * @return	string
	 */
	public function sortable($element, $options = array())
	{
		if (count($options) > 0)
		{
			$sort_options = array();
			foreach ($options as $k=>$v)
			{
				$sort_options[] = "\n\t\t".$k.': '.$v;
			}
			$sort_options = implode(',', $sort_options);
		}
		else
		{
			$sort_options = '';
		}

		return '$('.$this->_prep_element($element).').sortable({'.$sort_options."\n\t});";
	}

	// --------------------------------------------------------------------

	/**
	 * Table Sorter Plugin
	 *
	 * @param	string	table name
	 * @param	string	plugin location
	 * @return	string
	 */
	public function tablesorter($table = '', $options = '')
	{
		$this->jquery_code_for_compile[] = "\t$(".$this->_prep_element($table).').tablesorter('.$options.");\n";
	}

	// --------------------------------------------------------------------
	// Class functions
	// --------------------------------------------------------------------

	/**
	 * Add Event
	 *
	 * Constructs the syntax for an event, and adds to into the array for compilation
	 *
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @param	string	The event to pass
	 * @return	string
	 */
	function _add_event($element, $js, $event)
	{
		if (is_array($js))
		{
			$js = implode("\n\t\t", $js);

		}

		$event = "\n\t$(".$this->_prep_element($element).').'.$event."(function(){\n\t\t{$js}\n\t});\n";
		$this->jquery_code_for_compile[] = $event;
		return $event;
	}

	// --------------------------------------------------------------------

	/**
	 * Compile
	 *
	 * As events are specified, they are stored in an array
	 * This funciton compiles them all for output on a page
	 *
	 * @param	string	$view_var
	 * @param	bool	$script_tags
	 * @return	void
	 */
	function _compile($view_var = 'script_foot', $script_tags = TRUE)
	{
		$this->CI =& get_instance();

		// External references
		$external_scripts = implode('', $this->jquery_code_for_load);
		$this->CI->load->vars(array('library_src' => $external_scripts));

		if (count($this->jquery_code_for_compile) === 0)
		{
			// no inline references, let's just return
			return;
		}

		// Inline references
		$script = '$(document).ready(function() {'."\n"
			.implode('', $this->jquery_code_for_compile)
			.'});';

		$output = ($script_tags === FALSE) ? $script : $this->inline($script);

		$this->CI->load->vars(array($view_var => $output));
		
		return $output;
	}

	// --------------------------------------------------------------------

	/**
	 * Clear Compile
	 *
	 * Clears the array of script events collected for output
	 *
	 * @return	void
	 */
	function _clear_compile()
	{
		$this->jquery_code_for_compile = array();
	}

	// --------------------------------------------------------------------

	/**
	 * Document Ready
	 *
	 * A wrapper for writing document.ready()
	 *
	 * @param	array	$js
	 * @return	void
	 */
	function _document_ready($js)
	{
		is_array($js) OR $js = array($js);

		foreach ($js as $script)
		{
			$this->jquery_code_for_compile[] = $script;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Script Tag
	 *
	 * Outputs the script tag that loads the jquery.js file into an HTML document
	 *
	 * @param	string	$library_src
	 * @param	bool	$relative
	 * @return	string
	 */
	public function script($library_src = '', $relative = FALSE)
	{
		$library_src = $this->external($library_src, $relative);
		$this->jquery_code_for_load[] = $library_src;
		return $library_src;
	}

	// --------------------------------------------------------------------

	/**
	 * Prep Element
	 *
	 * Puts HTML element in quotes for use in jQuery code
	 * unless the supplied element is the Javascript 'this'
	 * object, in which case no quotes are added
	 *
	 * @param	string
	 * @return	string
	 */
	function _prep_element($element)
	{
		if ($element !== 'this')
		{
			$element = '"'.$element.'"';
		}

		return $element;
	}

	// --------------------------------------------------------------------

	/**
	 * Validate Speed
	 *
	 * Ensures the speed parameter is valid for jQuery
	 *
	 * @param	string
	 * @return	string
	 */
	function _validate_speed($speed)
	{
		if (in_array($speed, array('slow', 'normal', 'fast')))
		{
			return '"'.$speed.'"';
		}
		elseif (preg_match('/[^0-9]/', $speed))
		{
			return '';
		}

		return $speed;
	}

}

/* End of file Javascript_jquery.php */
/* Location: ./system/libraries/Javascript/drivers/Javascript_jquery.php */
