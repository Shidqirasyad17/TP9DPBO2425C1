<?php

interface KontrakViewSirkuit
{
    //menampilkan daftar sirkuit
    public function tampilSirkuit($listSirkuit): string;
    //menampilkan form untuk sirkuit
    public function tampilFormSirkuit($data = null): string;
}

?>
