<?php

/**
 * Created by PhpStorm.
 * User: Daen
 * Date: 6/8/2016
 * Time: 11:06 AM
 */

class connect
{
    public $connsql;

    public function makeconn($arg1){
        $db_name = "mobile";
        $db_user = "rooster_student";
        $db_passwd = "GLURooster";

        // $con = mysqli_connect("localhost",$db_user,$db_passwd,$db_name);
        // $con = mysqli_connect("m.glu.nl",$db_user,$db_passwd,$db_name);
        $con = mysqli_connect("10.11.1.3",$db_user,$db_passwd,$db_name);

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con, $arg1);

        return $result;
    }

}

?>