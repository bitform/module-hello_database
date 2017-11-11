<?php

namespace FormTools\Modules\HelloDatabase;

use FormTools\Core;
use FormTools\Module as FormToolsModule;
use PDO;


class Module extends FormToolsModule
{
    protected $moduleName = "Hello Database";
    protected $moduleDesc = "A simple \"Hello World\" module written for module developers to illustrate the installation, de-installation script and some simple database interaction.";
    protected $author = "Ben Keen";
    protected $authorEmail = "ben.keen@gmail.com";
    protected $authorLink = "https://formtools.org";
    protected $version = "2.0.0";
    protected $date = "2017-11-11";
    protected $originLanguage = "en_us";

    protected $nav = array(
        "module_name" => array("index.php", false)
    );

    /**
     * The "Hello Database!" installation script.
     */
    public function install($module_id)
    {
        $db = Core::$db;

        $db->query("
            CREATE TABLE {PREFIX}module_hello_database (
                row_id smallint(5) unsigned NOT NULL auto_increment PRIMARY KEY,
                random_number smallint(5)
            ) DEFAULT CHARSET=utf8
        ");
        $db->execute();

        // populate the database with some random numbers
        for ($i=1; $i<=10; $i++) {
            $random_number = mt_rand(1, 1000);

            $db->query("
                INSERT INTO {PREFIX}module_hello_database (random_number)
                VALUES ($random_number)
            ");
            $db->execute();
        }

        return array(true, "");
    }


    /**
     * The "Hello Database!" uninstallation function. This is automatically called by Form Tools when the
     * administrator de-installs the script.
     */
    public function uninstall($module_id)
    {
        $db = Core::$db;

        $db->query("DROP TABLE {PREFIX}module_hello_database");
        $db->execute();

        $db->query("DELETE FROM {PREFIX}settings WHERE module = 'hello_database'");
        $db->execute();

        return array(true, "");
    }

    /**
     * Returns the random numbers stored in the module_hello_database table.
     *
     * @return array
     */
    public function getRandNums()
    {
        $db = Core::$db;

        $db->query("
            SELECT random_number
            FROM   {PREFIX}module_hello_database
            ORDER by row_id
        ");
        $db->execute();

        return $db->fetchAll(PDO::FETCH_COLUMN);
    }
}
