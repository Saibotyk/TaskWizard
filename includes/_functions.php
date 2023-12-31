<?php

require '_database.php';

session_start();

function getList(array $array, int $maxRank) :string {
                    $html = '<ul class="list js-ul">';
                    foreach ($array as $task) {
                        $dataset = ' data-id="' . $task['id_task'] . '"';
                        if ($task['is_completed'] == 0 && $task['ranking'] > 1 && $task['ranking'] < $maxRank){
                            $img = 'img/checkbox.png" alt="checkbox"';
                            $html .= '<li '.$dataset.'class="task list-js"><a href="updatestatus.php?is_completed=' . $task['is_completed'] . '&id=' . $task['id_task'] .'&ranking=' .$task['ranking']. '" class="list-item"><img src="' . $img . '" id="checkboxChecked">';
                            $html .= '<p class="text-task-js">'.$task['title'].'</p></a><div class="btn-container"><button class="modifier-js btn-invisible"><img src="img/modify-icn.png"></button>';
                            $html .= '<button class="js-btn" data-id='.$task['id_task'].' data-ranking='.$task['ranking'].' data-prior="down"><img src="img/down.svg" alt="down"></a>';
                            $html .= '<button class="js-btn" data-id='.$task['id_task'].' data-ranking='.$task['ranking'].' data-prior="up"><img src="img/up.svg" alt="up"></a></div></li>';
                        } else if ($task['is_completed'] == 0 && $task['ranking'] == 1) {
                            $img = 'img/checkbox.png" alt="checkbox"';
                            $html .= '<li '.$dataset.'class="task list-js"><a href="updatestatus.php?is_completed=' . $task['is_completed'] . '&id=' . $task['id_task'] .'&ranking=' .$task['ranking']. '" class="list-item"><img src="' . $img . '" id="checkboxChecked">';
                            $html .= '<p class="text-task-js">'.$task['title'].'</p></a><div class="btn-container"><button class="modifier-js btn-invisible"><img src="img/modify-icn.png"></button>';
                            $html .= '<button class="js-btn" data-id='.$task['id_task'].' data-ranking='.$task['ranking'].' data-prior="down"><img src="img/down.svg" alt="down"></button>';
                            $html .= '</div></li>'; 
                        } else if ($task['is_completed'] == 0 && $task['ranking'] == $maxRank) {
                            $img = 'img/checkbox.png" alt="checkbox"';
                            $html .= '<li '.$dataset.'class="task list-js"><a href="updatestatus.php?is_completed=' . $task['is_completed'] . '&id=' . $task['id_task'] .'&ranking=' .$task['ranking']. '" class="list-item"><img src="' . $img . '" id="checkboxChecked">';
                            $html .= '<p class="text-task-js">'.$task['title'].'</p></a><div class="btn-container"><button class="modifier-js btn-invisible"><img src="img/modify-icn.png"></button>';
                            $html .= '<button class="js-btn" data-id='.$task['id_task'].' data-ranking='.$task['ranking'].' data-prior="up"><img src="img/up.svg" alt="up"></a></div></li>';
                        }  else {
                            $img = 'img/checkbox_completed.png"';
                            $html .= '<li '.$dataset.'class="task list-js"><a href="updatestatus.php?is_completed=' . $task['is_completed'] . '&id=' . $task['id_task'] .'&ranking=' .$task['ranking']. '" class="list-item"><img src="' . $img . '" id="checkboxChecked">';
                            $html .= '<p class="text-task-js">'.$task['title'].'</p></a>';
                        };
                    }
                    $html .= '</ul>';
                return $html; 
                };
            
            



$popupMsg = [
    'ok' => '<div class="_background-color popup-js"><article class="popup "><p class="popup-text">Vôtre tâche a bien été ajoutée ! 🥳<br><span class="popup-text2">Cliquez n\'importe ou pour quitter</span></p></article></div>',
    'ko' => '<div class="_background-color popup-js"><article class="popup "><p class="popup-text">Vôtre tâche a échouée ! 😱<br><span class="popup-text2">Cliquez n\'importe ou pour quitter</span></p></article></div>',
    'addtask' => '<div class="_background-color popup-js"><article class="popup "><p class="popup-text">Vôtre tâche a été modifiée ! 🥳<br><span class="popup-text2">Cliquez n\'importe ou pour quitter</span></p></article></div>',
    'failtask' => '<div class="_background-color popup-js"><article class="popup "><p class="popup-text">Vôtre tâche n\'a pas pu être modifiée ! 😱<br><span class="popup-text2">Cliquez n\'importe ou pour quitter</span></p></article></div>',
    'wrongToken' => '<div class="_background-color popup-js"><article class="popup "><p class="popup-text"> Le token est inconnu ! 😱<br><span class="popup-text2">Cliquez n\'importe ou pour quitter</span></p></article></div>',
    'originUnknown' => '<div class="_background-color popup-js"><article class="popup "><p class="popup-text"> Origine du formulaire inconnue ! 😱<br><span class="popup-text2">Cliquez n\'importe ou pour quitter</span></p></article></div>'

];

function getPopupText(array $array): string
{
    $msg = $_GET['msg'] ?? '';
    if (array_key_exists($msg, $array)) {
        return $array[$msg];
    }
    return '';
};

function verifyToken(){
    if(!array_key_exists('myToken', $_SESSION) || !array_key_exists('token', $_REQUEST) || $_SESSION['myToken'] !== $_REQUEST['token'] ){
        header('location: index.php?msg=wrongToken');
        exit;
    }
}

function verifyOrigin(){
    if( !str_contains($_SERVER['HTTP_REFERER'], $_ENV['URL'])){
     header('location: index.php?msg=originUnknown');
     exit;
    }

};
        
    ?>