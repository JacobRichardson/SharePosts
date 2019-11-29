<?php

    // Redirect function.
    function redirect ($page) {

        // Redirect to the page.
        header('location: ' . URLROOT . '/' . $page);
    }
?>