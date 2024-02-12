<?php
//____________ SLUGIFY ____________
//Function that removes special character from string
function removeSpecialChar($text) {
    $specialChars = array('\'', '"', ',', '.', ':', ';', '<', '>', '«', '»', '/', '\\', '!', '?', '@', '#', '_', '(', ')', '{', '}', '[', ']');
    $new = str_replace($specialChars, '', $text);

    return $new;
}

//Function that replace whitespace by -
function replaceWhitespace($text) {
    $new = str_replace(' ', '-', $text);

    return $new;
}

//Putting the url in the right way
function slugify($str) {
    //convert utf8 to ascii (é->e, etc...)
    $slug = iconv('UTF-8','ASCII//IGNORE', $str);
    //lower the strings
    $slug = strtolower($slug);
    //remove specials chars
    $slug = removeSpecialChar($slug);
    //replace whitespaces by -
    $slug = replaceWhitespace($slug);

    return $slug;
}

?>