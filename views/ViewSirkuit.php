<?php

include_once("KontrakViewSirkuit.php");
include_once("models/Sirkuit.php");

class ViewSirkuit implements KontrakViewSirkuit
{
    public function __construct() {}


    public function tampilSirkuit($listSirkuit): string
    {
        $templatePath = __DIR__ . '/../template/skin.html';
        $template = file_get_contents($templatePath);

      
        $template = str_replace(
            'Daftar Pembalap',
            'Daftar Sirkuit',
            $template
        );

       
        $theadSirkuit = '
            <thead>
                <tr>
                    <th class="col-id">No</th>
                    <th>Nama Sirkuit</th>
                    <th>Negara</th>
                    <th>Panjang (Km)</th>
                    <th>Jumlah Tikungan</th>
                    <th class="col-actions">Aksi</th>
                </tr>
            </thead>
        ';

        
        $template = preg_replace('/<thead>.*?<\/thead>/s', $theadSirkuit, $template);

       
        $tbody = '';
        $no = 1;
        foreach ($listSirkuit as $s) {
            $tbody .= "<tr>";
            $tbody .= "<td class='col-id'>{$no}</td>";
            $tbody .= "<td>" . htmlspecialchars($s->getNamaSirkuit()) . "</td>";
            $tbody .= "<td>" . htmlspecialchars($s->getNegara()) . "</td>";
            $tbody .= "<td>" . htmlspecialchars($s->getPanjangKm()) . "</td>";
            $tbody .= "<td>" . htmlspecialchars($s->getJumlahTikungan()) . "</td>";
            $tbody .= "
                <td class='col-actions'>
                   <a href='index.php?entity=sirkuit&screen=edit&id={$s->getId()}' class='btn btn-edit'>Edit</a>
                    <button data-id='{$s->getId()}' class='btn btn-delete'>Hapus</button>
                </td>
            ";
            $tbody .= "</tr>";
            $no++;
        }

   
        $template = str_replace('<!-- PHP will inject rows here -->', $tbody, $template);

        $template = str_replace('Total:', 'Total: ' . count($listSirkuit), $template);

       
        $template = str_replace('+ Tambah Pembalap', '+ Tambah Sirkuit', $template);
        $template = str_replace('index.php?screen=add', 'index.php?entity=sirkuit&screen=add', $template);

        return $template;
    }

  public function tampilFormSirkuit($data = null): string
{
    $template = file_get_contents(__DIR__ . '/../template/form_sirkuit.html');

    if ($data) {
        $template = str_replace('value="addSirkuit"', 'value="editSirkuit"', $template);
        $template = str_replace('value="" id="form-id"', 'value="'.$data['id'].'" id="form-id"', $template);

        $template = str_replace('id="namaSirkuit" name="namaSirkuit" type="text" placeholder="Nama Sirkuit" required>',
            'id="namaSirkuit" name="namaSirkuit" type="text" value="'.htmlspecialchars($data['namaSirkuit']).'">',
            $template);

        $template = str_replace('id="negara" name="negara" type="text" placeholder="Nama negara">',
            'id="negara" name="negara" type="text" value="'.htmlspecialchars($data['negara']).'">',
            $template);

        $template = str_replace('id="panjangKm" name="panjangKm" type="number"',
            'id="panjangKm" name="panjangKm" type="number" value="'.$data['panjangKm'].'"',
            $template);

        $template = str_replace('id="jumlahTikungan" name="jumlahTikungan" type="number"',
            'id="jumlahTikungan" name="jumlahTikungan" type="number" value="'.$data['jumlahTikungan'].'"',
            $template);
    }

    return $template;
}


}

?>
