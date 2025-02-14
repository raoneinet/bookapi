<?php
include "../dbcon/config.php";

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'post'){

    $title = filter_input(INPUT_POST, 'title');
    $sinopsis = filter_input(INPUT_POST, 'sinopsis');
    $author = filter_input(INPUT_POST, 'author');

    if($title && $sinopsis && $author){

        $sql = $pdo -> prepare("INSERT INTO books (title, sinopsis, author) VALUES (:title, :sinopsis, :author)");
        $sql -> bindValue(":title", $title);
        $sql -> bindValue(":sinopsis", $sinopsis);
        $sql -> bindValue(":author", $author);
        $sql -> execute();

        $id = $pdo -> lastInsertId();
        $array['result'] = [
            'id' => $id,
            'title' => $title,
            'sinopsis' => $sinopsis,
            'author' => $author 
        ];

    }else{
        $array['error'] = 'Dados não enviados';
    }

}else{
    $array['error'] = 'Erro! Método não permitido! (Apenas POST)';
}

include "../headers/headers.php";