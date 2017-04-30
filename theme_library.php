<?php

/**
 * @file
 * Provides information about external libraries.
 */


/**
 * Class theme_library.
 */
class theme_library {

  /**
   * Return information about external libraries.
   */
  function config() {
    // Google Code Prettify
    $libraries['code-prettify'] = array(
      'name'         => 'Google Code Prettify',
      'vendor_url'   => 'https://github.com/google/code-prettify',
      'download_url' => 'https://github.com/google/code-prettify/releases/download/2013-03-04/prettify-small-4-Mar-2013.tar.bz2',
      'version'      => '2013-03-04',
      'files'        => array(
        'js'  => array(
          'js/prettify.js' => array(
            'zone' => 2,
            'type' => 'url',
          ),
        ),
        'css' => array(
          'css/prettify.css' => array(
            'zone' => 2,
          ),
        ),
      ),
    );

    // jQuery Appear.
    $libraries['jquery.appear'] = array(
      'name'              => 'jQuery Appear',
      'vendor_url'        => 'https://github.com/morr/jquery.appear',
      'download_url'      => 'https://github.com/morr/jquery.appear/archive/0.3.6.zip',
      'version_arguments' => array(
        'file'    => 'package.json',
        // "version": "0.3.5"
        'pattern' => '/"(\d\.\d+\.\d+)"/',
        'lines'   => 15,
      ),
      'files'             => array(
        'js' => array(
          'jquery.appear.js' => array(
            'zone' => 2,
            'type' => 'url',
          ),
        ),
      ),
    );

    // animate.css
    $libraries['animate.css'] = array(
      'name'              => 'Animate.css',
      'vendor_url'        => 'https://github.com/daneden/animate.css',
      'download_url'      => 'https://github.com/daneden/animate.css/archive/3.5.2.zip',
      'version_arguments' => array(
        'file'    => 'package.json',
        'pattern' => '/"(\d\.\d+\.\d+)"/',
        'lines'   => 10,
      ),
      'files'             => array(
        'css' => array(
          'animate.css' => array(
            'zone' => 2,
          ),
        ),
      ),
    );

    return $libraries;
  }

}
