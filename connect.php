<?php
$con = mysqli_connect('localhost','root', '', 'mystore');
if($con)
{
    echo "Success";
}
else{
    echo "Not";
    die();
}
?>