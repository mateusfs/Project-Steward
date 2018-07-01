<?php
class exportarController extends Security {

	public function index() {
		$this->wee->show('index');
	}


	public function exportarDOC() {
		$this->wee->show('doc', false);
	}

	public function exportarPDF() {
		require_once 'lib/plugins/pdf/html2pdf.class.php';


		ob_start();
		include 'app/default/module/exportar/view/pdf.php';
		$content = ob_get_clean();

		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'en',  true, 'UTF-8');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content);
			$html2pdf->Output('StewardPDF.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	}

	public function exportarEXCEL() {
		$this->wee->show('excel', false);
	}
}