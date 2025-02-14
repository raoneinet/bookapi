<?php
include "../dbcon/config.php";

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'delete'){

    parse_str(file_get_contents('php://input'), $input);
    
    $id = filter_var($input['id'] ?? null);

    if($id){

        $sql = $pdo -> prepare("SELECT * FROM books WHERE id = :id");
        $sql -> bindValue(":id", $id);
        $sql -> execute();

        if($sql -> rowCount() > 0){

            $sql = $pdo -> prepare("DELETE * FROM books WHERE id = :id");
            $sql -> bindValue(":id", $id);
            $sql -> execute();

        }else{
            $array['error'] = 'Erro! Id não encontrado';
        }

    }else{
        $array['error'] = 'Erro! Id não enviado';
    }

}else{
    $array['error'] = 'Erro! Método não permitido! (Apenas DELETE)';
}

include "../headers/headers.php";