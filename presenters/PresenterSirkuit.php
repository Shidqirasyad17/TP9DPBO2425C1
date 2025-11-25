<?php
include_once(__DIR__ . "/KontrakPresenterSirkuit.php");
include_once(__DIR__ . "/../models/TabelSirkuit.php");
include_once(__DIR__ . "/../models/Sirkuit.php");
include_once(__DIR__ . "/../views/ViewSirkuit.php");
class PresenterSirkuit implements KontrakPresenterSirkuit
{
    private $tabelSirkuit;
    private $viewSirkuit;
    private $listSirkuit = [];

    //konstruktor
    public function __construct($tabelSirkuit, $viewSirkuit)
    {
        $this->tabelSirkuit = $tabelSirkuit;
        $this->viewSirkuit = $viewSirkuit;
    }

    //untuk menyiapkan data sirkuit sebelum ditampilkan
    public function initListSirkuit(): void
    {
        $data = $this->tabelSirkuit->getAllSirkuit();
        $this->listSirkuit = [];

        foreach ($data as $row) {
            $this->listSirkuit[] = new Sirkuit(
                $row['id'],
                $row['namaSirkuit'],
                $row['negara'],
                $row['panjangKm'],
                $row['jumlahTikungan']
            );
        }
    }

    //mengirim data sirkuit yang add ke view
    public function tampilkanSirkuit(): string
    {
        return $this->viewSirkuit->tampilSirkuit($this->listSirkuit);
    }

    //mengirim data ke form vie
    public function tampilkanFormSirkuit($id = null): string
    {
        $data = null;

        if ($id !== null) {
            $data = $this->tabelSirkuit->getSirkuitById($id);
        }

        return $this->viewSirkuit->tampilFormSirkuit($data);
    }

    //meneruskan data baru ke model
    public function tambahSirkuit($namaSirkuit, $negara, $panjangKm, $jumlahTikungan): void
    {
        $this->tabelSirkuit->addSirkuit($namaSirkuit, $negara, $panjangKm, $jumlahTikungan);
    }

    //meneruskan data yang sudah diedit ke model
    public function ubahSirkuit($id, $namaSirkuit, $negara, $panjangKm, $jumlahTikungan): void
    {
        $this->tabelSirkuit->updateSirkuit($id, $namaSirkuit, $negara, $panjangKm, $jumlahTikungan);
    }

    //menghapus data sirkuit berdasarkan id
    public function hapusSirkuit($id): void
    {
        $this->tabelSirkuit->deleteSirkuit($id);
    }
}

?>
