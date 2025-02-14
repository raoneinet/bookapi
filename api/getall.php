<?php
include "../dbcon/config.php";

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'get'){

    $sql = $pdo -> query("SELECT * FROM books");
    $sql -> fetchAll(PDO::FETCH_ASSOC);
    $sql -> execute();

    if($sql -> rowCount() > 0){

        foreach($sql as $item){
            $array['result'][] = [
                'id' => $item['id'],
                'title' => $item['title'],
                'sinopsis' => $item['sinopsis'],
                'author' => $item['author']
            ];
        }
    }else{
        $array['error'] = 'Erro! Nenhuma informação encontrada no banco de dados';
    }

}else{
    $array['error'] = 'Erro! Método não permitido! (Apenas GET)';
}

/*Define headers http*/
include "../headers/headers.php";