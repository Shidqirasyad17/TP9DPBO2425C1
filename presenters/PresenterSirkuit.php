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

    public function tampilkanSirkuit(): string
    {
        return $this->viewSirkuit->tampilSirkuit($this->listSirkuit);
    }

    public function tampilkanFormSirkuit($id = null): string
    {
        $data = null;

        if ($id !== null) {
            $data = $this->tabelSirkuit->getSirkuitById($id);
        }

        return $this->viewSirkuit->tampilFormSirkuit($data);
    }

    public function tambahSirkuit($namaSirkuit, $negara, $panjangKm, $jumlahTikungan): void
    {
        $this->tabelSirkuit->addSirkuit($namaSirkuit, $negara, $panjangKm, $jumlahTikungan);
    }

    public function ubahSirkuit($id, $namaSirkuit, $negara, $panjangKm, $jumlahTikungan): void
    {
        $this->tabelSirkuit->updateSirkuit($id, $namaSirkuit, $negara, $panjangKm, $jumlahTikungan);
    }

    public function hapusSirkuit($id): void
    {
        $this->tabelSirkuit->deleteSirkuit($id);
    }
}

?>
