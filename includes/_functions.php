<?php

function getList(array $array) :string  {
                    $html = '<ul class="list">';
                    foreach ($array as $task) {
                        if ($task['is_completed'] == 0){
                            $img = 'img/checkbox.png" alt="checkbox"';
                        }
                        else{$img= 'img/checkbox_completed.png"';}
                        $html .= '<li><a href="update.php?is_completed='.$task['is_completed'].'&id='.$task['id_task'].'" class="list-item"><img src="'.$img.'" id="checkboxChecked">';
                        $html .= $task['title']."</a></li>";
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
    }

