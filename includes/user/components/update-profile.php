<?php
include_once '../../../includes/db_connect.php';
include_once '../../../includes/functions.php';
sec_session_start();

?>
<?php
    ini_set("display_errors",1);
    $temp=$_SESSION['username'];
    echo $temp;
    if(isset($_POST)){
        require '../../../includes/database.php';
        $Destination = '../../../memberfiles/background-images';
        if(!isset($_FILES['BackgroundImageFile']) || !is_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'])){
            $BackgroundNewImageName= 'default.jpg';
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['BackgroundImageFile']['name']));
            $ImageType = $_FILES['BackgroundImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $BackgroundNewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        $sql1="UPDATE member_profiles SET member_backgroundpicture='$BackgroundNewImageName' WHERE username = '$temp'";
        $sql2="INSERT INTO member_profiles (member_backgroundpicture) VALUES ('$BackgroundNewImageName') WHERE username = '$temp'";
        $result = mysqli_query($database,"SELECT * FROM member_profiles WHERE username = '$temp'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['BackgroundImageFile']['name'])){
                mysqli_query($database,$sql1)or die(mysqli_error($database));
                header("location:../../../user/edit-profile.php?user_username=$temp");
            }
        } 
        else {
            mysqli_query($database,$sql2)or die(mysqli_error($database));
            header("location:../../../user/edit-profile.php?user_username=$temp");
        }
        $Destination = '../../../memberfiles/avatars';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'default.png';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum   = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        $sql5="UPDATE member_profiles SET member_avatar='$NewImageName' WHERE username = '$temp'";
        $sql6="INSERT INTO member_profiles (member_avatar) VALUES ('$NewImageName') WHERE username = '$temp'";
        $result = mysqli_query($database,"SELECT * FROM member_profiles WHERE username = '$temp'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['ImageFile']['name'])){
                mysqli_query($database,$sql5)or die(mysqli_error($database));
                header("location:../../../user/edit-profile.php?username=$temp");
            }
        } 
        else {
            mysqli_query($database,$sql6)or die(mysqli_error($database));
            header("location:../edit-profile.php?username=$temp");
        }  
        $member_firstname=$_REQUEST['member_firstname'];
        $member_lastname=$_REQUEST['member_lastname'];
        $email=$_REQUEST['member_email'];
        $password=$_REQUEST['member_password'];
        $member_profession=$_REQUEST['member_profession'];
        $member_address=$_REQUEST['member_address'];
        $member_shortbio=$_REQUEST['member_shortbio'];   
        $member_longbio=$_REQUEST['member_longbio'];   
        $member_dob=$_REQUEST['member_dob'];
        $member_gender=$_REQUEST['member_gender'];
        $member_country=$_REQUEST['member_country'];
        $member_website=$_REQUEST['member_website'];
        $member_facebook=$_REQUEST['member_facebook'];
        $member_twitter=$_REQUEST['member_twitter'];
        $member_googleplus=$_REQUEST['member_googleplus'];
        $member_skype=$_REQUEST['member_skype'];
        $member_github=$_REQUEST['member_github'];
        $member_youtube=$_REQUEST['member_youtube'];
        $member_vimeo=$_REQUEST['member_vimeo'];
        $member_pinterest=$_REQUEST['member_pinterest'];
        $sql3="UPDATE member_profiles SET member_firstname='$member_firstname',member_lastname='$member_lastname',member_profession='$member_profession',member_address='$member_address',email='$email',password='$password',member_shortbio='$member_shortbio',member_longbio='$member_longbio',member_dob='$member_dob',member_gender='$member_gender',member_country='$member_country',member_website='$member_website',member_facebook='$member_facebook',member_twitter='$member_twitter',member_googleplus='$member_googleplus',member_skype='$member_skype',member_github='$member_github',member_youtube='$member_youtube',member_vimeo='$member_vimeo',member_pinterest='$member_pinterest' WHERE username = '$temp'";
            mysqli_query($database,$sql3)or die(mysqli_error($database));
            header("location:../../../user/edit-profile.php?username=$temp&request=profile-update&status=success");
    }    
?>