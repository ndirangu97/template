<?php

$query=false;
$i=$DATA_OBJECT->id;
$t=1;
$y=date('Y');

    $query="UPDATE students SET transferred =$t,yeartransferred='$y' WHERE userid='$i'";

        $write=$DB->write($query,[]);
        if ($write) {
                echo'good';
        }else{
            echo 'bad';
        }    