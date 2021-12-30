dd<?php

$host = "localhost";
$root = "root";
$root_password = "";

$db = 'data';
$table = 'blogs';

$body1 = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas aut, temporibus, necessitatibus aliquid fugit molestiae quia praesentium ipsum porro, modi illo voluptatibus doloribus quos vitae perferendis laborum. Doloribus, dolores? Delectus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas aut, temporibus, necessitatibus aliquid fugit molestiae quia praesentium ipsum porro, modi illo voluptatibus doloribus quos vitae perferendis laborum. Doloribus, dolores? Delectus. ";
$body2 = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum temporibus quis fugiat laboriosam aperiam provident quod ullam odio cumque. Quis animi maxime reiciendis nam vel consequatur porro culpa, laborum suscipit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum temporibus quis fugiat laboriosam aperiam provident quod ullam odio cumque. Quis animi maxime reiciendis nam vel consequatur porro culpa, laborum suscipit! ";
$body3 = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit temporibus architecto in adipisci delectus hic officiis dolorum tempore tempora magnam laborum pariatur ea quasi, ullam magni maiores laudantium! Officia, consequuntur? Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit temporibus architecto in adipisci delectus hic officiis dolorum tempore tempora magnam laborum pariatur ea quasi, ullam magni maiores laudantium! Officia, consequuntur? ";
$body4 = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta obcaecati mollitia aliquid debitis ipsam reprehenderit sint rerum architecto, aspernatur maiores harum. Beatae ab vero quaerat aliquam nihil! Architecto, quasi cumque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta obcaecati mollitia aliquid debitis ipsam reprehenderit sint rerum architecto, aspernatur maiores harum. Beatae ab vero quaerat aliquam nihil! Architecto, quasi cumque. ";
$body5 = "This is a test post done using the blog app.";
$body6 = "This post is done to test the user session var fix.";

$blogPosts = array(
    array(
        "title" => "who is you?",
        "body" => $body1,
        "user" => "shaista
    ),
    array(
        "title" => "what you do?",
        "body" => $body2,
        "user" => "work"
    ),
    array(
        "title" => "Where are you from?",
        "body" => $body3,
        "user" => "Hyderabad"
    ),
   );

try {
    $dbh = new PDO("mysql:host=$host", $root, $root_password);

    try {
        // check if db exists
        $dbh->exec("CREATE DATABASE $db");
    } catch (PDOException $e) {
        $dbh->exec("DROP DATABASE $db");
        $dbh->exec("CREATE DATABASE $db");
    }

    $dbh->exec("USE $db");
    $dbh->exec("CREATE TABLE $table ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `user` VARCHAR(255) NOT NULL, `body` TEXT NOT NULL , `createdAt` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`))");

    foreach ($blogPosts as $post) {
        ["title" => $title, "body" => $body, "user" => $user] = $post;
        // echo $body;
        $dbh->exec("INSERT INTO $table (title, body, user) VALUES ('$title','$body', '$user')");
    }

    echo "<h1>Database configured!</h1>";
} catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}
