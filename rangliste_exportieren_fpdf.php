<?php


include("php/config.php");
include("includes/sessions4.php");
include("fpdf/fpdf.php"); 


class PDF extends FPDF {
    // Kopfzeile
    function Header(){

    } 

    // Fusszeile
    function Footer(){



    }
}

$pdf=new PDF(); 
$pdf->AddPage(); 
	
	/*$sql="SELECT * FROM event where event_id = ".$_SESSION['event'].";";
	$res = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($res);
	
	$pdf->Cell(80);
	$pdf->SetFont('Arial','B',20);
	$pdf->Cell(70,30,$row['event_name'],0,0,'C');*/

foreach ($_POST['kategorie'] as &$value) {
    $sql= "SELECT * FROM category where fs_event = ".$_SESSION['event']." AND category_id = ".$value.";";
    $res = mysqli_query($db,$sql);
    if(mysqli_num_rows($res) >= 1){
        $row = mysqli_fetch_array($res);
        $category_name = $row['category_name'];

        $pdf->Cell(80);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(30,10,"Kategorie: ".$row['category_name']." Distanz: ".$row['track_length']." Jahrgang: ".$row['year_of_birth_start']."-".$row['year_of_birth_end']." Geschlecht: ".$row['gender'],0,0,'C');
        $pdf->Ln(9);



        $sql= "SELECT * FROM `laptimes` inner join `participants` on fs_participant = participant_id inner join person on fs_person = person_id where fs_event = ".$_SESSION['event']." and fs_category = ".$value." order by isnull(second_lap),second_lap,isnull(first_lap),first_lap;";
        $res = mysqli_query($db,$sql);
        $rang = 1;
		
		$pdf->SetFont('Arial','B',12);
		
		$pdf->Cell(15,10,'Rang',0,0,'C');
        $pdf->Cell(70,10,'Name Vorname',0,0,'A');
        $pdf->Cell(40,10,'Adresse',0,0,'A');
        $pdf->Cell(30,10,'Geburtsdatum',0,0,'A');
		$pdf->Cell(30,10,'1. Runde',0,0,'A');
        $pdf->Cell(30,10,'2. Runde',0,0,'A');
        $pdf->Ln(8);
		
		$pdf->SetFont('Arial','',12);
		
		while($row = mysqli_fetch_array($res))	
		{
            $pdf->Cell(15,10,$rang,0,0,'C');
            $pdf->Cell(70,10,$row['name']." ".$row['firstname'],0,0,'A');
            $pdf->Cell(40,10,$row['street'],0,0,'A');
            $pdf->Cell(30,10,$row['birthdate'],0,0,'C');
            $pdf->Cell(30,10,$row['first_lap'].'s',0,0,'A');
            $pdf->Cell(30,10,$row['second_lap'].'s',0,0,'A');
            $pdf->Ln(7);
            $rang++;
        }
		$pdf->Ln(7);
    }
}




$pdf->Output();
?>