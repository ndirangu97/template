<?php




$name=$DATA_OBJECT->name;

$sql=false;
$mess="";

$sql="SELECT * FROM staff WHERE name LIKE '%$name%' ";
$results=$DB->read($sql,[]);
if (is_array($results)) {
    foreach ($results as $row) {
        $mess.="
        <a href='./moreStaff.php?uid=$row->userid' style='text-decoration:none;color:inherit'>
        <div class='card'>
        <img src='$row->img' style='width: 100px; height: 100px; border-radius: 50%' />
        <div class='container'>
          <p><b>$row->name</b> </p>
          <p>ICT senetor</p>
        </div>
    </div>
        </a>
        ";
    }
   
    
}else {
    $mess.="No staff with such name";
}
$info->message =$mess;
$info->type = "name";
echo json_encode($info);
