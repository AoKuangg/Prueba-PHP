<?php
    require_once "../vendor/autoload.php";
    $router = new \Bramus\Router\Router();
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();

    /**
     * *Tabla "campers" a la cual se le realizara el  CRUD
     */

    $router->get("/camper",function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM campers");
        $res->execute();
        $res = $res->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($res);
    });

    $router->put("/camper",function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res=$cox->con->prepare("UPDATE campers SET idCamper = :id, nombreCamper = :nombre, apellidoCamper = :apellido, fechaNac = :nacimiento, idReg = :idReg WHERE id =:id");
        $res->bindParam("nombre",$_DATA['name']);
        $res->bindParam("apellido",$_DATA['apellido']);
        $res->bindParam("nacimiento",$_DATA['nacimiento']);
        $res->bindParam("id",$_DATA['id']);
        $res->bindParam("idReg", $_DATA["idReg"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->post("/camper",function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res=$cox->con->prepare("INSERT INTO campers  (nombreCamper, apellidoCamper, fechaNac, idCamper) VALUES (:nombre, :apellido, :nacimiento, :id)");
        $res->bindParam("nombreCamper",$_DATA['name']);
        $res->bindParam("apellidoCamper",$_DATA['apellido']);
        $res->bindParam("fechaNac",$_DATA['nacimiento']);
        $res->bindParam("idCamper",$_DATA["id"]);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });

    $router->delete("/camper",function(){
        $_DATA = json_decode(file_get_contents("php://input"), true);
        $cox = new \App\connect();
        $res=$cox->con->prepare("DELETE FROM campers  WHERE idCamper =:id");
        $res->bindParam("id",$_DATA['id']);
        $res->execute();
        $res = $res->rowCount();
        echo json_encode($res);
    });


    $router->run();

?>