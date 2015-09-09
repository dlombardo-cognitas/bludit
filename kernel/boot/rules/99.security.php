<?php defined('BLUDIT') or die('Bludit CMS.');

// ============================================================================
// Variables
// ============================================================================

// ============================================================================
// Functions
// ============================================================================

// ============================================================================
// Main before POST
// ============================================================================

// ============================================================================
// POST Method
// ============================================================================

if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	$token = isset($_POST['token']) ? Sanitize::html($_POST['token']) : false;

	if( !$Security->validateToken($token) )
	{
		Log::set(__METHOD__.LOG_SEP.'Error occurred when trying validate the token. Token ID: '.$token);

		// Destroy the session.
		Session::destroy();

		// Redirect to login panel.
		Redirect::page('admin', 'login');
	}
	else
	{
		unset($_POST['token']);
	}
}

// ============================================================================
// Main after POST
// ============================================================================