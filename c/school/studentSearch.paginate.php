<?php  
    //pagination
    $countResults=dataLink()->prepare("SELECT 
                                    profile_id,
                                    profiles.user_code as userCode, 
                                    profile_course, 
                                    profiles.school_id as schoolId, 
                                    profile_country, 
                                    profile_address, 
                                    city_id, 
                                    profile_gender, 
                                    profile_contact, 
                                    profile_about_me, 
                                    profile_skills, 
                                    profile_verified, 
                                    profile_created,
                                    user_fname,
                                    user_lname
                                    From profiles
                                    LEFT JOIN
                                    users
                                    ON
                                    profiles.user_code = users.user_code
                                    Where
                                    profiles.school_id = :school_id
                                    AND
                                    CONCAT
                                    (
                                        user_fname, ' ', user_lname,
                                        profile_course,
                                        profile_address,
                                        profile_contact

                                    ) 
                                    LIKE :searchText
                                    Order By 
                                    profile_created
                                    DESC");
    $countResults->execute([
        'school_id' => $schoolId,
        'searchText' => "%$searchText%"
    ]);

    $getPaginate=dataLink()->prepare("SELECT COUNT(profile_id) From profiles
                                    LEFT JOIN
                                    users
                                    ON
                                    profiles.user_code = users.user_code
                                    Where
                                    profiles.school_id = :school_id
                                    AND
                                    CONCAT
                                    (
                                        user_fname, ' ', user_lname,
                                        profile_course,
                                        profile_address,
                                        profile_contact

                                    ) 
                                    LIKE :searchText
                                    Order By 
                                    profile_created
                                    DESC");
    $getPaginate->execute([
        'school_id' => $schoolId,
        'searchText' => "%$searchText%"
    ]);

    $countRes=$countResults->rowCount();
    $paginates=$getPaginate->fetch(PDO::FETCH_BOTH);

    $page_rows = 15; // limit every page
    $last = ceil($paginates[0]/$page_rows);

    if($last < 1){
        $last = 1;
    }
    
    $pagenum = 1;
    
    if(isset($_GET['pn'])){
        $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
    }
    
    if ($pagenum < 1) { 
        $pagenum = 1; 
    } else if ($pagenum > $last) { 
        $pagenum = $last; 
    }
    
    $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

    $paginate=dataLink()->prepare("SELECT 
                                    profile_id,
                                    profiles.user_code as userCode, 
                                    profile_course, 
                                    profiles.school_id as schoolId, 
                                    profile_country, 
                                    profile_address, 
                                    city_id, 
                                    profile_gender, 
                                    profile_contact, 
                                    profile_about_me, 
                                    profile_skills, 
                                    profile_verified, 
                                    profile_created,
                                    user_fname,
                                    user_lname
                                    From profiles
                                    LEFT JOIN
                                    users
                                    ON
                                    profiles.user_code = users.user_code
                                    Where
                                    profiles.school_id = :school_id
                                    AND
                                    CONCAT
                                    (
                                        user_fname, ' ', user_lname,
                                        profile_course,
                                        profile_address,
                                        profile_contact

                                    ) 
                                    LIKE :searchText
                                    Order By 
                                    profile_created
                                    DESC
                                $limit");
    $paginate->execute([
        'school_id' => $schoolId,
        'searchText' => "%$searchText%"
    ]);
    
    $paginationCtrls = '';

    if($last != 1){
        if ($pagenum > 1) {
            $previous = $pagenum - 1;
            $paginationCtrls .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].
            '?pn='.$previous.
            '&searchText='.$searchText.
            '" ><i class="icon-chevron-left"></i></a></li>';
            for($i = $pagenum-4; $i < $pagenum; $i++){
                if($i > 0){
                    $paginationCtrls .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].
                    '?pn='.$i.
                    '&searchText='.$searchText.
                    '" >'.$i.'</a></li>';
                }
            }
        }

        $paginationCtrls .= '<li class="page-item active"><a class="page-link">'.$pagenum.'</a></li>';
        for($i = $pagenum+1; $i <= $last; $i++){
            $paginationCtrls .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].
            '?pn='.$i.
            '&searchText='.$searchText.
            '" >'.$i.'</a></li>';
            if($i >= $pagenum+4){
                break;
            }
        }

        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $paginationCtrls .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].
            '?pn='.$next.
            '&searchText='.$searchText.
            '" ><i class="icon-chevron-right"></i></a></li>';
        }
    }
?>