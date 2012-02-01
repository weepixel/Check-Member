<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * Wee Pixel Check Member Plugin
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Plugin
 * @author		Steve Abraham - Wee Pixel
 * @link		http://weepixel.com
 */

$plugin_info = array(
	'pi_name' => 'Check Member',
	'pi_version' => '1.0',
	'pi_author' => 'Steve Abraham - Wee Pixel',
	'pi_author_url' => 'http://weepixel.com/',
	'pi_description' => 'Checks to see if a member exists.',
	'pi_usage' => Wp_check_member::usage()
	);

class Wp_check_member {
	
	var $return_data = "";

	function __construct() {
		$this->EE =& get_instance();
		$member = $this->EE->TMPL->fetch_param('member');
		
		$query = $this->EE->db->query("SELECT * FROM exp_members WHERE username = '".$this->EE->db->escape_str($member)."'");

		if ($query->num_rows() == 0)
		{
		    $this->return_data = FALSE;
		} else {
			$this->return_data = TRUE;
		}

	}
	
	// ----------------------------------------------------------------
	
	/**
	 * Plugin Usage
	 */
	
	static function usage() {
		ob_start();
		?>
		To follow...
        <?php
		$buffer = ob_get_contents();
		
		ob_end_clean();
		
		return $buffer;
	}
}

/* End of file pi.wp_check_member.php */ 