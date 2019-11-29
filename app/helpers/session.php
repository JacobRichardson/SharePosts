<?php

// Invoke session start to start using sessions.
session_start();

// Flash function.
function flash ($name = '', $message = '', $class = 'alert alert-success') {

    // If name is not empty.
    if (!empty($name)) {

        // If the message is not empty and the there isn't already a message set for that name.
        if(!empty($message) && empty($_SESSION[$name])) {

            // If name is not empty on the session.
            if(!empty($_SESSION[$name])) {

                // Remove it.
                unset($_SESSION[$name]);
            }

            // If the class name is not empty on the session.
            if(!empty($_SESSION[$name . '_class'])) {

                // Remove it.
                unset($_SESSION[$name . '_class']);
            }

            // Set the message under the name property.
            $_SESSION[$name] = $message;

            // Set the class under the name of message with '_class' added to it.
            $_SESSION[$name . '_class'] = $class;
        }
        // If the message is empty and there is a name set on the session.
        else if (empty($message) && !empty($_SESSION[$name])) {

            // Set class equal to the value if it exists on session else set it to empty quotes.
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';

            // Echo out the html for the div with the class and the message.
            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';

            // Remove the message.
            unset($_SESSION[$name]);

            // Remove the class.
            unset($_SESSION[$name . '_class']);
        }
    }
}

?>