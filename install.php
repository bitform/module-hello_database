<?php

/**
 * The "Hello Database!" installation function. This is automatically called by Form Tools on installation.
 */
function hello_database__install($module_id)
{
  global $g_table_prefix;

  mysql_query("
		CREATE TABLE {$g_table_prefix}module_hello_database (
		  row_id smallint(5) unsigned NOT NULL auto_increment PRIMARY KEY,
		  random_number smallint(5)
		  ) ENGINE=InnoDB
		");

	// populate the database with some random numbers
  for ($i=1; $i<=10; $i++)
  {
  	$random_number = mt_rand(1, 1000);

  	mysql_query("
			INSERT INTO {$g_table_prefix}module_hello_database (random_number)
			VALUES ($random_number)
  	");
  }

  return array(true, "");
}
