<?php

/**
 * The "Hello Database!" uninstallation function. This is automatically called by Form Tools when the
 * administrator de-installs the script.
 */
function hello_database__uninstall($module_id)
{
  global $g_table_prefix;

  mysql_query("DROP TABLE {$g_table_prefix}module_hello_database");
  mysql_query("DELETE FROM {$g_table_prefix}settings WHERE module = 'hello_database'");

  return array(true, "");
}
