<?php

function getList(array $array) :string  {
                    $html = '<ul class="list">';
                    foreach ($array as $task) {
                        if ($task['is_completed'] == 0){
                            $img = 'img/checkbox.png" alt="checkbox"';
                        }
                        else{$img= 'img/checkbox_completed.png"';}

                        $dataset = ' data-id="' . $task['id_task'] . '"';
                        $html .= '<li '.$dataset.' class="list-js"><a href="updatestatus.php?is_completed='.$task['is_completed'].'&id='.$task['id_task'].'" class="list-item"><img src="'.$img.'" id="checkboxChecked">';
                        $html .= '<p class="text-task-js">'.$task['title']."</p></a><button class=\"modifier-js btn-invisible\"><img src=\"img/modify-icn.png\"></button></li>"; 
                    }
                    $html .= '</ul>';
                    return $html;
                }


function getPopupText(array $array) : string {
    $count = 0;
    foreach($array as $msg => $text) {
        if ( array_key_exists('msg', $_GET) && $_GET['msg'] == $msg) {
            return $text;
        } else if (array_key_exists('msg', $_GET) && $_GET['msg'] == $msg) {
            return $text;
        } else if ($count == 1) {
            return '';
        } else {
            $count++;
            continue;
        }
    }
    };

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



