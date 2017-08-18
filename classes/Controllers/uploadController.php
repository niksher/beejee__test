<?php

use Core\Controller;
use Core\Db;


class uploadController extends Controller
{
    function action_preview()
    {
        $this->preview(true);
    }

    function action_submit()
    {
        $this->preview(false);
    }

    function preview($is_preview)
    {
        if (isset($_POST["name"]) && $_POST["name"] == "") {
            $error = "имя";
        }

        if (isset($_POST["email"]) && $_POST["email"] == "") {
            if ($error) {
                $error .= ", ";
            } 
            $error .= "email";
        }

        if (isset($_POST["message"]) && $_POST["message"] == "") {
            if ($error) {
                $error .= ", ";
            } 
            $error .= "текст задачи";
        }

        if ($error) {
            echo $error;
        } else {
            if (isset($_FILES["img"]["tmp_name"]) && is_uploaded_file($_FILES["img"]["tmp_name"])) {
                $file_name = md5($_FILES["img"]["tmp_name"]) . ".jpg";
                $this->imageResize("img/" . $file_name, $_FILES["img"]);
            } else {
                echo "Ошибка загрузки";
                exit;
            }

            if (!$is_preview) {
                $db = new Db();
                $db->preExecute(
                    <<<_____
                        INSERT INTO `task`
                        (
                            `name`
                            , `email`
                            , `message`
                            , `img`
                        ) 
                        VALUES (
                            :name
                            , :email
                            , :message
                            , :file_name
                        )
_____
                , [
                    "name" => $_POST["name"]
                    , "email" => $_POST["email"]
                    , "message" => $_POST["message"]
                    , "file_name" => $file_name
                ]);
                
                echo "Задача отправлена";
            } else {
                $row = [
                    "name" => $_POST["name"]
                    , "email" => $_POST["email"]
                    , "message" => $_POST["message"]
                    , "img" => $file_name
                ];
                include _ROOTDIR_ . "/classes/Views/task.html.php";
            }
         }
    }

    function imageResize($path, $img) {

        switch ($img['type']) {
            case "image/gif": 
                $image = imagecreatefromgif($img["tmp_name"]);
                break;
            case "image/jpeg": 
                $image = imagecreatefromjpeg($img["tmp_name"]);
                break;
            case "image/png": 
                $image = imagecreatefrompng($img["tmp_name"]); 
                break;
            case "image/pjpeg": 
                $image = imagecreatefromjpeg($img["tmp_name"]); 
                break;
            default : 
                echo "Ошибка загрузки"; 
                exit; 
                break;
        }

        list($w,$h) = getimagesize($img["tmp_name"]);

        $ratio = $w / 320 > $h / 240 
            ? $w / 320 
            : $h / 240;

        $new_height = null;
        $new_width = null;
        
        if ($ratio < 1) {
            $new_height=$h;
            $new_width=$w;
        } else {
            $new_height = ceil($h / $ratio);
            $new_width = ceil($w / $ratio);
        }



        $im1 = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($im1, $image, 0, 0, 0, 0, $new_width, $new_height, imagesx($image), imagesy($image));

        imagejpeg($im1, $path, 100);
        imagedestroy($image);
        imagedestroy($im1);
    }

}
