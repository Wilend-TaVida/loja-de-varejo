<?php

namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class ProviderDAO implements DAO{
    public function insert($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare("INSERT INTO provider VALUES(null, ?, ?, ?, 1);");
        $stmt->bindParam(1, $object->cnpj);
        $stmt->bindParam(2, $object->name);
        $stmt->bindParam(3, $object->phone);
        return $stmt->execute();
    }
    public function findOne($id)
    {

    }
    public function findAll()
    {
        $conection = Connection::getConnection();
        $stmt = $conection->query(("select * from provider inner join address on provider.address_code = address.address_code;"));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($object)
    {

    }
    public function delete($id)
    {

    }
}