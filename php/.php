<?php
    if(!session_id()){
        echo 'you have to be registred';
    }

    print_r(session_id());
?>