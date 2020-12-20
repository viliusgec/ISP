<?php
session_start();
require('fpdf/fpdf.php');
include("../database/database.class.php");

$databaseObj = new database(); 
$conn = $databaseObj->connect();
$userid = $_SESSION['userID'];
$sql = "SELECT DATE_FORMAT(sudaryta, '%Y-%m-%d') as data, pavadinimas, tipas, kaina FROM `sutartis`
INNER JOIN `kursai` ON `sutartis`.fk_kursai = `kursai`.id WHERE `sutartis`.fk_klientas = '$userid'";
   $result = $conn -> query($sql);

   while($row = mysqli_fetch_assoc($result)){
       $sudaryta = $row["data"];
       $pavadinimas = $row["pavadinimas"];
       $tipas = $row["tipas"];
       $kaina = $row["kaina"];
    }
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('arial','B',16);
$pdf->Cell(40,10,iconv("UTF-8", "CP1252//TRANSLIT", "Vairavimo mokykla ,,Traktoristas aš esu“"),0,1,'L');
$pdf->SetFont('arial','B',12);
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", "Jūsų duomenys: "),0,1,'L');
$pdf->SetFont('arial','',10);
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", "Jūsų vardas: " . $_SESSION['vardas']),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", "Jūsų pavardė: " . $_SESSION['pavarde']),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", "Jūsų asmens kodas: " . $_SESSION['userID']),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", "Susisiekimo duomenys: " . $_SESSION['epastas']),0,1,'L');
$pdf->SetFont('arial','B',12);
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", "Kursų duomenys: "),0,1,'L');
$pdf->SetFont('arial','',10);
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", "Pasirinkti kursai: " . $pavadinimas),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", "Pasirinkti kursų laikas: " . $tipas),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", "Kursų kaina: " . $kaina . "$"),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", "Sutartis sudaryta: " . $sudaryta),0,1,'L');

$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", ""),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", ""),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", ""),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", ""),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", ""),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", ""),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", ""),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", ""),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", ""),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", ""),0,1,'L');
$pdf->SetFont('arial','B',12);
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", "Sutarties taisyklės ir nurodymai: "),0,1,'L');
$pdf->AddPage();

$pdf->SetFont('arial','',10);
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
sed do eiusmod tempor "),0,1,'L');
$pdf->Cell(10,10,iconv("UTF-8", "CP1252//TRANSLIT", "incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
quis nostrud exercitation
 ullamco"),0,1,'L');


$pdf->Output();
?>