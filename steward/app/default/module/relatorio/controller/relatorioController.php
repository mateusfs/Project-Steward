<?php
class relatorioController extends Security {

	public function index() {
		$this->wee->show('index');
	}


	public function gerar() {

		$nome = $this->getPost('relatorio');

		$this->wee->nome = $nome;

		require_once 'lib/plugins/pdf/html2pdf.class.php';


		ob_start();
		include 'app/default/module/relatorio/view/'.$nome.'.php';
		$content = ob_get_clean();

		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'en',  true, 'UTF-8');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content);
			$html2pdf->Output('StewardPDF - '.$nome.'.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}

	}
}