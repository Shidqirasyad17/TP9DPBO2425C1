<?php

include_once ("models/DB.php");
include_once ("KontrakModelSirkuit.php");

class TabelSirkuit extends DB implements KontrakModelSirkuit {

    public function __construct($host, $db_name, $username, $password) {
        parent::__construct($host, $db_name, $username, $password);
    }

    public function getAllSirkuit(): array {
        $query = "SELECT * FROM sirkuit";
        $this->executeQuery($query);

        $result = $this->getAllResult();
        return is_array($result) ? $result : []; 
    }

    public function getSirkuitById($id): ?array {
        $this->executeQuery("SELECT * FROM sirkuit WHERE id = :id", ['id' => $id]);
        $result = $this->getAllResult();
        return $result[0] ?? null;
    }

    public function addSirkuit($namaSirkuit, $negara, $panjangKm, $jumlahTikungan): void {
            $query = "INSERT INTO sirkuit (namaSirkuit, negara, panjangKm, jumlahTikungan) 
              VALUES (:namaSirkuit, :negara, :panjangKm, :jumlahTikungan)";
    
    $params = [
        'namaSirkuit'   => $namaSirkuit,
        'negara' => $negara,
        'panjangKm'   => $panjangKm,
        'jumlahTikungan' => $jumlahTikungan
    ];

    $this->executeQuery($query, $params);
    }
    
    public function updateSirkuit($id, $namaSirkuit, $negara, $panjangKm, $jumlahTikungan): void {
            $query = "UPDATE sirkuit 
              SET namaSirkuit = :namaSirkuit, 
                  negara = :negara, 
                  panjangKm = :panjangKm, 
                  jumlahTikungan = :jumlahTikungan
              WHERE id = :id";

    $params = [
        'id'     => $id,
        'namaSirkuit'   => $namaSirkuit,
        'negara' => $negara,
        'panjangKm'   => $panjangKm,
        'jumlahTikungan' => $jumlahTikungan
    ];

    $this->executeQuery($query, $params);
}
    
    public function deleteSirkuit($id): void {
           $query = "DELETE FROM sirkuit WHERE id = :id";
    $this->executeQuery($query, ['id' => $id]);
    }
}

?>
