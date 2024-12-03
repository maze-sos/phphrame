<?php

namespace Phrame;

defined('CPATH') OR exit('Access Denied!');

/**
 * Phrame class
 */
class Phrame
{

    private $version = '1.0.0';

    public function db($argv)
    {

        $mode    = $argv[1] ?? null;
        $param1  = $argv[2] ?? null;

        switch ($mode) {
            case 'db:create':
                /**check if param1 is empty**/
                if(empty($param1))
                    die("\n\rPlease provide a database name\n\r");

                $db = new Database;
                $query = "create database if not exists ". $param1;
                $db->query($query);

                die("\n\rDatabase created successfully\n\r");
                break;

            case 'db:table':
                /**check if param1 is empty**/
                if(empty($param1))
                    die("\n\rPlease provide a table name\n\r");

                $db = new Database;
                $query = "describe ". $param1;
                $res = $db->query($query);

                if($res)
                {

                    print_r($res);
                }else{
                    echo "\n\rCould not find data for table: $param1\n\r";
                }
                die();

                break;

            case 'db:drop':
                /**check if param1 is empty**/
                if(empty($param1))
                    die("\n\rPlease provide a database name\n\r");

                $db = new Database;
                $query = "drop database ". $param1;
                $db->query($query);

                die("\n\rDatabase deleted successfully\n\r");

                break;
            
            default:
                die("\n\rUnknown command $argv[1]");
                break;
        }
    }

    public function list($argv)
    {
        $mode       = $argv[1] ?? null;

        switch ($mode) {
            case 'list:migrations':

                $folder = 'app'.DS.'migrations'.DS;
                if(!file_exists($folder))
                {
                   die("\n\rNo migration files were found\n\r");
                }

                $files = glob($folder . "*.php");
                echo "\n\rMigration files:\n\r";

                foreach ($files as $file) {
                    echo basename($file) ."\n\r";
                }
                break;
            
            default:
                die("\n\rUnknown command $argv[1]");
                break;
        }
    }

    public function make($argv)
    {
        $mode       = $argv[1] ?? null;
        $classname  = $argv[2] ?? null;

        /**check if class name is empty**/
        if(empty($classname))
            die("\n\rPlease provide a class name\n\r");

        /**clean class name **/
        $classname = preg_replace("/[^a-zA-Z0-9_]+/", "", $classname);
        
        /**check if class name starts with a number**/
        if(preg_match("/^[^a-zA-Z_]+/", $classname))
            die("\n\rClass names cant start with a number\n\r");

        switch ($mode) {
            case 'make:controller':

                $controllerFilename = 'app'.DS.'controllers'.DS.ucfirst($classname) . ".php";
                if(file_exists($controllerFilename))
                    die("\n\rThat controller already exists\n\r");
                
                $sample_file = file_get_contents('app'.DS.'Phrame'.DS.'samples'.DS.'controller-sample.php');
                $sample_file = preg_replace("/\{CLASSNAME\}/", ucfirst($classname), $sample_file);
                $sample_file = preg_replace("/\{classname\}/", strtolower($classname), $sample_file);

                if(file_put_contents($controllerFilename, $sample_file))
                {
                    $viewFilename = 'app' . DS . 'views' . DS . strtolower($classname) . ".phrame.php";
                    if (!file_exists($viewFilename)) {
                        $viewContent = "<!-- View for " . ucfirst($classname) . " -->\n<h1>Welcome to " . ucfirst($classname) . " View</h1>";
                        if (file_put_contents($viewFilename, $viewContent)) {
                            echo "\n\rView created successfully at: $viewFilename\n\r";
                        } else {
                            die("\n\rFailed to create View due to an error\n\r");
                        }
                    }
                    die("\n\rController created successfully at: $controllerFilename\n\r");
                }else{ 
                    die("\n\rFailed to create Controller due to an error\n\r");
                }

                break;

            case 'make:model':

                $modelFilename = 'app'.DS.'models'.DS.ucfirst($classname) . ".php";
                if(file_exists($modelFilename))
                    die("\n\rThat model already exists\n\r");

                $sample_file = file_get_contents('app'.DS.'Phrame'.DS.'samples'.DS.'model-sample.php');
                $sample_file = preg_replace("/\{CLASSNAME\}/", ucfirst($classname), $sample_file);
                
                /** only add as 's' at the end of table name if it doesnt exist**/
                if(!preg_match("/s$/", $classname))
                    $sample_file = preg_replace("/\{table\}/", strtolower($classname) . 's', $sample_file);

                if(file_put_contents($modelFilename, $sample_file))
                {
                    die("\n\rModel created successfully at: $modelFilename\n\r");
                }else{
                    die("\n\rFailed to create Model due to an error\n\r");
                }
                break;
            case 'make:migration':

                $folder = 'app'.DS.'migrations'.DS;

                if(!file_exists($folder))
                {
                    mkdir($folder,0777,true);
                }

                $modelFilename = $folder . date("jS_M_Y_H_i_s_") . ucfirst($classname) . ".php";
                if(file_exists($modelFilename))
                    die("\n\rThat migration file already exists\n\r");

                $sample_file = file_get_contents('app'.DS.'Phrame'.DS.'samples'.DS.'migration-sample.php');
                $sample_file = preg_replace("/\{CLASSNAME\}/", ucfirst($classname), $sample_file);
                $sample_file = preg_replace("/\{classname\}/", strtolower($classname), $sample_file);
                
                if(file_put_contents($modelFilename, $sample_file))
                {
                    die("\n\rMigration file created: " . basename($modelFilename) . " \n\r");
                }else{
                    die("\n\rFailed to create Migration file due to an error\n\r");
                }
                break;
            
            default:
                die("\n\rUnknown command $argv[1]");
                break;
        }
    }

    public function migrate($argv)
    {

        $mode       = $argv[1] ?? null;
        $modelFilename   = $argv[2] ?? null;

        $modelFilename = "app".DS."migrations".DS.$modelFilename;
        if(file_exists($modelFilename))
        {
            require $modelFilename;

            preg_match("/[a-zA-Z]+\.php$/",$modelFilename, $match);
            $classname = str_replace(".php","",$match[0]);

            $myclass = new ("\Phrame\\$classname")();

            switch ($mode) {
                case 'migrate':
                    $myclass->up();
                    echo ("\n\rTables created successfully\n\r");
                    
                    break;
                case 'migrate:rollback':
                    $myclass->down();
                    echo ("\n\rTables removed successfully\n\r");
                    
                    break;
                case 'migrate:refresh':
                    $myclass->down();
                    $myclass->up();
                    echo ("\n\rTables refreshed successfully\n\r");
                    
                    break;
                
                default:
                    $myclass->up();
                    echo ("\n\rTables created successfully\n\r");
                    break;
            }
            
        }else{
            die("\n\rMigration file could not be found\n\r");
        }

        echo "\n\rMigration file run successfully: " . basename($modelFilename) . " \n\r";
    }

    public function help()
    {
        echo "

    Phrame v$this->version Command Line Tool

    Database
      db:create          Create a new database schema.
      db:table           Retrieves information on the selected table.
      db:drop            Drop/Delete a database.
      migrate            Locates and runs a migration file.
      migrate:refresh    Runs the 'down' & then 'up' method for a migration file.
      migrate:rollback   Runs the 'down' method for a migration file.

    Generators
      make:controller    Generates a new controller and corresponding view file.
      make:model         Generates a new model file.
      make:migration     Generates a new migration file.
    
    Other
      list:migrations    Displays all migration files available.
            
        ";
    }
}