<?php
function bbcode($f)
{

    $pat = ['/\[b\](.*)\[\/b\]/i', '/\[i\](.*)\[\/i\]/i', '/\[u\](.*)\[\/u\]/i'];
    $rep = ['<i>$1</i>', '<b>$1</b>', '<u>$1</u>'];
    return preg_replace($pat, $rep, $f);
}


function smile($f)
{
    $arr = [
        "/\:\-\)/",
        "/\:\-\(/",
        "/\:\(/",
        "/\:\)/"
    ];

    $arr2 = [
        '<img width="20" src="1600.jpg">',
        '<img width="20" src="gr.jpg">',
        '<img width="20" src="dsfsd.jpg">',
        '<img width="20" src="images.jpg">'
    ];

    return preg_replace($arr, $arr2, $f);
}

function cens($f)
{
    if (preg_match("/(дурак|редиска)/i", $f)) {
        return 'У нас запрещен мат';
    } else {
        return $f;
    }
}

function MarcDown($text)
{
    $pat = ['/\*\*(.*)\*\*/i', '/\*(.*)\*/i', '/\~\~(.*)\~\~/i'];
    $rep = ['<b>$1</b>', '<i>$1</i>', '<s>$1</s>'];
    $text = preg_replace($pat, $rep, $text);
    return $text;
}
function url($text)
{
    $pat =  ['/(https|http)\:\/\/.*/i', '/(https|http)\:\/\/.*(jpg|png|gif)/i'];
    $rep = ['<a href = "$0"></a>', '<img src = "$0">'];
    $text = preg_replace($pat, $rep, $text);
    return $text;
}

function SavGB($userAgent, $remoteAddr, $name, $text, $date)
{
    $str = <<<XML
\n<msg>
<userAgent>$userAgent</userAgent>
<addr>$remoteAddr</addr>
<name>$name</name>
<text>$text</text>
<date>$date</date>
</msg>
XML;
    return file_put_contents('ws.xml', $str, FILE_APPEND);
}



function mass($f)
{
    preg_match_all(
        '/<msg>.*?<userAgent>(.*?)<\/userAgent>.*?<addr>(.*?)<\/addr>.*?<name>(.*?)<\/name>.*?<text>(.*?)<\/text>.*?<date>(.*?)<\/date>.*?<\/msg>/ius',
        file_get_contents($f),
        $matches
    );

    $arr = [];

    foreach ($matches[1] as $key => $value) {
        $arr[$key]['userAgent'] = $value;
        $arr[$key]['addr'] = $matches[2][$key];
        $arr[$key]['name'] = $matches[3][$key];
        $arr[$key]['text'] = $matches[4][$key];
        $arr[$key]['date'] = $matches[5][$key];
    }

    return $arr;
}




