<?php

function getList( array $array): string
        {
            $html = "";
            foreach ($array as $task) {
                $html .= "<h2>" . $task['title'] . "</h2>";
                $html .= "<p>" . $task['description'] . "</p>";
            }
            return $html;
        }

        ?>