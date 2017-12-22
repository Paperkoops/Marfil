<?php
include 'fpdf.php';
include 'exfpdf.php';
include 'easyTable.php';
include('../aula/database.php');

if (isset($_GET['g'])) {
    $id=$_GET['g'];
    $sql="SELECT * from grado Where Id_Grado=? AND Status=?";
    $values=array($id, 1);
    $datosgradoo=Database::getRow($sql, $values);
  }
  else
  {
    header("location: ../aula/calificaciones.php");
  }

  

 $pdf=new exFPDF();
 $pdf->AddPage('P', 'Letter'); 
 $pdf->SetFont('helvetica','',10);
 $pdf->AddFont('FontUTF8','','Lato-Regular.php'); 
 $pdf->AddFont('FontUTF8','B','Arimo-Bold.php');
 $pdf->AddFont('FontUTF8','I','Arimo-Italic.php');
 $pdf->AddFont('FontUTF8','BI','Arimo-BoldItalic.php');


$sql="SELECT * FROM alumno WHERE Status=? AND Id_Grado=? ORDER BY Apellido_Alumno";
$values=array(1, $datosgradoo['Id_Grado']);
$datos=Database::getRows($sql, $values);
$menu="";
$numeroAlumno = 1;
  

foreach ($datos as $filaalumno) 
{
////////////Se verifica si es educacion basica o bachillerato 1=basica 2=bachillerato
    if ($datosgradoo['Tipo']==1) {
        $table=new easyTable($pdf, 21, 'width:700; border-color:#000; font-size:10; border:1; paddingY:2;');
        
         $table->rowStyle('align:{C}; bgcolor:#FFA190;font-style:B');
         $table->easyCell("Colegio Nuevo Milenio, Col. Las Brisas Soyapango.", 'colspan:16; font-size:8');
         $table->easyCell("", 'img:Pics/logo1.png, w20;colspan:5; rowspan:4; font-size:9'); 
        
         $table->printRow();
        
         $table->rowStyle('align:{C}; bgcolor:#FFA190;font-style:B');
         $table->easyCell("FORMANDO LOS VALORES PARA EL NUEVO SIGLO", 'colspan:16; font-size:7');
         $table->printRow();
        
         $table->rowStyle('align:C; valign:M');
        
         $table->easyCell("No.", 'font-size:7; font-style:B');
         $table->easyCell($numeroAlumno, 'font-size:7; colspan:4;');
         $table->easyCell("Nombre:", 'font-size:7; colspan:2; font-style:B');
    
         $table->easyCell("$filaalumno[Apellido_Alumno], $filaalumno[Nombre_Alumno]" , 'font-size:7; colspan:9');
         
         $table->printRow();
        
         $table->rowStyle('align:L; valign:M');
         
          $table->easyCell("Grado:", 'font-size:6; font-style:B');
          $table->easyCell($datosgradoo['Nombre_Grado'], 'font-size:7; colspan:4;');
          $table->easyCell("Seccion:", 'font-size:7; colspan:2; font-style:B');
          $table->easyCell("A", 'font-size:7; colspan:3; font-style:B');
          $table->easyCell("NIE:", 'font-size:7; colspan:1');
          $table->easyCell($filaalumno['NIE'], 'font-size:7; colspan:5; font-style:B');
          
          $table->printRow();
        
         $table->easyCell('N.', 'font-size:8; align:C; valign:M; rowspan:2; font-style:B');
         $table->easyCell('Nomina de Asignatura', 'font-size:6; align:C; valign:M; colspan:4; font-style:B');
         $table->easyCell('I Periodo', 'font-size:6; align:C; valign:M; colspan:3; font-style:B');
         $table->easyCell('II Periodo', 'font-size:6; align:C; valign:M; colspan:3; font-style:B');
         $table->easyCell('III Periodo', 'font-size:6; align:C; valign:M; colspan:3; font-style:B');
         $table->easyCell('IV Periodo', 'font-size:6; align:C; valign:M; colspan:3; font-style:B');
         $table->easyCell('Periodo Final', 'font-size:6; align:C; valign:M; colspan:2; font-style:B');
         $table->easyCell('Nota Final', 'font-size:6; align:C; valign:M; colspan:2; rowspan:2; font-style:B');
         $table->printRow();
        
        
         $table->easyCell('Area Basica', 'font-size:6; align:C; valign:M; colspan:4; font-style:B');
         $table->easyCell('Feb', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Mar', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('1P', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Abr', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('May', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('2P', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Jun', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Jul', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('3P', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Ago', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Sep', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('4P', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Oct', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Total', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->printRow();
        
         
         $sql="SELECT * FROM materia WHERE Status=? AND Id_Grado=?";
         $values=array(1, $datosgradoo['Id_Grado']);
         $datos=Database::getRows($sql, $values);
        
         $nummat = count($datos);
         $patata = 'font-size:8; align:C; valign:M; rowspan:';
         $patata.= $nummat;
         $patata.= '; font-style:B';
         $table->easyCell('A
         s
         i
         g
         n
         a
         t
         u
         r
         a
         s', $patata);  
         $totaldeltotal=0;
         $totalPuntos3=0;
         foreach ($datos as $fila) 
         {
           
            $table->easyCell($fila['Nombre_Materia'], 'font-size:6; align:C; valign:M; colspan:4; font-style:B');
        $nota1 = 0;
        $nota2 = 0;
        $choco = 1;
        $totalPuntos=0;
        
        
            for ($i = 1; $i <= 13; $i++)
            {
                if ($i == 3 || $i == 6 || $i == 9 || $i == 12 ) {
                    $prom = ($nota1 + $nota2)/2;
                    $estilo = 'font-size:6; align:C; valign:M; colspan:1; font-style:B';
                    $totalPuntos = $totalPuntos+$prom;
                    $promediosinredondear = $prom;
                    $prom = round($prom);
                } else {
                    $estilo = 'font-size:6; align:C; valign:M; colspan:1;';
                    $sql="SELECT * FROM tarea WHERE Status=? AND Mes_Tarea=? AND Id_Materia=?";
                    $values=array(1, $choco, $fila['Id_Materia']);
                    $datosene=Database::getRows($sql, $values);
                    $prom = 0;
                    foreach ($datosene as $filaene) 
                    {
                        $sql="SELECT * FROM Nota WHERE Status=? AND Id_Tarea=? AND Id_Alumno=?";
                        $values=array(1, $filaene['Id_Tarea'], $filaalumno['NIE']);
                        $datosindiv=Database::getRow($sql, $values);
        
        
                        $zoe = ($datosindiv['Nota_Obtenida'] * $filaene['ponderacion'])/100;
                        
                            $prom =  $zoe + $prom;
                        
                        
                
                    }
                    $prom = $prom;
                    $prom = round($prom, 1);
                    
            
                    if ($i == 1 || $i == 4 || $i == 7 || $i == 10) {
                        $nota1 = $prom;
                    } else if ($i == 2 || $i == 5 || $i == 6 || $i == 11) {
                        $nota2 = $prom;
                    } else if ($i == 13){
                        $totalPuntos = $totalPuntos+$prom;
                    }
                    $choco = $choco + 1;
                    
                }
                
                
                $table->easyCell($prom, $estilo);
                
                
                
            }
            $table->easyCell(round($totalPuntos, 1), 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
            $totaldeltotal = $totalPuntos + $totaldeltotal; 
            $totalPuntos2 = $totalPuntos/5;
        
            $totalPuntos3 = $totalPuntos2 + round($totalPuntos3);
        
            $table->easyCell(round($totalPuntos2), 'font-size:6; align:C; valign:M; colspan:2; font-style:B');
        
            
            $table->printRow();
            
         }
        
         
         $table->easyCell('Total de Puntos', 'font-size:6; align:L; valign:M; colspan:18; font-style:B');
         $table->easyCell(round($totaldeltotal, 1), 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell($totalPuntos3, 'font-size:6; align:C; valign:M; colspan:2; font-style:B');
         $table->printRow();
        
         
         $table->easyCell('Firma Lic. Reinaldo Antonio Claros Flores
         Director', 'font-size:6; align:C; valign:B; colspan:5; font-style:B');
        
         $table->easyCell('', 'img:Pics/sello2.png, w15; font-size:6; align:C; valign:B; colspan:6; font-style:B');
         
         $table->easyCell('Firma
         Prof(a). Encargado(a)', 'font-size:6; align:C; valign:B; colspan:5; font-style:B');
        
         $table->easyCell('Firma 
         Padre de familia o encargado)', 'font-size:6; align:C; valign:B; colspan:5; font-style:B');
         
         $table->printRow();
        
         $table->endTable(2);
     
    $numeroAlumno ++;

    } else if ($datosgradoo['Tipo']==2) {


        $table=new easyTable($pdf, 21, 'width:700; border-color:#000; font-size:10; border:1; paddingY:2;');
        
         $table->rowStyle('align:{C}; bgcolor:#FFA190;font-style:B');
         $table->easyCell("Colegio Nuevo Milenio, Col. Las Brisas Soyapango.", 'colspan:16; font-size:6');
         $table->easyCell("", 'img:Pics/logo1.png, w20;colspan:5; rowspan:4; font-size:5'); 
        
         $table->printRow();
        
         $table->rowStyle('align:{C}; bgcolor:#FFA190;font-style:B');
         $table->easyCell("FORMANDO LOS VALORES PARA EL NUEVO SIGLO", 'colspan:16; font-size:5');
         $table->printRow();
        
         $table->rowStyle('align:C; valign:M');
        
         $table->easyCell("No.", 'font-size:5; font-style:B');
         $table->easyCell($numeroAlumno, 'font-size:5; colspan:4;');
         $table->easyCell("Nombre:", 'font-size:5; colspan:2; font-style:B');
    
         $table->easyCell("$filaalumno[Apellido_Alumno], $filaalumno[Nombre_Alumno]" , 'font-size:5; colspan:9');
         
         $table->printRow();
        
         $table->rowStyle('align:L; valign:M');
         
          $table->easyCell("Grado:", 'font-size:4; font-style:B');
          $table->easyCell($datosgradoo['Nombre_Grado'], 'font-size:4; colspan:4;');
          $table->easyCell("Seccion:", 'font-size:4; colspan:2; font-style:B');
          $table->easyCell("A", 'font-size:4; colspan:3; font-style:B');
          $table->easyCell("NIE:", 'font-size:4; colspan:1');
          $table->easyCell($filaalumno['NIE'], 'font-size:4; colspan:5; font-style:B');
          
          $table->printRow();
        
         $table->easyCell('N.', 'font-size:6; align:C; valign:M; rowspan:2; font-style:B');
         $table->easyCell('Nomina de Asignatura', 'font-size:4; align:C; valign:M; colspan:4; font-style:B');
         $table->easyCell('I Periodo', 'font-size:4; align:C; valign:M; colspan:3; font-style:B');
         $table->easyCell('II Periodo', 'font-size:4; align:C; valign:M; colspan:3; font-style:B');
         $table->easyCell('III Periodo', 'font-size:4; align:C; valign:M; colspan:3; font-style:B');
         $table->easyCell('IV Periodo', 'font-size:4; align:C; valign:M; colspan:4; font-style:B');
         $table->easyCell('Total', 'font-size:4; align:C; valign:M; colspan:1; rowspan:2; font-style:B');
         $table->easyCell('Nota Final', 'font-size:4; align:C; valign:M; colspan:2; rowspan:2; font-style:B');
         $table->printRow();
        
        
         $table->easyCell('Area Basica', 'font-size:4; align:C; valign:M; colspan:4; font-style:B');
         $table->easyCell('Feb', 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Mar', 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('1P', 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Abr', 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('May', 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('2P', 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Jun', 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Jul', 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('3P', 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Ago', 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Sep', 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('Oct', 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell('4P', 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
         $table->printRow();
        
         
         $sql="SELECT * FROM materia WHERE Status=? AND Id_Grado=?";
         $values=array(1, $datosgradoo['Id_Grado']);
         $datos=Database::getRows($sql, $values);
        
         $nummat = count($datos);
         $patata = 'font-size:8; align:C; valign:M; rowspan:';
         $patata.= $nummat;
         $patata.= '; font-style:B';
         $table->easyCell('A
         s
         i
         g
         n
         a
         t
         u
         r
         a
         s', $patata);  
         $totaldeltotal=0;
         $totalPuntos3=0;
         foreach ($datos as $fila) 
         {
           
            $table->easyCell($fila['Nombre_Materia'], 'font-size:5; align:C; valign:M; colspan:4; font-style:B');
        $nota1 = 0;
        $nota2 = 0;
        $nota3 = 0;
        $choco = 1;
        $totalPuntos=0;
        
        
            for ($i = 1; $i <= 13; $i++)
            {
                if ($i == 3 || $i == 6 || $i == 9 ) {
                    $prom = ($nota1 + $nota2)/2;
                    $estilo = 'font-size:4; align:C; valign:M; colspan:1; font-style:B';
                    $totalPuntos = $totalPuntos+$prom;
                    $promediosinredondear = $prom;
                    $prom = round($prom);
                } else if($i == 13){
                    $prom = ($nota1 + $nota2 + $nota3)/3;
                    $estilo = 'font-size:4; align:C; valign:M; colspan:1; font-style:B';
                    $totalPuntos = $totalPuntos+$prom;
                    $promediosinredondear = $prom;
                    $prom = round($prom);

                } else {
                    $estilo = 'font-size:4; align:C; valign:M; colspan:1;';
                    $sql="SELECT * FROM tarea WHERE Status=? AND Mes_Tarea=? AND Id_Materia=?";
                    $values=array(1, $choco, $fila['Id_Materia']);
                    $datosene=Database::getRows($sql, $values);
                    $prom = 0;
                    foreach ($datosene as $filaene) 
                    {
                        $sql="SELECT * FROM Nota WHERE Status=? AND Id_Tarea=? AND Id_Alumno=?";
                        $values=array(1, $filaene['Id_Tarea'], $filaalumno['NIE']);
                        $datosindiv=Database::getRow($sql, $values);
        
        
                        $zoe = ($datosindiv['Nota_Obtenida'] * $filaene['ponderacion'])/100;
                        
                            $prom =  $zoe + $prom;
                        
                        
                
                    }
                    $prom = $prom;
                    $prom = round($prom, 1);
                    
            
                    if ($i == 1 || $i == 4 || $i == 7 || $i == 10) {
                        $nota1 = $prom;
                    } else if ($i == 2 || $i == 5 || $i == 6 || $i == 11) {
                        $nota2 = $prom;
                    } else if ($i == 13){
                        $totalPuntos = $totalPuntos+$prom;
                    } else if ($i == 12){
                        $nota3 = $prom;
                    }
                    $choco = $choco + 1;
                    
                }
                
                
                $table->easyCell($prom, $estilo);
                
                
                
            }
            $table->easyCell(round($totalPuntos, 1), 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
            $totaldeltotal = $totalPuntos + $totaldeltotal; 
            $totalPuntos2 = $totalPuntos/5;
        
            $totalPuntos3 = $totalPuntos2 + round($totalPuntos3);
        
            $table->easyCell(round($totalPuntos2), 'font-size:4; align:C; valign:M; colspan:2; font-style:B');
        
            
            $table->printRow();
            
         }
        
         
         $table->easyCell('Total de Puntos', 'font-size:4; align:L; valign:M; colspan:18; font-style:B');
         $table->easyCell(round($totaldeltotal, 1), 'font-size:4; align:C; valign:M; colspan:1; font-style:B');
         $table->easyCell($totalPuntos3, 'font-size:4; align:C; valign:M; colspan:2; font-style:B');
         $table->printRow();
        
         
         $table->easyCell('Firma Lic. Reinaldo Antonio Claros Flores
         Director', 'font-size:4; align:C; valign:B; colspan:5; font-style:B');
        
         $table->easyCell('', 'img:Pics/sello2.png, w13; font-size:4; align:C; valign:B; colspan:6; font-style:B');
         
         $table->easyCell('Firma
         Prof(a). Encargado(a)', 'font-size:4; align:C; valign:B; colspan:5; font-style:B');
        
         $table->easyCell('Firma 
         Padre de familia o encargado)', 'font-size:4; align:C; valign:B; colspan:5; font-style:B');
         
         $table->printRow();
        
         $table->endTable(2);
     
    $numeroAlumno ++;
    }
    


 
    
}




 
 $pdf->Output('I','Boletas.pdf', true); 


 

?>