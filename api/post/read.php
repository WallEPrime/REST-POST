<?php

    //headers

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    //Instance & Connect

    $database = new Database();
    $db = $database->connect();

    // Instantiate meet

    $post = new Post($db);

    // Blog Post Query

    $result = $post->read();
    
    // Get row count 

    $num = $result->rowCount();


    if($num > 0) {

            //Post array

        $post_arr = array();
        $posts_array['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $post_item = array(
              
                //add columns
            );

            //push to "data"

            array_push($posts_array['data'], $post_item);
        }

        //turn it to json & output

        echo json_encode($posts_array);

    } else {
        // No posts
            echo json_encode(array('message'=> ' No data'));


    }