<?php
$con = mysqli_connect("localhost", "root", "", "certificate");
$res = mysqli_query($con, "select * from students where status=0 limit 1"); #0 wale ko nikalo then one kar do
if (mysqli_num_rows($res) > 0) {
    $image = imagecreatefromjpeg("Certificate.jpg");
    $font = dirname(__FILE__) . '\Aspire.ttf';
    $color = imagecolorallocate($image, 19, 21, 22);
    while($row=mysqli_fetch_assoc($res)){
    $name = $row['Name'];
    $course= $row['Course'];
    $teacher = $row['Teacher'];
    imagettftext($image, 50, 0, 450, 500, $color, $font, $name);
    imagettftext($image, 25, 0, 70, 490, $color, $font, $course);
    imagettftext($image, 25, 0, 70, 620, $color, $font, $teacher);
    $id = $row['Id'];
    $file=time().'_'.$id;
    imagejpeg($image, "Hello.jpg");
    imagedestroy($image);
    $update_query = "UPDATE `students` SET `status`=0 WHERE `Id` = $id";
    echo $update_query;
    mysqli_query($con, $update_query);
}
}
