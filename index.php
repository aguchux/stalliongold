<?php


define('DOT', '.');
require_once DOT . "/bootstrap.php";


require_once DOT . "/_public/dashboard.php";
require_once DOT . "/_public/admin_dashboard.php";

//Home page//
$Route->add('/', function () {
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "TITAN GOLD | Home");
    $Template->render("home");
}, 'GET');

$Route->add('/login', function () {
    $Template = new Apps\Template;
    $Template->assign("title", "TITAN GOLD | login");
    $Template->render("login");
}, 'GET');
$Route->add('/register', function () {
    $Template = new Apps\Template;
    $Template->assign("title", "TITAN GOLD | REGISTER");
    $Template->render("register");
}, 'GET');
$Route->add('/register_success', function () {
    $Template = new Apps\Template;
    $Template->assign("title", "TITAN GOLD | Thank You");
    $Template->render("register_success");
}, 'GET');

//About-us, contact-us & services
$Route->add('/{vary}', function ($vary) {
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "TITAN GOLD | ABOUT US");
    $Template->render("{$vary}");
}, 'GET');



//Home page//




//FORM POSTS//
//admin_login
$Route->add('/forms/admin_login', function () {

    $Mysqli = new Apps\MysqliDb;

    $Template = new Apps\Template;
    $Template->store("message", "");

    //Insert the values into the database table

    $username = $_POST['username'];
    $password = $_POST['password'];

    $Mysqli->where('username', $username);
    $row = $Mysqli->getOne("members");
    $passtreu =  ($password == $row['password']);

    //If username and password match, then populate database
    if ($passtreu) {
        $sqli = $Mysqli->insert("login", array(
            "username" => $username
        ));

        //Start some sessions necessary in My Account Profile
        $Template->authorize($row['user_id']);
        $Template->store("user_id", $row['user_id']);
        $Template->store("username", $row['username']);
        $Template->store("fullname", $row['fullname']);
        $Template->store("photo", $row['photo']);

        $Template->redirect("/admin_database/database");
    } else {
        $Template->store("message", "Wrong username/password. Please try again!");
        $Template->redirect("/admin_database/login");
    }
}, 'POST');

//Login post
$Route->add('/forms/login', function () {

    $Mysqli = new Apps\MysqliDb;

    $Template = new Apps\Template;
    $Template->store("message", "");

    //Insert the values into the database table

    $username = $_POST['username'];
    $password = $_POST['password'];

    $Mysqli->where('username', $username);
    $row = $Mysqli->getOne("members");
    $passtreu =  ($password == $row['password']);

    //If username and password match, then populate database
    if ($passtreu) {
        $sqli = $Mysqli->insert("login", array(
            "username" => $username
        ));

        //Start some sessions necessary in My Account Profile
        $Template->authorize($row['user_id']);
        $Template->store("user_id", $row['user_id']);
        $Template->store("username", $row['username']);
        $Template->store("fullname", $row['fullname']);
        $Template->store("photo", $row['photo']);

        $Template->redirect("/database");
    } else {
        $Template->store("message", "Wrong username/password. Please try again!");
        $Template->redirect("/login");
    }
}, 'POST');

//Register Post route
$Route->add('/forms/register', function () {

    $Mysqli = new Apps\MysqliDb;
    $Template = new Apps\Template;

    //The path to store the uploaded image
    $target = "_store/uploads/" . basename($_FILES['photo']['name']);
    $imageFileType = pathinfo($target, PATHINFO_EXTENSION);

    //Insert the values into the database table
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $dateofbirth = $_POST['dateofbirth'];
    $country = $_POST['country'];
    $photo = $_FILES['photo']['name'];

    //Check whether username already exists
    $Mysqli->where("username", $username);
    $row = $Mysqli->getOne("members");
    $count = (int)$row['user_id'];

    if ($count == 0) {

        //The two passwords are equal to each other
        if ($_POST['password'] == $_POST['confirmpassword']) {

            //Make sure file type is image
            if (preg_match("!image!", $_FILES['photo']['type'])) {

                //Uploading image into uploads/ folder and redirect to register_success.php page
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {

                    $result = (int)$Mysqli->insert("members", array(
                        "username" => $username,
                        "fullname" => $fullname,
                        "email" => $email,
                        "password" => $password,
                        "confirmpassword" => $confirmpassword,
                        "dateofbirth" => $dateofbirth,
                        "country" => $country,
                        "photo" => $photo
                    ));

                    if ($result) {
                        $Template->redirect("/register_success");
                    } else {
                        $Template->store('message', "Ops registration failed!");
                        $Template->redirect("/register");
                    }
                } else {
                    $Template->store('message', "File upload and registration failed!");
                    $Template->redirect("/register");
                }
            } else {
                $Template->store('message', "Please, only upload JPG, PNG or GIF images!");
                $Template->redirect("/register");
            }
        } else {
            $Template->store('message', "The two passwords do not match!");
            $Template->redirect("/register");
        }
    } else {
        $Template->store('message', "The username already exists. Please select another username!");
        $Template->redirect("/register");
    }
}, 'POST');


//FORM POSTS//




//DATABASE//

//editprofile, changepassword, tandc, merge....
$Route->add('/database/{page}', function ($page) {
    $Template = new Apps\Template;
    $Template->assign("title", "TITAN GOLD | Account Area");
    $Template->render("databases.{$page}");
}, 'GET');

//DATABASE//

//ADMIN DATABASE

$Route->add('/admin_database/{admin}', function ($admin) {
    $Template = new Apps\Template;
    $Template->assign("title", "TITAN GOLD | Account Area");
    $Template->render("databases.admin-database.{$admin}");
}, 'GET');


//ADMIN DATABASE

//Logout Sessions//
$Route->add(
    '/database/logout',
    function () {
        $Template = new Apps\Template;
        $Template->expire();
        $Template->cleanAll(session_delete_timout);
        $Template->redirect(auth_url);
    },
    'GET'
);
//Logout Sessions//

$Route->run('/');
