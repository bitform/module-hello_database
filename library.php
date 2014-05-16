<?php


/**
 * Returns the random numbers stored in the module_hello_database table.
 *
 * @return array
 */
function hd_get_rand_nums()
{
  global $g_table_prefix;

  $query = mysql_query("
    SELECT *
    FROM   {$g_table_prefix}module_hello_database
    ORDER by row_id
      ");

  $numbers = array();
  while ($row = mysql_fetch_assoc($query))
  	$numbers[] = $row["random_number"];

  return $numbers;
}
