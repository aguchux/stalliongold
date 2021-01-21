<?php




//FORM POSTS//
//edit profile post
$Route->add('/forms/database/editprofile', function () {

    $Mysqli = new Apps\MysqliDb;

    $Template = new Apps\Template;
    $Template->store("message", "");
    $user_id = $Template->storage('username');

    //Insert the values into the database table

    $Mysqli->where('username', $user_id);
    $updated = $Mysqli->update(
        "members",
        array(
            "fullname" => $_POST['fullname'],
            "email" => $_POST['email'],
            "dateofbirth" => $_POST['dateofbirth'],
            "country" => $_POST['country']
        )
    );

    if ($updated) {
        $Template->store("message", "Profile Update successful");
        $Template->redirect("/database/viewprofile");
    } else {
        $Template->store("message", "Profile Update failed");
        $Template->redirect("/database/editprofile");
    }
}, 'POST');


$Route->add('/forms/database/changepassword', function () {

    $Mysqli = new Apps\MysqliDb;

    $Template = new Apps\Template;
    $Template->store("message", "");
    $user_id = $Template->storage('password');

    //Insert the values into the database table

    $Mysqli->where('password', $user_id);
    $updated = $Mysqli->update(
        "members",
        array(
            "password" => $_POST['new_password'],
        )
    );

    if ($updated) {
        $Template->store("message", "Password Update successful");
        $Template->redirect("/database/viewprofile");
    } else {
        $Template->store("message", "Password Update failed");
        $Template->redirect("/database/editprofile");
    }
}, 'POST');


$Route->add('/database/merge_process', function(){

    $Mysqli = new Apps\MysqliDb;
    $Template = new Apps\Template;

    $cur_user_id = $Template->storage('user_id');

	//The path to store the uploaded image
	$target = "_store/uploads/".basename($_FILES['mgphoto']['name']);
	$imageFileType = pathinfo($target,PATHINFO_EXTENSION);

	//Insert the values into the database table
	$user_id = $_POST['user_id'];
	$mgGoldAmt = $_POST['mgGoldAmt'];
	$mgGoldCurr = $_POST['mgGoldCurr'];
	$mgfullname = $_POST['mgfullname'];
	$mgemail = $_POST['mgemail'];
	$mgdateofbirth = $_POST['mgdateofbirth'];
	$mgaddress = $_POST['mgaddress'];
    $mgphoto = $_FILES['mgphoto']['name'];

	//Make sure file type is image
	if (preg_match("!image!", $_FILES['mgphoto']['type'])) {
		
		//Uploading image into uploads/ folder and redirect to register_success.php page
		if (move_uploaded_file($_FILES['mgphoto']['tmp_name'], $target)) {
					
			$result = (int)$Mysqli->insert("merge", array(
				"user_id" => $cur_user_id,
				"mgGoldAmt" => $mgGoldAmt,
				"mgGoldCurr" => $mgGoldCurr,
				"mgfullname" => $mgfullname,
				"mgemail" => $mgemail,
				"mgdateofbirth" => $mgdateofbirth,
				"mgaddress" => $mgaddress,
				"mgphoto" => $mgphoto
            ));
            if($result){
                $row['message'] = "Merge successful!";
                $Template->redirect("/database/merge");
            }
            $Template->redirect("/database/merge_form");
		}
		else {
            $row['message'] = "File upload and Merge failed!";
            $Template->redirect("/database/merge_form");
		}
	}
	else {
        $row['message'] = "Please, only upload JPG, PNG or GIF images!";
        $Template->redirect("/database/merge_form");
	}

}, 'POST');