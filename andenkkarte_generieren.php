<?php


include("php/config.php");
include("includes/sessions.php");
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



//foreach ($_POST['kategorie'] as &$value) {
//    $sql= "SELECT * FROM category where fs_event = ".$_SESSION['event']." AND category_id = ".$value.";";
//    $res = mysqli_query($db,$sql);
//    if(mysqli_num_rows($res) >= 1){
//        $row = mysqli_fetch_array($res);
//        $category_name = $row['category_name'];
//        
//        $pdf->AddPage(); 
//        
//        $pdf->Cell(80);
//        $pdf->SetFont('Arial','B',14);
//        $pdf->Cell(30,10,"Kategorie: ".$row['category_name']." Distanz: ".$row['track_length'],0,0,'C');
//        $pdf->Ln(9);


   $sql= "SELECT * FROM `laptimes` inner join `participants` on fs_participant = participant_id inner join person on fs_person = person_id where fs_event = ".$_SESSION['event'].";";
        //$sql= "SELECT * FROM `laptimes` inner join `participants` on fs_participant = participant_id inner join person on fs_person = person_id where fs_event = ".$_SESSION['event']." and fs_category = ".$value." order by isnull(second_lap),second_lap,isnull(first_lap),first_lap;";
        $res = mysqli_query($db,$sql);
       
        $rang = 1;
        while($row = mysqli_fetch_array($res)){
            $pdf->AddPage('P','A5'); 
             $pdf->SetFont('Arial','B',20);
            $pdf->Ln(10);
            //$pdf->Cell(60,0,'');
            $pdf->Cell(0,0,'De Schnellst Eschebacher 2017',0,0,'C');
            $pdf->Ln(10);
            $pdf->Cell(0,0,'Auszeichnung',0,0,'C');
            $pdf->Ln(80);
            
            $pdf->SetFont('Arial','B',18);
            $pdf->Cell(15,10,'',0,0,'C'); 
            $pdf->Cell(60,10,utf8_decode($row['name'])." ".utf8_decode($row['firstname']),0,0,'A');
            $pdf->Ln(15);
            
            $pdf->SetFont('Arial','',16);
            
            $sql2 = "SELECT track_length from category where category.category_id = ".$row['fs_category'].";";
            $res2 = mysqli_query($db,$sql2);
            $row2 = mysqli_fetch_array($res2);
                
            $pdf->Cell(15,10,'',0,0,'C'); 
            $pdf->Cell(30,10,'Distanz: ',0,0,'A');
            $pdf->Cell(15,10,$row2['track_length']. ' Meter',0,0,'A');
            $pdf->Ln(9);
            $pdf->Cell(15,10,'',0,0,'C'); 
            $pdf->Cell(30,10,'Rang: ',0,0,'A');
            $pdf->Cell(15,10,$row['first_lap']. '. Rang',0,0,'A');
            $pdf->Ln(9);
            $pdf->Cell(15,10,'',0,0,'C'); 
            $pdf->Cell(30,10,'Zeit: ',0,0,'A');
            $pdf->Cell(15,10,$row['first_lap']. ' Sekunden',0,0,'A');
            $pdf->Ln(9);
            if($row['second_lap'] != NULL){
                $pdf->Cell(15,10,'',0,0,'C'); 
                $pdf->Cell(30,10,'Zeit Finallauf: ',0,0,'A');
                $pdf->Cell(15,10,$row['first_lap']. ' Sekunden',0,0,'A');
            }
            
            $pdf->Image('_img/deschnellsteschenbacher_logo.png',50,40,50);
            $pdf->Image('_img/sportclubdiemberg_logo_klein.png',20,171,33);
            $pdf->Image('_img/sponsor_raiffeisen.png',70,170,45);
            //$pdf->Cell(30,10,$row['first_lap'],0,0,'A');
            //$pdf->Cell(30,10,$row['second_lap'],0,0,'A');
            $pdf->Ln(7);
            $rang++;
        }

    //}
//}



$pdf->AliasNbPages('{nb}');
$pdf->Output();
?>