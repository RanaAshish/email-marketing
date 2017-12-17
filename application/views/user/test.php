<?php
    header('content-type:image/jpeg');
    $name = "template/BasicTemplate/".$userid."/emailMarketing.jpeg";
    $img = fopen($name,"rb");
    fpassthru($img);
?>