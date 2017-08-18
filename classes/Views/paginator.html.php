<?php

$page = $params["page"];
$total = $params["total"];

if (empty($page) or $page < 0) {
    $page = 1;
}

$maxPages = ceil($total / 3); 

$maxPages = $maxPages==0 ? 1 : $maxPages;


if ($page > $maxPages) {
    $page = $maxPages;
}

if ($page != 1) {
    $firstPage = '<a href=/?page=1><<</a> 
                <a href=/?page=' . ($page - 1) . '><</a> ';
}

if ($page != $maxPages) {
    $lastPage = '<a href=/?page=' . ($page + 1) . '>></a> 
                <a href=/?page=' . $maxPages . '>>></a>'; 
}
 
if ($page - 2 > 0) {
    $secondPage = ' <a href=/?page='. ($page - 2) . '>' . ($page - 2) . '</a> | ';
} 

if ($page - 1 > 0) {
    $thirdPage = '<a href=/?page='. ($page - 1) .'>'. ($page - 1) .'</a> | '; 
}


if ($page + 2 <= $maxPages) {
    $page2right = ' | <a href=/?page='. ($page + 2) .'>'. ($page + 2) .'</a>'; 
}

if ($page + 1 <= $maxPages) {
    $page1right = ' | <a href=/?page='. ($page + 1) .'>'. ($page + 1) .'</a>'; 
}

echo $firstPage 
        . $secondPage 
            . $thirdPage
                .'<b>' . $page . '</b>'
            .$page1right
        . $page2right
    . $lastPage; 



