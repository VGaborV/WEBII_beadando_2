<?php
class termekekController {
    
    private $model;
    
    function __construct() {
        $this->model = new termekekModel();
    }
    
    function render() {


        if (isset($_GET['ajax']) && $_GET['ajax'] === '1') {
            return render('View/termek-lista.php', [
                'termekek' => $this->model->termekek(
                    isset($_GET['oprendszer']) ? ($_GET['oprendszer']) : null,
                    isset($_GET['gyarto']) ? ($_GET['gyarto']) : null,
                    isset($_GET['processzor']) ? ($_GET['processzor']) : null,
                ),
            ]);
        } elseif (isset($_GET['pdf']) && $_GET['pdf'] === '1') {
            $termekek = $this->model->termekek(
            isset($_GET['oprendszer']) ? ($_GET['oprendszer']) : null,
            isset($_GET['gyarto']) ? ($_GET['gyarto']) : null,
            isset($_GET['processzor']) ? ($_GET['processzor']) : null,
            );

            require_once('Vendor/tcpdf/tcpdf.php');

            $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('ReNew Kft');
            $pdf->SetTitle('Laptop export');
            $pdf->SetSubject('Laptop export');
            $pdf->SetFont('dejavusans', '', 8, '', true);

            $pdf->AddPage();

            $html = render('View/termek-lista.php', [
                'termekek' => $this->model->termekek(
                    isset($_GET['oprendszer']) ? ($_GET['oprendszer']) : null,
                    isset($_GET['gyarto']) ? ($_GET['gyarto']) : null,
                    isset($_GET['processzor']) ? ($_GET['processzor']) : null,
                ),
            ]);

            $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
            $pdf->Output('gep-export.pdf', 'I');

            exit;
        } else {
            return render('View/termekek.php', [
                'processzorGyarto' => $this->model->processzorGyarto(),
                'oprendszerek'  => $this->model->oprendszerek(),
                'gepGyarto'  => $this->model->gepGyarto()
            ]);
        }
    }   
}