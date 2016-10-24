<?php
header('Content-Type: application/json');
ini_set('display_errors', 'on');

/*
This function is strolen from Stackoverflow
http://stackoverflow.com/questions/12444945/cut-the-content-after-10-words */
function shorten_string($string, $wordsreturned)
{
    $retval = $string;
    $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $string);
    $string = str_replace("\n", " ", $string);
    $array = explode(" ", $string);
    if (count($array)<=$wordsreturned)
    {
        $retval = $string;
    }
    else
    {
        array_splice($array, $wordsreturned);
        $retval = implode(" ", $array)." ...";
    }
    return $retval;
}

$numItems = $_GET['items'];
$offset = $_GET['offset'];

$currentCategory = mb_ereg_replace("(category)|(/)|(\?.*)", "", $_SERVER['REQUEST_URI']);

$options = array(
    "posts_per_page" => intval($numItems),
    "offset" => intval($offset),
    "category_name" => $currentCategory,
);

function fetchTitleImages($acfField) {
    $imagesArr = array();
    foreach ( $acfField as $image ) {
        if($image['titelbild']) {
            $singleImageArr = array();
            $singleImageArr["src"] = $image['bild']['url'];
            $singleImageArr["alt"] = $image['bild']['alt'];
            array_push($imagesArr, $singleImageArr);
        }
    }
    return $imagesArr;
}

$totalPosts = get_posts(array("category_name" => $currentCategory, "posts_per_page" => 1000));
$posts = get_posts($options);
$postsArr = array(
    "total-items" => count($totalPosts),
    "items" => count($posts),
    "data" => array()
);
foreach ( $posts as $post ) {
    $titleImages = fetchTitleImages(get_field('beitragsbilder', $post->ID));
    /*post_excerpt;*/
    $postArr = array();
    $postArr['id'] = $post->ID;
    $postArr['permalink'] = get_post_permalink($post->ID);
    $postArr['title'] = $post->post_title;
    if(strlen($post->post_excerpt) > 0) {
        $postArr['excerpt'] = $post->post_excerpt;
    } else {
        if(strlen($post->post_content) > 0) {
            $postArr['excerpt'] = shorten_string($post->post_content, 20) . " [...]";
        } else {
            $postArr['excerpt'] = "";
        }
    }
    $postArr['images'] = $titleImages;
    array_push($postsArr['data'], $postArr);
}
echo json_encode($postsArr, JSON_UNESCAPED_UNICODE);

?>
