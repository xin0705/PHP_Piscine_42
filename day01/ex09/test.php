#!/usr/bin/php
<?PHP
    function more_sorting($str1, $str2)
    {
        $all = "abcedfghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
        $i = 0;
        while ($str1[$i] || $str[$i])
        {
            $first = stripos($all, $str1[$i]);
            $second = stripos($all, $str2[$i]);
            if ($first < $second)
                return (-1);
            if ($first > $second)
                return (1);
            $i++;
        }
        return (0);
    }

    $i = 1;
    $words = array();
    while ($i < $argc)
    {
        $argv[$i] = trim($argv[$i]);
        $help = explode(" ", $argv[$i]);
        $words = array_merge($words, $help);
        $i++;
    }
    sort($words);
    usort($words, "more_sorting");
    foreach($words as $answer)
        echo $answer."\n";
?>