<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config =
    array(
        // set on "base_url" the relative url that point to HybridAuth Endpoint
        "base_url" => '/members/login/social_login_process',

        "providers" => array(
            "Facebook" => array(
                "enabled" => true,
                "keys" => array("id" => "143418319395289", "secret" => "a0ff4bf27bcc09a22ce3d922f33dc816")
            ),
            "Google" => array(
                "enabled" => true,
                "keys" => array("id" => "633856598391-spkhokj44t9pui2f7dq6qvgeov34bupc.apps.googleusercontent.com", "secret" => "fbWTw8eM43dFa-qtprHUW--1"),
            )
        ),

        // if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
        "debug_mode" => (ENVIRONMENT == 'development'),

        "debug_file" => APPPATH . '/logs/hybridauth.log',
    );


/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */