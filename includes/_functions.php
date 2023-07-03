<?php
function getList(array $array): string
{
    $html = '<ul class="list">';
    foreach ($array as $task) {
        if ($task['is_completed'] == 0) {
            $img = 'img/checkbox.png" alt="checkbox"';
        } else {
            $img = 'img/checkbox_completed.png"';
        }
        $html .= '<li class="task"><a href="updatestatus.php?is_completed=' . $task['is_completed'] . '&id=' . $task['id_task'] . '" class="list-item"><img src="' . $img . '" id="checkboxChecked">';
        $html .= $task['title'] . '</a>';
        $html .= '<div><a href="updateranking.php?id=' . $task['id_task'] . '&rank='.$task['ranking'].'&prior=down"><img src="img/down.svg" alt="down"></a>';
        $html .= '<a href="updateranking.php?id=' . $task['id_task'] . '&rank='.$task['ranking'].'&prior=up"><img src="img/up.svg" alt="up"></a></div>';
        $html .= "</li>";
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
?>