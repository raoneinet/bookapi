<?php
include "../dbcon/config.php";

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'get'){

    $id = filter_input(INPUT_GET, 'id');

    if($id){
        
        $sql = $pdo -> prepare("SELECT * FROM books WHERE id = :id");
        $sql -> bindValue(":id", $id);
        $sql -> execute();

        if($sql -> rowCount() > 0){
            $books = $sql -> fetchAll(PDO::FETCH_ASSOC);

            foreach($books as $item){
                $array['result'] = [
                    'id' => $item['id'],
                    'title' => $item['title'],
                    'sinopsis' => $item['sinopsis'],
                    'author' => $item['author']
                ];
            }

        }else{
            $array['error'] = 'Id não encontrado';
        }

    }else{
        $array['error'] = 'Erro! Id não enviado';
    }

}else{
    $array['error'] = 'Erro! Método não permitido! (Apenas GET)';
}

/*Define headers http*/
include "../headers/headers.php";