<?php

namespace App\Models;

class Hello extends Model
{
    public function show_databases()
    {
        $db = $this->db;
        $data = $db->query("SHOW DATABASES;")->fetchAll();

        return $data;
    }
}
