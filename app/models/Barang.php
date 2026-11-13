<?php

class barang
{
    private $file;

    public function __construct()
    {
        $this->file = DATA_PATH . 'barang.json';
    }

    public function semua()
    {
        if (!file_exists($this->file)) {
            return [];
        }

        $json = file_get_contents($this->file);

        $data = json_decode($json, true);

        return is_array($data) ? $data : [];
    }

    public function cari($id)
    {
        $barang = $this->semua();

        foreach ($barang as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }

        return null;
    }
}