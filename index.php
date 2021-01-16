<?php


define('DOT', '.');
require_once DOT . "/bootstrap.php";

//Home page//
$Route->add('/', function () {
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "TITAN GOLD | Home");
    $Template->render("home");
}, 'GET');
$Route->add('/about-us', function () {
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "TITAN GOLD | ABOUT US");
    $Template->render("about-us");
}, 'GET');
$Route->add('/services', function () {
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "TITAN GOLD | SERVICES");
    $Template->render("services");
}, 'GET');
$Route->add('/contact-us', function () {
    $Template = new Apps\Template;
    $Template->addheader("layouts.header");
    $Template->addfooter("layouts.footer");
    $Template->assign("title", "TITAN GOLD | CONTACT-US");
    $Template->render("contact-us");
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
//Home page//




//FORM POSTS//
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

//FORM POSTS//




//ADMIN DATABASE//

$Route->add('/database', function () {
    $Template = new Apps\Template;
    $Template->assign("title", "TITAN GOLD | Account Area");
    $Template->render("database");
}, 'GET');

$Route->add('/database/goldassets', function () {
    $Template = new Apps\Template;
    $Template->assign("title", "TITAN GOLD | Account Area");
    $Template->render("databases.goldassets");
}, 'GET');

$Route->add('/database/changepassword', function () {
    $Template = new Apps\Template;
    $Template->assign("title", "TITAN GOLD | Account Area");
    $Template->render("databases.changepassword");
}, 'GET');

$Route->add('/database/editprofile', function () {
    $Template = new Apps\Template;
    $Template->assign("title", "TITAN GOLD | Account Area");
    $Template->render("databases.editprofile");
}, 'GET');

$Route->add('/database/merge', function () {
    $Template = new Apps\Template;
    $Template->assign("title", "TITAN GOLD | Account Area");
    $Template->render("databases.merge");
}, 'GET');

$Route->add('/database/viewprofile', function () {
    $Template = new Apps\Template;
    $Template->assign("title", "TITAN GOLD | Account Area");
    $Template->render("databases.merge_form");
}, 'GET');


//ADMIN DATABASE//





//Logout Sessions//
$Route->add('/database/logout',
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
