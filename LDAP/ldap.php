<?php

$ini;

function init_ldap_server_connection()
{
	global $ini;
	
	$ini = parse_ini_file('ldap_setup.ini');
	
	function find_user_in_ldap($username)
	{
		global $ini;
		
		$ldap = ldap_connect($ini['ldap_host']) or die("cant connect to ldap server!");
	
		ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);

		$filter = "(&(objectclass=account)(uid={$username}))";

		$dn = "dc={$ini['dc1']},dc={$ini['dc2']}";

		$search_result = ldap_search($ldap, $dn, $filter);

		$data = ldap_get_entries($ldap, $search_result);

		parse_str(str_replace(",", "&", $data[0]["dn"]), $out);

		$_POST["ou"] = $out["ou"];

		ldap_close($ldap);
	}
	
	function connect_to_ldap($username, $password, $ou)
	{
		global $ini;
		
		$dn = "cn={$username},ou={$ou},dc={$ini['dc1']},dc={$ini['dc2']}";

		$ldap = ldap_connect($ini['ldap_host']) or die("cant connect to ldap server!");
	
		ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);

		return ldap_bind($ldap, $dn, $password) or die("wrong login or password!");
	}
}

?>
