<?php

namespace Apps\Http\Models;


class Consulta
{
    private static $table1 = 'usuariosdados';
    private static $table2 = 'consulta';

    public static function select(string $nomeUsuario,string $nomeTitular,string $nomeLogradouro)
    {
        $connPdo = new \PDO(DBDRIVE . ':host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        $buscaDadosGerais = 'SELECT * FROM  ' . self::$table1 . ' WHERE nome_titular=:nome AND nome_logradouro=:logradouro';
        $stmt = $connPdo->prepare($buscaDadosGerais);
        $stmt->bindValue(':nome', $nomeTitular);
        $stmt->bindValue(':logradouro', $nomeLogradouro);
        $stmt->execute();

        
        if ($stmt->rowCount() > 0) {
            $now = date('Y-m-d H:i:s');
            $sqlInsert = 'INSERT INTO ' . self::$table2 . '  (nome_usuario,nome_titular,nome_logradouro,data) VALUES(:nome_usuario,:nome_titular,:nome_logradouro,:data)';
            $exec = $connPdo->prepare($sqlInsert);
            $exec->bindValue(':nome_usuario', $nomeUsuario);
            $exec->bindValue(':nome_titular', $nomeTitular);
            $exec->bindValue(':nome_logradouro', $nomeLogradouro);
            $exec->bindValue(':data', $now);
            $exec->execute();
            $dadosPessoas= $stmt->fetch(\PDO::FETCH_ASSOC);
            // return $socios;
            return  array("dados" => $dadosPessoas);
        } else {
            throw new \Exception("Nenhum usuário encontrado");
        }
    }
   
}
