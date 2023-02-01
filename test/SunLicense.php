<?php

//error_reporting(E_ALL);
//ini_set('display_errors', TRUE);

/**
 * SunLicense Class
 *
 * @category  License Key Generator
 * @package   SunLicense
 * @author    Mehmet Selcuk Batal <batalms@gmail.com>
 * @copyright Copyright (c) 2022, Sunhill Technology <www.sunhillint.com>
 * @license   https://opensource.org/licenses/lgpl-3.0.html The GNU Lesser General Public License, version 3.0
 * @link      https://github.com/msbatal/PHP-License-Key-Generator
 * @version   1.0.2
 */

class SunLicense
{

  /**
   * Prefix to be added to the key
   * @var string
   */
  private $prefix = null;

  /**
   * Template of the key
   * @var string
   */
  private $template = 'X9XX99-XX99-9X9X-99XX9X';

  /**
   * Number of keys to generate
   * @var integer
   */
  private $keyCount = 1;

  /**
   * Generated Keys
   * @var array
   */
  public $keys = [];

  /**
   * @param string $prefix
   * @param string $template
   * @param integer $count
   */
  public function __construct($prefix = null, $template = null, $count = null) {
    set_exception_handler(function($exception) {
      echo '<b>[SunClass] Exception:</b> '.$exception->getMessage();
    });
    if (!empty($prefix)) {
      $this->prefix = $prefix; // prefix to be added to the key
    }
    if (!empty($template)) {
      $this->template = $template; // template of the key
    }
    if (!empty($count) && is_int($count)) {
      $this->keyCount = $count; // number of keys to generate
    }
  }

  /**
   * Generate product license key
   * 
   * @return string 
   */
  private function license() {
    $key = null;
    if (!empty($this->prefix)) {
      $key .= $this->prefix . '-'; // add prefix at beginning of the key
    }
    for ($i = 0; $i < strlen($this->template); $i++) {
      if (preg_match('/[a-zA-Z]/', $this->template[$i])) {
        $key .= chr(rand(65, 90)); // generate letters
      } else if (preg_match('/\d/', $this->template[$i])) {
        $key .= rand(0, 9); // generate numbers
      } else {
        $key .= '-'; // generate symbols
      }
    }
    return $key;
  }

  /**
   * Check if key is generated before
   * 
   * @param string $key
   * @return boolean
   */
  private function check($key = null) {
    if (in_array($key, $this->keys)) {
      return true; // if already generated
    } else {
      return false; // if not generated before
    }
  }

  /**
   * Call main method and return the generated keys
   * 
   * @throws exception
   * @return string|array
   */
  public function generate() {
    $key = null;
    while (!$this->check($key) && count($this->keys) < $this->keyCount) {
      $this->keys[] = $this->license(); // add generated keys into the array
    }
    if (count($this->keys) == 0) {
      throw new Exception('An error occurred while generating the license keys.');
    }
    if (count($this->keys) == 1) {
      return $this->keys[0]; // returns a string (single key)
    } else {
      return $this->keys; // returns an array (multiple keys)
    }
  }

}

?>