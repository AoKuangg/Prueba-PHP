<?php
    require_once "../vendor/autoload.php";
    $router = new \Bramus\Router\Router();
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();

    $router->get("/paisx",function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM pais");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->put("/pais",function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res=$cox->con->prepare("UPDATE pais SET nombrePais = :NOMBREPAIS WHERE id =:IDPAIS");
        $res->bindParam("NOMBREPAIS",$_DATA['name']);
        $res->bindParam("IDPAIS",$_DATA['id']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });



    $router->run();

?>