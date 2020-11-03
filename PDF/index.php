<?php
require('fpdf/fpdf.php');

class PDF extends FPDF{

    //Setzen des Headers
    function header(){
        $this->SetFont('Arial','B',15);
        //Abstand zur linken Seite
        $this->Cell(20);
        //Länge des Quadrats
        $this->Cell(50,10,'Kundenstamm',1,0,'C');
        $this->Ln(30);
    }

    //Setzen des Footers
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
    //Erstellung eines neuen PDFs
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    //Setzen der Font
    $pdf->SetFont('Times','',12);

    //Connection zur Datenabnk
    $con = mysqli_connect("", "root", "", "unternehmenxy");
    //Erstellung des Queries
    $res = mysqli_query($con, "SELECT * FROM mitarbeiter");

    //Ermittlung der Zahl für die Überprüfung der Einträge
    $num = mysqli_num_rows($res);

    if($num == 0)
    $pdf->Cell(0,10,"Keine Mitarbeiter",0,1);

    //Durchgehen aller Mitarbeiter
    while($dsatz = mysqli_fetch_assoc($res)){
        $pdf->Cell(0,10,"Mitarbeiter: ".$dsatz["name"],1,1);
        //Jeder Kunde hat einen Mitarbeiter, daher wird in der Datenbank nach den Id's der Mitarbeiter gesucht
        $resi = mysqli_query($con, "SELECT * FROM kunde WHERE idbet=".$dsatz["id"]);
        //Falls Mitarbeiter keine Kunden haben
        if(mysqli_num_rows($resi)==0)
            $pdf->Cell(0,10,"No entries for ".$dsatz["name"]);
        //Darstellung aller Kunden
            while($dsatzi = mysqli_fetch_assoc($resi)){
            $pdf->Cell(0,10,$dsatzi["name"],0,10);
        }
    
    }
    //Schliessen der Connection zur Datenbank
    mysqli_close($con);

    //Rückgabe des PDFs
    $pdf->Output();
?>