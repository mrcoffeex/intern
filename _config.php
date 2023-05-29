<?php

    session_start();

    if (isset($_SESSION['hotkopi_session_id'])) {

        switch ($_SESSION['hotkopi_session_type']) {
            case '0':
                header("location: c/core/");
                break;
            case '1':
                header("location: c/school/");
                break;
            case '2':
                header("location: c/business/");
                break;
            case '3':
                header("location: c/student/");
                break;
            default:
                session_destroy();
                break;
        }
    }

?>