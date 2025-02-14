<?php
include "../dbcon/config.php";

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'put'){

    parse_str(file_get_contents('php://input'), $input);

    $id = filter_var($input['id'] ??  null);
    $title = filter_var($input['title'] ?? null);
    $sinopsis = filter_var($input['sinopsis'] ?? null);
    $author = filter_var($input['author'] ?? null);

    if($id && $title && $sinopsis && $author){

        $sql = $pdo -> prepare("SELECT * FROM books WHERE id = :id");
        $sql -> bindValue(":id", $id);
        $sql -> execute();

        if($sql -> rowCount() > 0){

            $sql = $pdo -> prepare("UPDATE books SET title = :title, sinopsis = :sinopsis, author = :author WHERE id = :id");
            $sql -> bindValue(":id", $id);
            $sql -> bindValue(":title", $title);
            $sql -> bindValue(":sinopsis", $sinopsis);
            $sql -> bindValue(":author", $author);
            $sql -> execute();

            $array['result'] = [
                'id' => $id,
                'title' => $title,
                'sinopsis' => $sinopsis,
                'author' => $author
            ];

        }else{
            $array['error'] = 'Erro! Id inexistente.';
        }

    }else{
        $array['error'] = 'Dados não encontrados para modificação';
    }

}else{
    $array['error'] = 'Erro! Método não permitido! (Apenas POST)';
}

include "../headers/headers.php";