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
            "password" => $_POST['password'],
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


$Route->add('/forms/admin_database/changepassword', function () {

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
        $Template->redirect("/admin_database/database");
    } else {
        $Template->store("message", "Password Update failed");
        $Template->redirect("/admin_database/edit_password");
    }
}, 'POST');