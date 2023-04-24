<?php

namespace App\Models;

class OpenAPI extends \App\Models\Model
{
    public function getDatabases()
    {
        $db = $this->db;
        $data = $db->query("SHOW DATABASES;")->fetchAll();

        return [
            'state' => 'success',
            'message' => 'message',
            'data' => $data
        ];
    }
}
