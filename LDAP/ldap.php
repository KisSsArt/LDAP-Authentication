<?php

$ini;

function init_ldap_server_connection()
{
	global $ini;
	
	$ini = parse_ini_file('ldap_setup.ini');
	
	function debug_ini_file()
	{
		global $ini;

		print($ini['ldap_host']." ".$ini['dc1']." ".$ini['dc2']."<br>");
	}
	
	function connect_to_ldap($username, $password)
	{
		global $ini;
		
		$ldap = ldap_connect($ini['ldap_host']) or die("cant connect to ldap server!");
	
		ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);

		$dn = "cn={$username},ou=People,dc={$ini['dc1']},dc={$ini['dc2']}";

		return ldap_bind($ldap, $dn, $password) or die("cant bind!");
	}
}

?>