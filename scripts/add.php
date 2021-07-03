<?php

# Your Last.fm user name.
$user = 'andrewchumchal';

# Your local time zone offset.
$timezone = -5;

# The file to output saved data to. Make sure the script has permissions to 
# write to this file, or the directory if the file doesn't already exist.
$output = 'audioscrobbler.html';

# The frequency of updates in seconds.
$frequency = 150;

# Set to true to use curl, false to use file_get_contents() when retrieving
# data from AudioScrobbler. If you're having troubles try changing this.
$usecurl = false;

# Set to true to show notices about what the script is doing, or false to 
# hide them.
$notices = true;

$url = 'http://ws.audioscrobbler.com/rdf/history/'.$user;
$error = false;
$initem = false;
$element = false;
$parents = array();
$song = array();
$songs = array();

function getUrl ($url) {
    global $usecurl;
    if ($usecurl) {
        $ch = curl_init();
        $timeout = 5; // set to zero for no timeout
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $contents = curl_exec($ch);
        curl_close($ch);
        return $contents;
    } else return file_get_contents($url);
}

function startElement($parser, $name, $attrs) {
    global $initem, $element, $parents;
    if ($name == 'ITEM') {
        $initem = true;
    }
    if ($element) array_unshift($parents,$element);
    $element = $name;
}

function endElement($parser, $name) {
    global $initem, $element, $parents, $song, $songs;
    if ($name == 'ITEM') {
        $initem = false;
        array_push($songs,$song);
        $song = array();
    }
    $element = array_shift($parents);
}

function characterData($parser, $data) {
    global $initem, $element, $parents, $song, $timezone;
    if ($initem) {
        if ($parents[0] == 'DC:CREATOR' && $element == 'DC:TITLE') {
            $song['artist'] = $data;
        } else if ($parents[0] == 'ITEM' && $element == 'DC:TITLE') {
            $song['title'] = $data;
        } else if ($parents[0] == 'ITEM' && $element == 'LINK') {
            $song['link'] = $data;
        } else if ($parents[0] == 'ITEM' && $element == 'DC:DATE') {
            # date is in the format 2005-03-12T01:57:18+00:00
            $data = str_replace('T',' ',$data);
            $data = preg_replace('%\+[0-9]{2}:[0-9]{2}%','',$data);
            $song['date'] = strtotime($data) + ($timezone * 3600);
        } else if ($parents[0] == 'MM:ALBUM' && $element == 'DC:TITLE') {
            $song['album'] = $data;
        }
    }
}

# if the output file exists, and it's new enough, just output it
# otherwise contact audioscrobbler for new data.

if (file_exists($output) && filemtime($output) > time()-$frequency) {
    if ($notices) echo '<p>Reading saved data...</p>';
    readfile($output);
} else {

    if ($notices) echo '<p>Connecting to AudioScrobbler...</p>';

    # load the xml file from audioscrobbler and parse it
    $xml_parser = xml_parser_create();
    xml_parser_set_option($xml_parser,XML_OPTION_CASE_FOLDING,true);
    xml_set_element_handler($xml_parser,'startElement','endElement');
    xml_set_character_data_handler($xml_parser,'characterData');
    $data = getUrl($url);
    if ($data) {
        $error = 'Couldn\'t connect to AudioScrobbler.';
    } else {
        if (!xml_parse($xml_parser,$data)) {
            $error = sprintf('<b>XML error:</b> %s at line %d',
                xml_error_string(xml_get_error_code($xml_parser)),
                xml_get_current_line_number($xml_parser));
        }
        xml_parser_free($xml_parser);
    }

    # modify this bit to change what displays    
    if ($error) {
        $html = '<p>'.$error.'</p>';
    } else {
        $song = $songs[0];
        if ($song) {
            $html = '<h1><a href="http://www.last.fm/user/'.$user.'/">Currently listening to:</a></h1>';
            $html .= '<p><a href="'.$song['link'].'">'.$song['title'].'</a> by '.$song['artist'].'<br />';
            if ($song['album']) $html .= 'From the album '.$song['album'].'<br />';
            $html .= 'Played on '. date('F dS \a\t h:i A',$song['date']) .'<br />';
            $html .= 'Provided by <a href="http://www.audioscrobbler.com/">AudioScrobbler</a><br />';
            $html .= '</p>';
        } else $html = '<p>I haven\'t listened to anything in a while.</p>';
    }

    $fp = @fopen($output,'w');
    if ($fp) {
        if (!@fwrite($fp,$html)) echo '<p>Couldn\'t save song data.</p>';
        fclose($fp);
    } else echo '<p>Couldn\'t save song data.</p>';

    echo $html;

}

?>