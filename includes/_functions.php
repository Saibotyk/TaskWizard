<?php

// function getList( array $array): string
//         {
//             $html = "";
//             foreach ($array as $task) {
//                 $html .= "<h2>" . $task['title'] . "</h2>";
//                 $html .= "<p>" . $task['description'] . "</p>";
//             }
//             return $html;
//         }
        
function getList(array $array) :string  {
                    $html = '<ul class="list">';
                    foreach ($array as $task) {
                        if ($task['is_completed'] == 0){
                            $img = 'img/checkbox.png" alt="checkbox"';
                        }
                        else{$img= 'img/checkbox_completed.png" alt="checkbox completed"';}
                        $html .= '<li class="list-item"><img src="'.$img.'">';
                        $html .= $task['title']."</li>";
                    }
                    $html .= '</ul>';
                    return $html;
                }

function getPopupText(array $array) : string {
    foreach($array as $msg => $text) {
        if ( array_key_exists('msg', $_GET) && $_GET['msg'] == $msg) {
            return $text;
        } else if (array_key_exists('msg', $_GET) && $_GET['msg'] == $msg) {
            return $text;
        }  else {break;}
    }
    }