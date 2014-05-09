<?php
/** Mustache view helper for CakePHP
 * 
 * 2011 BetterLesson Inc.
 * Andrew Drane
 * Jonathan Hendler
 * 
 * Process and render Mustache templates into your CakePHP application.
 * 
 * Requires that the Mustache.php library is copied to your Vendor directory
 * Available from:
 * https://github.com/bobthecow/mustache.php/
 * 
 * 
 * A few conventions:
 * 
 * Replace / in an element path with __ - taht way Javascript can deal with it.
 * 
 * Element: the name of the element - like you would use in CakePHP, but replace '/' with '__'
 *  For example users__name corresponds to app/views/elements/users/name.mustache
 * 
 * Template: the text string from an element, which is read from the element file.
 *  This is what gets passed into Mustache for conversion to HTML
 * 
 * Partials: elements called within elements. To include an element call within
 *  your element, simply use the element convention in the proper context! 
 *  Mustache takes care of the Data context
 * 
 * 
 * 
 */

class MustacheHelper extends AppHelper {
    var $ext = 'mustache'; //Extention for the templates. 'mustache' unless noted otherwise
    var $partials = array(); //recursively loaded partials. Save as class variable so we don't need to double-load
   
  	public function __construct(View $View, $options = array()) {
  		parent::__construct($View, $options);
      // include the mustache namespace autoloader
      //App::import('Vendor', 'PhpExcel', array('file' => 'phpoffice' . DS . 'phpexcel' . DS . 'Classes' . DS . 'PHPExcel' . DS . 'IOFactory.php'));
      App::import('Vendor', 'Mustache', array('file' => 'Mustache.mustache' . DS . 'src' . DS . 'Mustache' . DS . 'Autoloader.php'));
      Mustache_Autoloader::register();
      
      $this->View = $View;

      $viewPath = App::path('View');
      $viewPath = $viewPath[0];
      
      $viewPath = $this->checkPluginPath($viewPath);
      $partialsPath = $viewPath.'Elements';
      $this->m = new Mustache_Engine(array(
        'partials_loader' => new Mustache_Loader_FilesystemLoader($partialsPath),
      ));
  	}

  	/**
  	 * Take a path as default, and check if we should be looking in a plugin for elements instead.
  	 */
  	private function checkPluginPath($viewPath, $elementFile = null) {
    	
    	// check if we're in plugin and change partials path if we are      
      if ($plugin = $this->View->plugin) {
        $pluginPath = App::path('Plugin');
        $pluginPath = $pluginPath[0];
        
        $pluginElementPath = $pluginPath.$plugin.'/View/';
        
        if ($elementFile and $this->checkPluginElement($pluginElementPath.'Elements/'.$elementFile)) {
          $viewPath = $pluginPath.$plugin.'/View/';
        }
      }
      return $viewPath;
    	
  	}
  
  
  	private function checkPluginElement($elementPath) {
    	if (!file_exists($elementPath)) {
        $viewPath = App::path('View');
        $viewPath = $viewPath[0];
	      $this->m = new Mustache_Engine(array(
          'partials_loader' => new Mustache_Loader_FilesystemLoader($viewPath),
        ));
        return false;
    	} else {
      	return true;	
    	}
  	}
  	
    /** Returns the rendered template as HTML. 
     * All variables should be 'set' by the CakePHP Controller
     *
     * @param string $element - element location, no extention (e.g. 'users/course')
     * @param array $values - passed in values that are merged with the view variables. Associative array
     * @return string - HTML from the Mustache template
     */
    function render($element, $values = array()) {
            
        try {
            // get the template text. Also recursively loads all partials
            $template = $this->_loadTemplate($element);
            // generate the HTML
            $result = $this->m->render($template, am($this->_View->viewVars, $values), $this->partials);
            
        } catch ( Exception $e ) {
            debug( $e );
            return false;
        }
        
        return $result;
    }
    
    /** Return the JSON encoded template and sub-templates with an optional 
     * callback. Used to put the templates directly into a script tag
     *
     * @param type $template
     * @param type $callback
     * @return type 
     */
    function getJSONPTemplates( $element, $callback = false ) {
        $template = $this->_loadTemplate( $element );
        $this->partials[ $element ] = $template; //make sure everything comes back
        if( $callback ) {
            return sprintf('%s(%s);', $callback, json_encode( $this->partials ) );
        } else {
            return json_encode( $this->partials );
        }
    }
    
    /** Get the text of a single template. Public wrapper for _loadtemplate. 
     * Does NOT get sub templates
     *
     * @param type $element
     * @return type 
     */
    function getSingleTemplate( $element ) {
        return $this->_loadTemplate( $element, false );
    }
    
    
    /** Get the path to an element file. Will have the extension provided above
     * Ensures we are getting a .mustache file from the elements directory
     *
     * @param string $element - relative path from the elements folder
     * @return string - system path to the element for PHP fread functions
     */
    private function _getElementPath( $element ) {
        $element = str_replace('__', '/', $element);
        $app_path = App::path('View');
        $app_path = $app_path[0];
        $elementFile = $element . '.' . $this->ext;
        
        $app_path = $this->checkPluginPath($app_path, $elementFile);
        
        return $app_path . 'Elements' . DS . $elementFile;
    }
       
    
    /** Load an element file. Make sure it exists and debug a warning if not
     *
     * @param string - $element relative path from the elements folder
     * @return string - template string for rendering with Mustache
     */
    private function _loadTemplate( $element, $load_sub_templates = true ) {

        $path = $this->_getElementPath($element);      
        //fail nicely if we have a bad file
        if(!file_exists( $path ) ) {
            debug( "Bad template path: $path" ); 
            return '';
        }

        //read the file contents
        $template_file = fopen( $path, 'r' );
        $template = fread( $template_file, filesize( $path ) );
        //load any partials
        if($load_sub_templates) {
          $this->_loadPartials($template);
        }
        return $template;
    }
    
    
    /** Loads partials recursively from an element. 
     * Allows sub-template rendering
     *
     * @param string $template - template string.
     */
    private function _loadPartials( $template ) {
        //Extract names of any partials from the template
        preg_match_all( '#\{\{\>([^\}]+)\}\}#', $template, $partials );
        // iterate through the partials
        // adds the corresponding templates to the partials list while avoiding duplicates
        // _loadTemplate will call _loadPartials to get the full list of templates
        foreach ( $partials[1] as $partial ) {
            if ( !isset( $this->partials[$partial]) ) {
                $this->partials[$partial] = $this->_loadTemplate( $partial );
            }
        }
     }
}
