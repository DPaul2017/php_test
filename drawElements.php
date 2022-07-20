<?php

class drawElements {
    
    // Функция для создания тега изображения
    function drawImg($link, $style = "border-radius: 10px;") {
        return "<img class='img-class' src='$link' style='$style'>";
    }

    // Функция для создания панели с изображением
    function drawImgPanel($link) {
        list($width, $height) = getimagesize($link); //Получаю размеры изображения
        
        //
        
        if ($width > $height) {
            $imgStyle = "width: 300px; height:" . round(300 / ($width / $height)) . "px;"; 
        } else {
            $imgStyle = "width: " . round(300 * ($width / $height)) . "px; height: 300px;";
        }

        echo "<div id='img-place-id'>"
        . "<div style='display: flex; min-width: 350px; margin: 10px'>"
        . $this->drawImg($link, $imgStyle)
        . "</div>"
        . "<div id='img-description-id'>Image from: $link <br><br> Image size:<br> width - $width<br>"
                . "height: $height</div>"
        . "</div>";
    }
    
    // Функция для вывода информации
    public static function preTag($body) {
        echo "<pre>" . var_dump($body) . "</pre>";
    }

}
