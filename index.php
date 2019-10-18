<?php

// VARIABLES
$word_to_find = array("e","s","c","a","b","e","a","u");
$splitted_answer = array();
$turn_counter = 0;
$continue = true;
$has_win = false;

// FONCTIONS
function check_answer($user_answer)
{
    
}

echo("Bienvenue dans 'MyMotus', le jeu où vous devez retrouver un mot de 8 lettres" . "\n");
// BOUCLE DE JEU
do {
    echo("Nombre de tours : " . $turn_counter . "\n");
    $user_answer = readline("Quelle est votre proposition ? : ");
    // $user_answer = strtolower($user_answer);
    // $user_answer = str_replace(" ", "", $user_answer);
    if ($user_answer = "quit")
    {
        $continue = false;
        $message = "Merci d'avoir participé !";
    }
    elseif (strlen($user_answer) != 8)
    {
        $message = "ERREUR : Votre proposition doit être de 8 caractères.";
        $turn_counter++;
    }
    else
    {
        $splitted_answer = preg_split('//', $user_answer, -1, PREG_SPLIT_NO_EMPTY);
        for ($i = 0; $i <= 7; $i++)
        {
            if ($splitted_answer[$i] = $word_to_find[$i])
            {
                $corrective .= strtoupper($splitted_answer[$i]);
                return $corrective; 
            }
        }
    }
    echo $message;
} while ($continue = false);

