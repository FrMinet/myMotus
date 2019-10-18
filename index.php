<?php

// VARIABLES
$word_to_find = "maison";
$limit_char = strlen($word_to_find);
$splitted_word_to_find = array();
$splitted_answer = array();
$corrective = array();
$turn_counter = 0;
$continue = true;

echo("Bienvenue dans 'MyMotus', le jeu où vous devez retrouver un mot de 8 lettres" . "\n");
// BOUCLE DE JEU
while ($continue == true) {
    echo("Nombre de tours : " . $turn_counter . "\n");
    $user_answer = readline("Quelle est votre proposition ? : ");
    $user_answer = strtolower($user_answer);
    $user_answer = str_replace(" ", "", $user_answer);
    
    if ($user_answer == "quit")
    {
        $continue = false;
        $message = "Merci d'avoir participé !";
    }
    elseif (strlen($user_answer) != $limit_char)
    {
        $message = "ERREUR : Votre proposition doit être de " . $limit_char . " caractères.";
        $turn_counter++;
    }
    else
    {
        $splitted_word_to_find = preg_split('//', $word_to_find, -1, PREG_SPLIT_NO_EMPTY);
        $splitted_answer = preg_split('//', $user_answer, -1, PREG_SPLIT_NO_EMPTY);
        for ($i = 0; $i <= ($limit_char - 1); $i++)
        {
            if ($splitted_answer[$i] == $splitted_word_to_find[$i])
            {
                $corrective[$i] = strtoupper($splitted_answer[$i]);
            }
            else
            {
                if (strpos($word_to_find, $splitted_answer[$i]))
                {
                    $corrective[$i] = $splitted_answer[$i];
                }
                else
                {
                    $corrective[$i] = "*";
                }
            }    
        }
        $message = implode($corrective);
        $turn_counter++;
    }
    echo($message . "\n");
    if (strtolower($message) == $word_to_find)
    {
        echo("Félicitations vous avez gagné! \n");
        $continue = false;
    }
}

?>