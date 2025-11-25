<?php

include_once("KontrakViewMobil.php");
include_once("models/Mobil.php");

class ViewMobil implements KontrakViewMobil
{
    public function __construct()
    {
        // kosong
    }

    // tampilkan daftar mobil
    public function tampilMobil($listMobil): string
    {
        $tbody = '';
        $no = 1;

        foreach ($listMobil as $mobil) {
            $tbody .= '<tr>';
            $tbody .= '<td class="col-id">' . $no . '</td>';
            $tbody .= '<td>' . htmlspecialchars($mobil->getNamaMobil()) . '</td>';
            $tbody .= '<td>' . htmlspecialchars($mobil->getPabrikan()) . '</td>';
            $tbody .= '<td>' . htmlspecialchars($mobil->getTipe()) . '</td>';
            $tbody .= '<td>' . htmlspecialchars($mobil->getCc()) . '</td>';
            $tbody .= '<td>' . htmlspecialchars($mobil->getTopSpeed()) . '</td>';
            $tbody .= '<td>' . htmlspecialchars($mobil->getPembalapId()) . '</td>';

            $tbody .= '<td class="col-actions">
                        <a href="index.php?screen_mobil=edit&id='. $mobil->getId() .'" class="btn btn-edit">Edit</a>
                        <button data-id="'. $mobil->getId() .'" class="btn btn-delete">Hapus</button>
                       </td>';

            $tbody .= '</tr>';
            $no++;
        }

        // Load template tabel mobil
        $templatePath = __DIR__ . '/../template/skin_mobil.html';
        $template = '';

        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);

            $template = str_replace('<!-- MOBIL_ROWS -->', $tbody, $template);
            $total = count($listMobil);
            $template = str_replace('Total:', 'Total: ' . $total, $template);

            return $template;
        }

        return $tbody;
    }


    // tampilkan form mobil
    public function tampilFormMobil($data = null): string
    {
        $templatePath = __DIR__ . '/../template/form_mobil.html';

        if (!file_exists($templatePath)) {
            return "<p>Form template mobil tidak ditemukan.</p>";
        }

        $template = file_get_contents($templatePath);

        if ($data) {
            $template = str_replace('value="add" id="mobil-action"', 'value="edit" id="mobil-action"', $template);

            $template = str_replace('value="" id="mobil-id"', 'value="' . htmlspecialchars($data['id']) . '" id="mobil-id"', $template);

            $template = str_replace('id="namaMobil"', 'id="namaMobil" value="' . htmlspecialchars($data['nama_mobil']) . '"', $template);

            $template = str_replace('id="pabrikan"', 'id="pabrikan" value="' . htmlspecialchars($data['pabrikan']) . '"', $template);

            $template = str_replace('id="tipe"', 'id="tipe" value="' . htmlspecialchars($data['tipe']) . '"', $template);

            $template = str_replace('id="cc"', 'id="cc" value="' . htmlspecialchars($data['cc']) . '"', $template);

            $template = str_replace('id="topSpeed"', 'id="topSpeed" value="' . htmlspecialchars($data['top_speed']) . '"', $template);

            $template = str_replace('id="pembalapId"', 'id="pembalapId" value="' . htmlspecialchars($data['pembalap_id']) . '"', $template);
        }

        return $template;
    }
}

?>