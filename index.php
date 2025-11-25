<?php

include_once("models/DB.php");

/* ===============================
    PEMBALAP
=============================== */
include("models/TabelPembalap.php");
include("views/ViewPembalap.php");
include("presenters/PresenterPembalap.php");

$tabelPembalap = new TabelPembalap('localhost', 'mvp_db', 'root', '');
$viewPembalap = new ViewPembalap();
$presenterPembalap = new PresenterPembalap($tabelPembalap, $viewPembalap);


/* ===============================
    SIRKUIT
=============================== */
include("models/TabelSirkuit.php");
include("views/ViewSirkuit.php");
include("presenters/PresenterSirkuit.php");

$tabelSirkuit = new TabelSirkuit('localhost', 'mvp_db', 'root', '');
$viewSirkuit = new ViewSirkuit();
$presenterSirkuit = new PresenterSirkuit($tabelSirkuit, $viewSirkuit);


/* ===============================
    CEK ENTITY
=============================== */
$entity = $_GET['entity'] ?? ($_POST['entity'] ?? 'pembalap');


/* ===============================
    ROUTING GET
=============================== */
if (isset($_GET['screen'])) {

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


/* ===============================
    ROUTING POST
=============================== */
if (isset($_POST['action'])) {

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


/* ===============================
    DEFAULT TAMPILAN
=============================== */

if ($entity == 'pembalap') {
    $presenterPembalap->initListPembalap();
    echo $presenterPembalap->tampilkanPembalap();
}

if ($entity == 'sirkuit') {
    $presenterSirkuit->initListSirkuit();
    echo $presenterSirkuit->tampilkanSirkuit();
}

?>
