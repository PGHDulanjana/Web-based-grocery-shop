<?php
    try{
        $con = new mysqli('localhost','root','','group_project');
    }catch(mysql_exception){
        die('Error detected !');
    }
?>