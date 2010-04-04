<?php
App::import('Vendor','xtcpdf');
// create new PDF document
$tcpdf = new XTCPDF('P', 'mm', array(100,70), true, 'UTF-8', false);
//$tcpdf = new XTCPDF();
$textfont      = 'freesans'; // looks better, finer, and more condensed than 'dejavusans'

$footerHeight = 15;

$tcpdf->SetAuthor("KBS Homes & Properties at http://kbs-properties.com ");
$tcpdf->SetAutoPageBreak( true, $footerHeight );
$tcpdf->SetTopMargin(10);
//$tcpdf->setHeaderFont(array($textfont,'',10));
//$tcpdf->xheadercolor = array(150,0,0);
//$tcpdf->xheadertext = 'Qual o Shopping que premia sua mãe?';
//$tcpdf->xfootertext = 'Copyright © %d KBS Homes & Properties. All rights reserved.';

// Now you position and print your page content




//teste de cupom

// remove default header/footer
$tcpdf->setPrintHeader(false);
$tcpdf->setPrintFooter(false);

$tcpdf->SetAutoPageBreak(false);

$html = '
<table border="1" cellpadding="10">
<tr><td>' . 
"".$teste
.'
    <span style="font-size:12px;text-align:center;font-weight:bold">Qual o Shopping que premia sua mãe?</span>
    <br />
    <br />
    <span style="font-size:10px;text-align:center;font-weight:bold">( ) Shopping XXXXXX         ( ) Outros</span>
    <br />
    <br />
    <span style="font-size:10px;text-align:center;font-weight:bold">Nome Completo:</span>
    <span style="text-decoration: underline">                                                                         </span>
    <br />
    <span style="font-size:10px;text-align:center;font-weight:bold">Endereço Completo:</span>
    <span style="text-decoration: underline">                                                                         </span>
    <br />
    <span style="font-size:10px;text-align:center;font-weight:bold">Telefone:</span>
    <span style="text-decoration: underline">                               </span>
    <span style="font-size:10px;text-align:center;font-weight:bold">Email:</span>
    <span style="text-decoration: underline">                               </span>
    <br />
    <span style="font-size:10px;text-align:center;font-weight:bold">CPF:</span>
    <span style="text-decoration: underline">                               </span>
    <span style="font-size:10px;text-align:center;font-weight:bold">RG:</span>
    <span style="text-decoration: underline">                               </span>
    <br />
    <br />
    <span style="font-size:8px;text-align:justify;">
    One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.
<br />
He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by
arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment.
<br />
His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked.
His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked.
"Whats happened to me? " he thought. It wasnt a dream. His room, a proper human room although a little too small,
lay peacefully between its four familiar walls.
<br />
A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a
picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.
<br />
However hard he threw himself onto his right, he always rolled back to where he was. He must have tried it a hundred times,
shut his eyes so that he wouldnt have to look at the floundering legs, and only stopped when he began to feel a mild, dull
pain there that he had never felt before.
<br />
It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of
her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard
hitting the pane, which made him feel quite sad.
<br />
How about if I sleep a little bit longer and forget all this nonsense, he thought, but that was something he was unable to do
because he was used to sleeping on his right
</span>
    </td></tr>
    </table>
    ';

// set UTF-8 font
$tcpdf->SetFont('dejavusans', '', 4);

// add a page
$tcpdf->AddPage();

// output the HTML content
$tcpdf->writeHTML($html, true, 0, true, true);

// add a page
$tcpdf->AddPage();

// output the HTML content
$tcpdf->writeHTML($html, true, 0, true, true);

//$tcpdf->Ln();

// reset pointer to the last page
$tcpdf->lastPage();



// force print dialog
$js = 'print(true);';

// set javascript
$tcpdf->IncludeJS($js);


$preferences = array(
	'HideToolbar' => true,
	'HideMenubar' => true,
	'HideWindowUI' => true,
	'FitWindow' => true,
	'CenterWindow' => true,
	//'DisplayDocTitle' => true,
	//'NonFullScreenPageMode' => 'UseNone', // UseNone, UseOutlines, UseThumbs, UseOC
	'ViewArea' => 'CropBox', // CropBox, BleedBox, TrimBox, ArtBox
	'ViewClip' => 'CropBox', // CropBox, BleedBox, TrimBox, ArtBox
	'PrintArea' => 'CropBox', // CropBox, BleedBox, TrimBox, ArtBox
	'PrintClip' => 'CropBox', // CropBox, BleedBox, TrimBox, ArtBox
	'PrintScaling' => 'AppDefault', // None, AppDefault
	'Duplex' => 'Simplex', // Simplex, DuplexFlipShortEdge, DuplexFlipLongEdge
	//'PickTrayByPDFSize' => true,
	//'PrintPageRange' => array(1,1,2,3),
	'NumCopies' => 1
);

// set pdf viewer preferences
$tcpdf->setViewerPreferences($preferences);



/*
// example:
$tcpdf->AddPage();
//$tcpdf->AddPath();
$tcpdf->SetTextColor(0, 0, 0);
$tcpdf->SetFont($textfont,'B',20);
$tcpdf->Cell(0,14, "Hello World", 0,1,'L');
;
// ...
// etc.
// see the TCPDF examples

//echo $tcpdf->Output('filename.pdf', 'D');
echo $tcpdf->Output('filename.pdf');
*/

/*
//http://www.tecnick.com/pagefiles/tcpdf/example_039.phps
// create some HTML content
$html = '<span style="text-align:justify;">a <u>abc</u> abcdefghijkl abcdef abcdefg <b>abcdefghi</b> a abc abcd 
    <img src="img/cake.power.gif" border="0" height="41" width="41" />
    <img src="img/cake.power.gif" alt="test alt attribute" width="100" height="100" border="0" />
    abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg <b>abcdefghi</b> a <u>abc</u> abcd abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg <b>abcdefghi</b> a abc abcd abcdef abcdefg abcdefghi a abc abcd <a href="http://tcpdf.org">abcdef abcdefg</a> start a abc before <span style="background-color:yellow">yellow color</span> after a abc abcd abcdef abcdefg abcdefghi a abc abcd end abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi a abc abcd abcdef abcdefg abcdefghi<br />abcd abcdef abcdefg abcdefghi<br />abcd abcde abcdef</span>';
// set core font
$tcpdf->SetFont('helvetica', '', 10);

// add a page
$tcpdf->AddPage();

// output the HTML content
$tcpdf->writeHTML($html, true, 0, true, true);

$tcpdf->Ln();

// set UTF-8 font
$tcpdf->SetFont('dejavusans', '', 10);

// output the HTML content
$tcpdf->writeHTML($html, true, 0, true, true);

// reset pointer to the last page
//$tcpdf->lastPage();
*/



// ---------------------------------------------------------

//Close and output PDF document
$tcpdf->Output('cupom_promocional.pdf', 'I');





?>