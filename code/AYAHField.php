<?php

require_once(dirname(__FILE__) . '/../thirdparty/ayah.php');        

class AYAHField extends SpamProtectorField {
    protected $ayah = null;
    
    public static $publisher_key = '';
    public static $scoring_key = '';
    public static $web_service_host = 'ws.areyouahuman.com';
    
    function __construct($name = 'AYAHField', $title = null, $value = null, $form = null, $rightTitle = null) {
        parent::__construct($name, $title, $value, $form, $rightTitle);

        $this->ayah = new AYAH\AYAH(array(
            'publisher_key' => self::$publisher_key,
            'scoring_key' => self::$scoring_key,
            'web_service_host' => self::$web_service_host
        ));
    }
    
    function validate($validator) {
        $score = $this->ayah->scoreResult();
        if ($score)
            return true;
        
        if ($validator)
            $validator->validationError($this->Name(), 'You have failed the human test!', "required");
        return false;
    }
    
    function jsValidation() {
        return false;
    }
   
    function Field($properties = array()) {              
        Requirements::css('areyouahuman/css/AYAHField.css');
        
        return $this->ayah->getPublisherHTML();
    }
}


?>
