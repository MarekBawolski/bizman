<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class QuoteDocumentController extends Controller
{
    public function generatePdf(Quote $quote)
    {
        $dompdf = new Dompdf();

        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $dompdf->setOptions($options);

        $dompdf->loadHtml(view('quotes.pdf', [
            'quote' => $quote
        ]));

        $dompdf->setPaper('A4', 'horizontal');
        $dompdf->render();
        $dompdf->stream('sapmple.pdf', array("Attachment" => false));
    }
}
