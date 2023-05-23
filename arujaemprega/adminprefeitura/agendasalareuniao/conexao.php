<?php
/* @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar e Bootstrap 4,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */

$servidor = "pmaruja14.pma.local";
$usuario = "desenvolvimento";
$senha = "prefeitura@banco2019";
$dbname = "bd_emprega_aruja";

//Criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
