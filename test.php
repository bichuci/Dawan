<?php
function listHTML(string $string, array $tableau)
{
    $title = 'Capitale';
    if( $title == null || !empty($tableau))
    {
        $string = '';
        $string .= '<h3>'.$title.'</h3><ul>';
        for($i=0; $i<count($tableau); $i++)
        {
            $string .= '<li>'. $tableau[$i] .'</li>';
        }
        $string .= '</ul>';
    }
    else
    {
        return null;
    }
    return $string;
}
echo(listHtml('.', ['France', 'Belgique','Allemagne']));


function remplacerLesLettres($string)
{
    // $string ="Bonjour les amis";
    $search = ['e', 'i', 'o'];
    $replace = ['3', '1', '0'];
    $string = str_replace($search, $replace, $string);
    return $string;
}
echo(remplacerLesLettres("Bonjour tout le monde"));

function quelleDate()
{
    $date = date('d-m-Y');
    return $date;
}
echo(quelleDate());


$random = random_int(0,9);
echo($random) ;
?>
