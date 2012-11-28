.. note:: This driver is experimental. Its feature set and implementation
		  may change in future releases. 

#################
Javascript Driver
#################

This Driver provides an interface to Javascript libraries.  Currently only 
the `jQuery library <http://jquery.com/>`_ is supported.  Note that 
CodeIgniter does not require Javascript to run.

Configuration
=============

To use a Javascript library you will need to set a configuration item for
the path to the Javascript library that you'll be using.

	::

		$config['javascript_location'] = 
			'//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js';

	.. note:: The example above uses the `Google CDN 
		<http://developers.google.com/speed/libraries/devguide>`_ 
		(Content Delivery Network) to host the script and there are some
		advantages to doing so: decreased latency, increased parallelism, 
		and better caching.  Notice that leaving the "http:" or "https:" 
		off is intentional as the browser will default to the type of
		page your on.  The Google CDN supports both.

You can set the configuration item in applications/config/config.php, your own
configuration file, or with set_item() calls before you intialize the class.
You can find details on how to set config items in :doc:`Config Library <config>`.
You can also specify the configuration items by passing a 2nd argument when you
load the library, details can be found in :doc:`Loader Class <loader>`.



What you'll need in your controller
===================================

Load the library
----------------
Initialize the Javascript driver in your controller and name the adapter you would 
like to use.

	::

			$this->load->driver('javascript', array('adapter' => 'jquery'));


You may also pass in the options array the javascript location library as well.

	::
	
		$this->load->driver('javascript', array('adapter' => 'jquery', 
			'javascript_location' => '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'));
		

Add Javascript Elements and Compile
-----------------------------------
Add javascript events or effects from the list below as needed and finally
call compile() to make them available to the view.  

	::

			$this->javascript->click('#button', 
				$this->javascript->toggle('#container')
			);
			$this->javascript->compile();

This example sets up a click event for <div id="button"> so that when it's
clicked will toggle the display of  <div id="container">

	.. note:: Currently you must have at least one javascript element 
			present.



What you'll need in your view
=============================

In your HTML <head>
-------------------
Somewhere in the HTML head you'll need to add $library_src whichs contain
the script command to point to your jQuery script and $script_foot will
contain the javascript elements that you defined in the controller.  For
example:


	::

			<head>
			    <?php if (isset($library_src)) echo $library_src;?>
			    <?php if (isset($script_foot)) echo $script_foot;?> 
			</head>

Javascript Methods
==================

$this->javascript->compile()
----------------------------
Creates the variables used in the html header/footer.  The default variables are
$library_src for the pointers to the jquery script and $script_foot for
the javascript elements that you've defined respectively.

$this->javascript->clear_compile()
----------------------------------
Allows you to clear any javascript that has been previously set. The compile() method returns
the output. Calling clear_compile() will allow you to create another block of javascript. You
will need to call the compile() method again to build any javascript that was generated after
clearing it.

$this->javascript->generate_json()
----------------------------------
Can be passed a database result or associative array and returns a JSON formatted string. Accepts
two parameters $result and $match_array_type. $result can be either an result object or array. The
second parameter is boolean if the JSON should return objects as array. The default value is FALSE.

	::
		
		$json = array('foo' => 'bar');
		$this->javascript->generate_json($json);
		
		//Outputs
		{"foo":"bar"}


$this->javascript->script()
---------------------------
Add an additional javascript file to load in your view.
Accepts two parameters $library_src (string) and $relative (bool).

	::

		$this->javascript->script('//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js');
		


Javascript Events
=================

Events are set up using the following syntax.

	::

		$this->javascript->event('selector', handler(), [return]);
		
		
	-  "event" is one of: "blur", "change",	"click", "dblclick", "focus", 
		"error", "hover", "keydown", "keyup", "load", "mousedown", "mouseup", 
		"mouseout", "mouseover", "resize", "scroll", or "unload."

 `See jQuery events <http://api.jquery.com/category/Events/>`_.
		
	-  "selector" is any valid
		`jQuery selector <http://docs.jquery.com/Selectors>`_. 
	-  "handler()" is script you write yourself, or an action such as
		an element from the jQuery Effects.
	-  "return" value is available for the "click" event, an optional third
		parameter maybe passed as a BOOLEAN. The default is **TRUE** which will 
		append a "return false;" statment at the end of the handler.

An example to create a **click** event for the selector **.someClass** you would use:

	::
	
		$this->javascript->click('.someClass', 'alert(".someClass was clicked!")');
		
This example will generate the following javascript:

	::
	
		$(".someClass").click(function(){
			alert(".someClass was clicked!")
			return false;
		});		

Javascript Effects
==================

hide() / show()
---------------

Each of this functions will affect the visibility of an item on your
page. hide() will set an item invisible, show() will reveal it.

	::

		$this->javascript->hide(target, [speed], [callback]);
		$this->javascript->show(target, [speed], [callback]);

	-  "target" will be any valid jQuery selector or selectors.
	-  "speed" **optional** set to either slow, normal, fast, or 
		alternatively a number of milliseconds.
	-  "callback" **optional** A function to be execute when
		finished.


toggle()
--------

toggle() will change the visibility of an item to the opposite of its
current state, hiding visible elements, and revealing hidden ones.

	::

		$this->javascript->toggle(target, [speed], [callback]);


	- "switch" A boolean true/false to show/hide all elements.
	- "target" will be any valid jQuery selector or selectors.
	- "speed" **optional** set to either slow, normal, fast, or 
	  alternatively a number of milliseconds.
	- "callback" **optional** A function to be execute when finished.


animate()
---------
A effect for making custom animations. For a full summary, 
see `http://docs.jquery.com/Effects/animate 
<http://docs.jquery.com/Effects/animate>`_

	::

		 $this->javascript->animate(target, parameters, [speed], [extra]);


	-  "target" will be any valid jQuery selector or selectors.
	-  "parameters" in jQuery would generally include a series of CSS
		properties that you wish to change.
	-  "speed" **optional** set to either slow, normal, fast, or 
		alternatively a number of milliseconds.
	-  "extra" **optional** Can include a callback, or other additional
		information.

This is an example of an animation for <div id="container"> that is
triggered when <div id="button"> is clicked:

	::

		$params = array(
		   'height' => '80',
		   'width' => '50%',
		   'marginLeft' => 125
		);
		
		$this->javascript->click('#button', 
			$this->javascript->animate('#container', $params, 'normal') );
		$this->javascript->compile();

fadeIn() / fadeOut()
--------------------
These effects cause an element(s) to disappear or reappear over time.

	::

		$this->javascript->fadeIn(target,  [speed], [callback]);
		$this->javascript->fadeOut(target,  [speed], [callback]);


	-  "target" will be any valid jQuery selector or selectors.
	-  "speed" **optional** Set to either slow, normal, fast, or  
		alternatively a number of milliseconds.
	-  "callback" **optional** A function to be execute when finished.

slideUp() / slideDown() / slideToggle()
---------------------------------------

These effects cause an element(s) to slide.

	::

		$this->javascript->slideUp(target,  [speed], [callback] );
		$this->javascript->slideDown(target,  [speed], [callback] );
		$this->javascript->slideToggle(target,  [speed], [callback] );


	-  "target" will be any valid jQuery selector or selectors.
	-  "speed" **optional** Set to either slow, normal, fast, or 
		alternatively a number of milliseconds.
	-  "callback" **optional** A function to be execute when finished.


jQuery Attributes
=================

toggleClass()
-------------

This function will add or remove a CSS class for its target.

	::

		$this->javascript->toggleClass(target, class)

	-  "target" will be any valid jQuery selector or selectors.
	-  "class" is any CSS classname. Note that this class must be 
		defined and available in a CSS that is already loaded.
	