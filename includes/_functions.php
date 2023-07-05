<?php

require '_database.php';

function getList(array $array) :string  {
                    $html = '<ul class="list">';
                    foreach ($array as $task) {
                        $dataset = ' data-id="' . $task['id_task'] . '"';
                        if ($task['is_completed'] == 0){
                            $img = 'img/checkbox.png" alt="checkbox"';
                            $html .= '<li '.$dataset.'class="task list-js"><a href="updatestatus.php?is_completed=' . $task['is_completed'] . '&id=' . $task['id_task'] .'&ranking=' .$task['ranking']. '" class="list-item"><img src="' . $img . '" id="checkboxChecked">';
                            $html .= '<p class="text-task-js">'.$task['title'].'</p></a><div class="btn-container"><button class="modifier-js btn-invisible"><img src="img/modify-icn.png"></button>';
                            $html .= '<button class="js-btn" data-id='.$task['id_task'].' data-ranking='.$task['ranking'].' data-prior="down"><img src="img/down.svg" alt="down"></a>';
                            $html .= '<button class="js-btn" data-id='.$task['id_task'].' data-ranking='.$task['ranking'].' data-prior="up"><img src="img/up.svg" alt="up"></a></div></li>'; 
                            $html .= "</li>";
                        } else {
                            $img = 'img/checkbox_completed.png"';
                            $html .= '<li '.$dataset.'class="task list-js"><a href="updatestatus.php?is_completed=' . $task['is_completed'] . '&id=' . $task['id_task'] .'&ranking=' .$task['ranking']. '" class="list-item"><img src="' . $img . '" id="checkboxChecked">';
                            $html .= '<p class="text-task-js">'.$task['title'].'</p></a>';
                        }
                    }
                    $html .= '</ul>';
                    return $html;
                }
            




$popupMsg = [
    'ok' => '<div class="_background-color popup-js"><article class="popup "><p class="popup-text">Vôtre tâche a bien été ajoutée ! 🥳<br><span class="popup-text2">Cliquez n\'importe ou pour quitter</span></p></article></div>',
    'ko' => '<div class="_background-color popup-js"><article class="popup "><p class="popup-text">Vôtre tâche a échouée ! 😱<br><span class="popup-text2">Cliquez n\'importe ou pour quitter</span></p></article></div>'
];

function getPopupText(array $array): string
{
    $msg = $_GET['msg'] ?? '';
    if (array_key_exists($msg, $array)) {
        return $array[$msg];
    }
    return '';
}

;

function getForm(array $tasks) :string{
    // foreach($tasks as $task){
        //     $title = $task['title'];
        //     $description = $task['description'];
        //     $id = $task['id_task'];
        //     // var_dump($title);
        // }
        
        $html = "";
        $html .='<form action="modify.php" method="post" class="article-form">';
            $html .='<input class="article-input input-ttl-js" type="text" name="title" id="modify_task" placeholder="Tâche" required value="">';
            $html .='<input type="hidden" name="id" class="input-js" value="">';
            $html .='<button class="btn">Enregistrer</button></form>';
            return $html;
        }
        
    ?>
