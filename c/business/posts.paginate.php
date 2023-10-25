<?php  
    //pagination
    $countResults=dataLink()->prepare("SELECT 
                                    * 
                                    FROM
                                    posts
                                    Where
                                    user_code = :user_code
                                    Order By
                                    post_created
                                    DESC");
    $countResults->execute([
        'user_code' => $userCode
    ]);

    $getPaginate=dataLink()->prepare("SELECT 
                                    COUNT(post_id) 
                                    FROM
                                    posts
                                    Where
                                    user_code = :user_code
                                    Order By
                                    post_created
                                    DESC");
    $getPaginate->execute([
        'user_code' => $userCode
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
                                * 
                                FROM
                                posts
                                Where
                                user_code = :user_code
                                Order By
                                post_created
                                DESC
                                $limit");
    $paginate->execute([
        'user_code' => $userCode
    ]);
    
    $paginationCtrls = '';

    if($last != 1){
        if ($pagenum > 1) {
            $previous = $pagenum - 1;
            $paginationCtrls .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].
            '?pn='.$previous.
            '" ><i class="icon-chevron-left"></i></a></li>';
            for($i = $pagenum-4; $i < $pagenum; $i++){
                if($i > 0){
                    $paginationCtrls .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].
                    '?pn='.$i.
                    '" >'.$i.'</a></li>';
                }
            }
        }

        $paginationCtrls .= '<li class="page-item active"><a class="page-link">'.$pagenum.'</a></li>';
        for($i = $pagenum+1; $i <= $last; $i++){
            $paginationCtrls .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].
            '?pn='.$i.
            '" >'.$i.'</a></li>';
            if($i >= $pagenum+4){
                break;
            }
        }

        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $paginationCtrls .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].
            '?pn='.$next.
            '" ><i class="icon-chevron-right"></i></a></li>';
        }
    }
?>