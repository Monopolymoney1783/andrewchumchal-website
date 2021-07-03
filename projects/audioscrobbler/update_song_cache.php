<?php
function my_curl($url){

    //  Initiate curl
    $ch = curl_init();
    // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($ch, CURLOPT_URL,$url);
    // Execute
    $result=curl_exec($ch);
    // Closing
    curl_close($ch);
    
    return $result;
}

$json = my_curl('http://ws.audioscrobbler.com/2.0/?method=User.getRecentTracks&user=andrewchumchal&api_key=3c954a61b06e9f863e7beaa5a7b61b74');
$obj = json_decode($json,true);
$returnEnvelope = array();
$blogs = array();
if (count($obj) > 0){
    
    foreach ($obj as $post){
        $blog = array();
        
        $postContentsJson = my_curl($post['link']."&format=json");
        $jsonArray = json_decode($postContentsJson, true);
        if ($jsonArray['status'] == "ok") {
            
            $postJson = $jsonArray['post'];
            // Author Image
            if ($postJson['attachments'][0]['images']['full']['url'] == null){
                $matches = array();
                $matchCount = preg_match('/(?<=src=\")[^\"]+/',$postJson['content'],$matches);
                if ($matchCount == 0){
                    $blog['author_image'] = "";
                }else{
                     $blog['author_image'] = $matches[0];
                }
                
            }else{
                $count = count($postJson['attachments']);
                $blog['author_image'] = $postJson['attachments'][$count-1]['images']['full']['url'];
                $blog['author_image_type'] = $postJson['attachments'][$count-1]['mime_type'];
            }
            // Banner Image
            $bannerImage = $postJson['thumbnail_images']['full']['url'];
            if ($bannerImage == null){
                // prevents null value
                $bannerImage = "";
            }
            
            $blog['banner'] = $bannerImage;
            // removes tags, removes new lines and adds elipses to the end
            $exerpt = trim(preg_replace('/\s\s+/', ' ', strip_tags($postJson['excerpt'])));
            $exerpt = $exerpt."...";
            $blog['excerpt'] = html_entity_decode($exerpt);
            $blog['content'] = strip_tags($postJson['content'], "<br><<p><i><b>");
            $blog['date'] = date("F j, Y", strtotime($postJson["date"]));
            $blog['title'] = $postJson['title_plain'];
            $blog['author'] = $postJson['custom_fields']['display_post_author'][0];
            array_push($blogs,$blog);
        
        }
    }
    $returnEnvelope['status'] = "ok";
    $returnEnvelope['blogs'] = $blogs;
    
}else{
    $returnEnvelope['status'] = "bad";
    $returnEnvelope['message'] = "This message came from the server: blog count was 0";
}
if($returnEnvelope['status'] == "ok"){
	file_put_contents ('songcache.txt',serialize($returnEnvelope));
	echo "done";
}
?>