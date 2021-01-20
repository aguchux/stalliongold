<?php




//FORM POSTS//
//Login post
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
            "password" => $_POST['password'],
            "dateofbirth" => $_POST['dateofbirth'],
            "country" => $_POST['country']
        )
    );

    if ($updated) {
        $Template->store("message", "Profile Update successful");
        $Template->redirect("/database/viewprofile");
    } else {
        $Template->store("message", "PRofile update failed");
        $Template->redirect("/database/editprofile");
    }
}, 'POST');
