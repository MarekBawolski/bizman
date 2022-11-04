<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Quote;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class QuoteDocumentController extends Controller
{
    public function generatePdf(Quote $quote)
    {
        $client = Client::where('id', '=', $quote->client_id)->get()->first();

        $tmp = sys_get_temp_dir();
        $dompdf = new Dompdf([
            'logOutputFile' => '',
            'isRemoteEnabled' => true,
            'fontDir' => $tmp,
            'fontCache' => $tmp,
            'tempDir' => $tmp,
            'chroot' => $tmp,
        ]);

        $dompdf->loadHtml(view('quotes.pdf', [
            'quote' => $quote,
            'client' => $client
        ]));

        $dompdf->setPaper('A4', 'horizontal');
        $dompdf->render();
        $dompdf->stream('sapmple.pdf', array("Attachment" => false));
    }
}
