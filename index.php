<?php

include_once("models/DB.php");
//pembalap
include("models/TabelPembalap.php");
include("views/ViewPembalap.php");
include("presenters/PresenterPembalap.php");

$tabelPembalap = new TabelPembalap('localhost', 'mvp_db', 'root', '');
$viewPembalap = new ViewPembalap();
$presenterPembalap = new PresenterPembalap($tabelPembalap, $viewPembalap);

//sirkuti
include("models/TabelSirkuit.php");
include("views/ViewSirkuit.php");
include("presenters/PresenterSirkuit.php");

$tabelSirkuit = new TabelSirkuit('localhost', 'mvp_db', 'root', '');
$viewSirkuit = new ViewSirkuit();
$presenterSirkuit = new PresenterSirkuit($tabelSirkuit, $viewSirkuit);

//menentukan user apkaah sedang mengakses pembalap atausirkuti jika tidak ada request pemabalap = default
$entity = $_GET['entity'] ?? ($_POST['entity'] ?? 'pembalap');

//menangani tampilan form 
if (isset($_GET['screen'])) {
//untuk pembalap
    if ($entity == 'pembalap') {
        if ($_GET['screen'] == 'add') {
            echo $presenterPembalap->tampilkanFormPembalap();
            exit;
        }
        if ($_GET['screen'] == 'edit' && isset($_GET['id'])) {
            echo $presenterPembalap->tampilkanFormPembalap($_GET['id']);
            exit;
        }
    }
//untuk sirkuit
    if ($entity == 'sirkuit') {
        if ($_GET['screen'] == 'add') {
            echo $presenterSirkuit->tampilkanFormSirkuit();
            exit;
        }
        if ($_GET['screen'] == 'edit' && isset($_GET['id'])) {
            echo $presenterSirkuit->tampilkanFormSirkuit($_GET['id']);
            exit;
        }
    }
}
//action yang diambil add, edit, atau delet
if (isset($_POST['action'])) {

    //untuk pembalap
    if ($entity == 'pembalap') {
        if ($_POST['action'] == 'add') {
            $presenterPembalap->tambahPembalap(
                $_POST['nama'], $_POST['tim'], $_POST['negara'],
                $_POST['poinMusim'], $_POST['jumlahMenang']
            );
        }
        if ($_POST['action'] == 'edit') {
            $presenterPembalap->ubahPembalap(
                $_POST['id'], $_POST['nama'], $_POST['tim'], $_POST['negara'],
                $_POST['poinMusim'], $_POST['jumlahMenang']
            );
        }
        if ($_POST['action'] == 'delete') {
            $presenterPembalap->hapusPembalap($_POST['id']);
        }
    }

    //untuk sirkuit
    if ($entity == 'sirkuit') {
        if ($_POST['action'] == 'addSirkuit') {
            $presenterSirkuit->tambahSirkuit(
                $_POST['namaSirkuit'], $_POST['negara'],
                $_POST['panjangKm'], $_POST['jumlahTikungan']
            );
        }
        if ($_POST['action'] == 'editSirkuit') {
            $presenterSirkuit->ubahSirkuit(
                $_POST['id'], $_POST['namaSirkuit'], $_POST['negara'],
                $_POST['panjangKm'], $_POST['jumlahTikungan']
            );
        }
        if ($_POST['action'] == 'deleteSirkuit') {
            $presenterSirkuit->hapusSirkuit($_POST['id']);
        }
    }

    header("Location: index.php?entity=$entity");
    exit;
}

//menampilkan data pemabalap
if ($entity == 'pembalap') {
    $presenterPembalap->initListPembalap();
    echo $presenterPembalap->tampilkanPembalap();
}

//menampilkan data sirkuti
if ($entity == 'sirkuit') {
    $presenterSirkuit->initListSirkuit();
    echo $presenterSirkuit->tampilkanSirkuit();
}

?>
