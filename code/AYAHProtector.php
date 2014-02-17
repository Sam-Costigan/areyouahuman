<?php
/*
 * AYAH Protector class to handle spam protection with AYAH Module
 */
class AYAHProtector implements SpamProtector {
	
	/**
	 * Return the Field that will be used in this protector
	 * 
	 * @return string
	 */
	function getFormField($name = 'AYAHField', $title = null, $value = null, $form = null, $rightTitle = null) {
		return new AYAHField($name, $title, $value, $form, $rightTitle);
	}
	
	/**
	 * Function required to handle dynamic feedback of the system.
	 * if unneeded just return true
	 *
	 * @return true
	 */
	function sendFeedback($object = null, $feedback = "") {
		return false;
	}
}
