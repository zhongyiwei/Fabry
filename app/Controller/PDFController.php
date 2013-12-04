<?php

App::import('Vendor', 'PDFGenerator', array('file' => 'PDFGenerator/fpdf.php'));

class PDF extends FPDF {

    var $B;
    var $I;
    var $U;
    var $HREF;

// Simple table
    function BasicTable($header, $data, $width) {
        // Header
        foreach ($header as $col)
            $this->Cell($width, 7, $col, 1, 0, 'C');
        $this->Ln();
        // Data
        foreach ($data as $row) {
            foreach ($row as $col)
                $this->Cell($width, 6, $col, 1, 0, 'L');
            $this->Ln();
        }
    }

    function BasicTableForPain($header, $data) {
        // Header
//        foreach ($header as $col)

        for ($i = 0; $i < count($header); $i++) {
            if ($i != 1) {
                $this->Cell(40, 7, $header[$i], 1, 0, 'C');
            } else {
                $this->Cell(66, 7, $header[$i], 1, 0, 'C');
            }
        }
        $this->Ln();
        // Data
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($data[$i]); $j++) {
                if ($j != 1 && $j != 3) {
                    $this->SetFillColor(255, 255, 255);
                    $this->Cell(40, 6, $data[$i][$j], 1, 0, 'L');
                } else if ($j == 1) {
                    $this->Cell(6, 6, $data[$i][$j], 1, 0, 'L', true);
                    for ($p = 0; $p < $data[$i][$j]; $p++) {
                        $this->SetFillColor(205, 205, 205);
                        $this->Cell(6, 6, "", 1, 0, 'L', true);
                    }
                    for ($p = 0; $p < (10 - $data[$i][$j]); $p++) {
                        $this->SetFillColor(255, 255, 255);
                        $this->Cell(6, 6, "", 1, 0, 'L', true);
                    }
                } else if ($j == 3) {
                    $this->MultiCell(40, 6, $data[$i][$j], 1, 'L', true);
                }
            }
//            $this->Ln();
        }
//        foreach ($data as $row) {
//            foreach ($row as $col)
//                $this->Cell(40, 6, $col, 1, 0, 'L');
        $this->Ln();
//        }
    }

    function BasicTableBowel($header, $data) {
        // Header
//        foreach ($header as $col)

        for ($i = 0; $i < count($header); $i++) {
            if ($i == 2) {
                $this->Cell(80, 7, $header[$i], 1, 0, 'C');
            } else if ($i == 0) {
                $this->Cell(40, 7, $header[$i], 1, 0, 'C');
            } else {
                $this->Cell(66, 7, $header[$i], 1, 0, 'C');
            }
        }
        $this->Ln();
        // Data
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($data[$i]); $j++) {
                $nb = max($nb, $this->NbLines($this->widths[$j], $data[$i][$j]));
                $h = 6 * $nb;
            }
        }

        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($data[$i]); $j++) {
                $this->SetFont('Arial', '', 12);

                if ($j == 2) {
                    $this->SetFont('Arial', '', 10);
                    $this->SetFillColor(255, 255, 255);

                    $this->MultiCell(80, $h, $data[$i][$j], 1, 'L');
//                    $this->Ln();
                } else if ($j == 0) {
                    $this->SetFillColor(255, 255, 255);
                    $this->Cell(40, $h, $data[$i][$j], 1, 0, 'L', true);
                } else if ($j == 1) {
                    $this->Cell(6, $h, $data[$i][$j], 1, 0, 'C', true);
                    for ($p = 0; $p < $data[$i][$j]; $p++) {
                        $this->SetFillColor(205, 205, 205);
                        $this->Cell(10, $h, "", 1, 0, 'L', true);
                    }
                    for ($p = 0; $p < (6 - $data[$i][$j]); $p++) {
                        $this->SetFillColor(255, 255, 255);
                        $this->Cell(10, $h, "", 1, 0, 'L', true);
                    }
                }
            }
//            $this->Ln();
        }
//        foreach ($data as $row) {
//            foreach ($row as $col)
//                $this->Cell(40, 6, $col, 1, 0, 'L');
        $this->Ln();
//        }
    }

    function BasicTableExercise($header, $data) {
        // Header
//        foreach ($header as $col)

        for ($i = 0; $i < count($header); $i++) {
            if ($i == 6) {
                $this->Cell(80, 7, $header[$i], 1, 0, 'C');
            } else if ($i == 0) {
                $this->Cell(40, 7, $header[$i], 1, 0, 'C');
            } else {
                $this->Cell(15, 7, $header[$i], 1, 0, 'C');
            }
        }
        $this->Ln();
        // Data
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($data[$i]); $j++) {
                $nb = max($nb, $this->NbLines($this->widths[$j], $data[$i][$j]));
                $h = 6 * $nb;
            }
        }

        $options = array('none', '0-15', '15-30', '30-60', '>60');
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($data[$i]); $j++) {
                $this->SetFont('Arial', '', 12);

                if ($j == 2) {
                    $this->SetFont('Arial', '', 10);
                    $this->SetFillColor(255, 255, 255);

                    $this->MultiCell(80, $h, $data[$i][$j], 1, 'L');
//                    $this->Ln();
                } else if ($j == 0) {
                    $this->SetFillColor(255, 255, 255);
                    $this->Cell(40, $h, $data[$i][$j], 1, 0, 'L', true);
                } else {
                    for ($p = 0; $p < count($options); $p++) {
                        if ($data[$i][1] == $options[$p]) {
                            $this->SetFillColor(205, 205, 205);
                            $this->Cell(15, $h, "", 1, 0, 'L', true);
                        } else {
                            $this->SetFillColor(255, 255, 255);
                            $this->Cell(15, $h, "", 1, 0, 'L', true);
                        }
                    }
                }
            }
        }
        $this->Ln();
    }

    function BasicTableForAchievement($data, $i) {

//
//        // Header
//        foreach ($header as $col) {
//            $this->SetFont('Arial', 'B', 12);
//            $this->Cell(60, 7, $col, 1);
//        }
//        $this->Ln();
//
//        // Data
//        foreach ($data[$i] as $row) {
//            foreach ($row as $col) {
//                $this->SetFont('Arial', '', 12);
//                $this->Cell(60, 6, $col, 1,'L');
//            }
//            $this->Ln();
//        }
//        
        // Data
        foreach ($data[$i] as $row) {
            foreach ($row as $col) {
                $this->SetFont('Arial', '', 12);
                $this->MultiCell(180, 6, $col, 0, 'L');
            }
            $this->Ln(4);
        }
        $this->Cell(180, 0.1, '', 0.1, 0, 'L', true);
    }

    function NbLines($w, $txt) {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l+=$cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                }
                else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }

    var $widths;
    var $aligns;

    function SetWidths($w) {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a) {
        //Set the array of column alignments
        $this->aligns = $a;
    }

    function WriteHTML($html) {
        // HTML parser
        $html = str_replace("\n", ' ', $html);
        $a = preg_split('/<(.*)>/U', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
        foreach ($a as $i => $e) {
            if ($i % 2 == 0) {
                // Text
                if ($this->HREF)
                    $this->PutLink($this->HREF, $e);
                else
                    $this->Write(5, $e);
            }
            else {
                // Tag
                if ($e[0] == '/')
                    $this->CloseTag(strtoupper(substr($e, 1)));
                else {
                    // Extract attributes
                    $a2 = explode(' ', $e);
                    $tag = strtoupper(array_shift($a2));
                    $attr = array();
                    foreach ($a2 as $v) {
                        if (preg_match('/([^=]*)=["\']?([^"\']*)/', $v, $a3))
                            $attr[strtoupper($a3[1])] = $a3[2];
                    }
                    $this->OpenTag($tag, $attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr) {
        // Opening tag
        if ($tag == 'B' || $tag == 'I' || $tag == 'U')
            $this->SetStyle($tag, true);
        if ($tag == 'A')
            $this->HREF = $attr['HREF'];
        if ($tag == 'BR')
            $this->Ln(5);
    }

    function PutLink($URL, $txt) {
        // Put a hyperlink
        $this->SetTextColor(0, 0, 255);
        $this->SetStyle('U', true);
        $this->Write(5, $txt, $URL);
        $this->SetStyle('U', false);
        $this->SetTextColor(0);
    }

    function SetStyle($tag, $enable) {
        // Modify style and select corresponding font
        $this->$tag += ($enable ? 1 : -1);
        $style = '';
        foreach (array('B', 'I', 'U') as $s) {
            if ($this->$s > 0)
                $style .= $s;
        }
        $this->SetFont('', $style);
    }

    function CloseTag($tag) {
        // Closing tag
        if ($tag == 'B' || $tag == 'I' || $tag == 'U')
            $this->SetStyle($tag, false);
        if ($tag == 'A')
            $this->HREF = '';
    }

    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, '~Page ' . $this->PageNo() . '~', 0, 0, 'C');
    }

    // Page header
    function Header() {
        // Logo
        $this->SetTextColor(200);
//        $this->SetFont('Arial', 'I', 50);
//        $this->Cell(14, 20, 'O');
//        // Arial bold 15
//        $this->Image('CSS/images/O2_logoPDF.png', 10, 6, 20);
        $this->Cell(5);
        $this->SetFont('Arial', '', 15);
        // Move to the right
        // Title
        $this->Cell(33, 25, 'Fabry.com');


        $this->Cell(88);
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(50, 25, 'Support Group - Australia');
        // Line break
        $this->Ln(16);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(200, 1, '', 0.1, 1, 'C', true);
        $this->Ln(1);
        $this->Cell(170);
        $this->Cell(90, 1, '', 0.1, 1, 'R', true);
        $this->Ln(10);
    }

}

App::uses('AppController', 'Controller');

class PDFController extends AppController {

    public function painReport() {

        if ($this->request->is(array('post', 'put'))) {
            $start = $this->request->data['Pain']['start'];
            $end = $this->request->data['Pain']['end'];
            $start = date('Y-m-d', strtotime($start));
            $end = date('Y-m-d', strtotime($end));
//            $conditions = array(
//                'conditions' => array(
//                    'and' => array(
//                        array('date <= ' => $end,
//                            'date >= ' => $start
//                        ),
//            )));
            $uid = $this->current_user['id'];
            $painData = $this->Pain->find('all', array('conditions' => array('date BETWEEN ? AND ?' => array($start, $end), 'users_id' => $uid), 'order' => array('date')));

//        $this->layout = 'pdf'; //this will use the pdf.ctp layout
            $PDFTableData = NULL;
            $takeMedicineDays = 0;
            for ($i = 0; $i < count($painData); $i++) {
                $PDFTableData[$i][0] = date('d-m-Y', strtotime($painData[$i]['Pain']['date']));
                $PDFTableData[$i][1] = $painData[$i]['Pain']['painLevel'];
                $status = ($painData[$i]['Pain']['medication'] == 1 ? "Taken" : "Not Taken");
                $PDFTableData[$i][2] = $status;
                $PDFTableData[$i][3] = $painData[$i]['Pain']['illness'];


                if ($painData[$i]['Pain']['medication'] == 1) {
                    $takeMedicineDays++;
                }
            }

            $this->response->type('pdf');

//            $this->set('fpdf', new FPDF('P', 'mm', 'A4'));
            $pdf = new PDF();
            $pdf->AddPage();

            $pdf->SetFont('Arial', 'B', 16);
            $title = 'Fabry Pain Chart';
            $pdf->Cell(70, 10, $title, 0, 1);
            $pdf->Ln(2);
            $pdf->SetFont('Arial', '', 12);
            $start = date('d-m-Y', strtotime($start));
            $end = date('d-m-Y', strtotime($end));
            $pdf->Cell(180, 10, "Date: Between " . $start . " and " . $end, 0, 1);
            $pdf->Ln(1);
            $pdf->Cell(180, 10, "Number of Days Take medicine: " . $takeMedicineDays . " Days", 0, 1);
            $pdf->Ln(1);

            $painLevelSmall = 0;
            $painLevelMedium = 0;
            $painLevelBig = 0;
            for ($i = 0; $i < count($painData); $i++) {
                if ($painData[$i]['Pain']['painLevel'] <= 3) {
                    $painLevelSmall++;
                } else if ($painData[$i]['Pain']['painLevel'] <= 6) {
                    $painLevelMedium++;
                } else {
                    $painLevelBig++;
                }
            }

            $pdf->Cell(180, 10, "Number of Days Low Pain Level (0-3) : " . $painLevelSmall . " Days", 0, 1);

            $pdf->Cell(180, 10, "Number of Days Medium Pain Level (4-6) :  " . $painLevelMedium . " Days", 0, 1);

            $pdf->Cell(180, 10, "Number of Days High Pain Level (7-10) : " . $painLevelBig . " Days", 0, 1);
            $pdf->Ln();

            $PDFTableHeader = array('Date', 'Pain Level (1-10)', 'Medications Taken', 'Illness');
//            $levelDiagram = "";


            $pdf->BasicTableForPain($PDFTableHeader, $PDFTableData);
            $pdf->Ln(10);

//            $this->render('painReport');
            $pdf->SetCreator('Fabry');

            $pdf->Output('Pain Report.pdf', 'I');
        }
    }

    public function bowelReport() {

        if ($this->request->is(array('post', 'put'))) {
            $start = $this->request->data['Bowel']['start'];
            $end = $this->request->data['Bowel']['end'];
            $start = date('Y-m-d', strtotime($start));
            $end = date('Y-m-d', strtotime($end));
            $uid = $this->current_user['id'];
            $bowelData = $this->Bowel->find('all', array('conditions' => array('date BETWEEN ? AND ?' => array($start, $end), 'users_id' => $uid), 'order' => array('date')));

//        $this->layout = 'pdf'; //this will use the pdf.ctp layout
            $PDFTableData = NULL;
            for ($j = 1; $j < 7; $j++) {
                $Move['Bowel'][$j] = 0;
            }

            for ($i = 0; $i < count($bowelData); $i++) {

                $PDFTableData[$i][0] = date('d-m-Y', strtotime($bowelData[$i]['Bowel']['date']));
                $PDFTableData[$i][1] = $bowelData[$i]['Bowel']['count'];
                $PDFTableData[$i][2] = $bowelData[$i]['Bowel']['comment'];

                for ($j = 1; $j < 7; $j++) {
                    if ($bowelData[$i]['Bowel']['count'] == $j) {
                        $Move['Bowel'][$j]++;
                    }
                }
            }

            $this->response->type('pdf');

//            $this->set('fpdf', new FPDF('P', 'mm', 'A4'));
            $pdf = new PDF();
            $pdf->AddPage();

            $pdf->SetFont('Arial', 'B', 16);
            $title = 'Fabry Bowel Chart';
            $pdf->Cell(70, 10, $title, 0, 1);
            $pdf->Ln(2);
            $pdf->SetFont('Arial', '', 12);
            $start = date('d-m-Y', strtotime($start));
            $end = date('d-m-Y', strtotime($end));
            $pdf->Cell(180, 10, "Date: Between " . $start . " and " . $end, 0, 1);
            $pdf->Ln(1);
//            for ($j = 1; $j < 7; $j++) {
////                $temp = $j+1;
//                $pdf->Cell(180, 10, "Number of Days having  $j movement: " . $Move['Bowel'][$j] . " Days", 0, 1);
//            }
            $pdf->Cell(180, 10, "Number of Days having  n movement: ", 0, 1);
            $movementHeader = array('1 Move', '2 Move', '3 Move', '4 Move','5 Move','6 Move');
            $pdf->BasicTable($movementHeader, $Move, 20);
            
            $pdf->Ln(10);
            $PDFTableHeader = array('Date', 'Bowel Movement (0 - 6)', 'Comments');

            $pdf->BasicTableBowel($PDFTableHeader, $PDFTableData);
            $pdf->Ln(10);

//            $this->render('painReport');
            $pdf->SetCreator('Fabry');

            $pdf->Output('Bowel Report.pdf', 'I');
        }
    }

    public function exerciseReport() {

        if ($this->request->is(array('post', 'put'))) {
            $start = $this->request->data['Exercise']['start'];
            $end = $this->request->data['Exercise']['end'];
            $start = date('Y-m-d', strtotime($start));
            $end = date('Y-m-d', strtotime($end));
            $uid = $this->current_user['id'];
            $exerciseData = $this->Exercise->find('all', array('conditions' => array('date BETWEEN ? AND ?' => array($start, $end), 'users_id' => $uid), 'order' => array('date')));

//        $this->layout = 'pdf'; //this will use the pdf.ctp layout
            $PDFTableData = NULL;

            for ($i = 0; $i < count($exerciseData); $i++) {

                $PDFTableData[$i][0] = date('d-m-Y', strtotime($exerciseData[$i]['Exercise']['date']));
                $PDFTableData[$i][1] = $exerciseData[$i]['Exercise']['durationMinute'];
                $PDFTableData[$i][2] = $exerciseData[$i]['Exercise']['comment'];
            }

            $this->response->type('pdf');

//            $this->set('fpdf', new FPDF('P', 'mm', 'A4'));
            $pdf = new PDF();
            $pdf->AddPage();

            $pdf->SetFont('Arial', 'B', 16);
            $title = 'Fabry Exercise Chart';
            $pdf->Cell(70, 10, $title, 0, 1);
            $pdf->Ln(2);
            $pdf->SetFont('Arial', '', 12);

            $start = date('d-m-Y', strtotime($start));
            $end = date('d-m-Y', strtotime($end));
            $pdf->Cell(180, 10, "Date: Between " . $start . " and " . $end, 0, 1);
            $pdf->Ln(1);

            $missingDays = 0;
            for ($j = 0; $j < count($exerciseData); $j++) {
                if ($exerciseData[$j]['Exercise']['durationMinute'] == "none") {
                    $missingDays++;
                }
            }
            $pdf->Cell(180, 10, "Number of Days missed exercise: " . $missingDays . " Days", 0, 1);

            $pdf->Ln(1);
            $PDFTableHeader = array('Date', 'None', '0-15', '15-30', '30-60', '>60', 'Comments');

            $pdf->Cell(40, 7, "", 1, 0, 'C');
            $pdf->Cell(75, 7, "Exercise Hours", 1, 0, 'C');
            $pdf->Cell(80, 7, "", 1, 0, 'C');
            $pdf->Ln(7);
            $pdf->BasicTableExercise($PDFTableHeader, $PDFTableData);
            $pdf->Ln(10);

//            $this->render('painReport');
            $pdf->SetCreator('Fabry');

            $pdf->Output('Exercise Report.pdf', 'I');
        }
    }

    public function medicationReport() {
        if ($this->request->is(array('post', 'put'))) {
            $start = $this->request->data['Medication']['start'];
            $end = $this->request->data['Medication']['end'];
            $start = date('Y-m-d', strtotime($start));
            $end = date('Y-m-d', strtotime($end));

            $uid = $this->current_user['id'];

            $medicationData = $this->Medication->find('all', array('conditions' => array('start BETWEEN ? AND ?' => array($start, $end), 'users_id' => $uid), 'order' => array('start')));

//        $this->layout = 'pdf'; //this will use the pdf.ctp layout
            $PDFTableData = NULL;

            for ($i = 0; $i < count($medicationData); $i++) {

                $PDFTableData[$i][0] = $medicationData[$i]['Medication']['medicationName'];
                $PDFTableData[$i][1] = $medicationData[$i]['Medication']['strengthEachPill'];
                $PDFTableData[$i][2] = $medicationData[$i]['Medication']['doseEachTime'];
                $PDFTableData[$i][3] = $medicationData[$i]['Medication']['frequency'];
                $PDFTableData[$i][4] = $medicationData[$i]['Medication']['start'];
            }

            $this->response->type('pdf');

//            $this->set('fpdf', new FPDF('P', 'mm', 'A4'));
            $pdf = new PDF("L");
            $pdf->AddPage();

            $pdf->SetFont('Arial', 'B', 16);
            $title = 'Fabry Medication Chart';
            $pdf->Cell(70, 10, $title, 0, 1);
            $pdf->Ln(2);
            $pdf->SetFont('Arial', '', 12);

            $PDFTableHeader = array('Medication Name', 'Strength', 'DOSE', 'Frequency', 'Medicine Commence Time');

            $pdf->BasicTable($PDFTableHeader, $PDFTableData,52);
            $pdf->Ln(10);

//            $this->render('painReport');
            $pdf->SetCreator('Fabry');

            $pdf->Output('Medication Report.pdf', 'I');
        }
    }

}

?>
