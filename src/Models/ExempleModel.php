<?php
namespace Project\Models;

use PDO;

class ExempleModel extends BaseModel
{
    function getAll()
    {
        $sql = "SELECT * FROM yourTableName";
        // You can use PDO connection with db attribute(inherit from BaseModel)
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>