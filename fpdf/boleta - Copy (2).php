<?php
include 'fpdf.php';
include 'exfpdf.php';
include 'easyTable.php';
include('../aula/database.php');

$cells=array('Lorem ipsum dolor', 
'Consectetur adipiscing elit. Nam quis tincidunt mi', 
'Vitae pulvinar tortor. Integer quis mattis lorem. Quisque maximus ut ipsum aliquet mattis.', 
'Sed in tristique enim. Vivamus malesuada, sapien non consequat tempus, risus mauris ornare risus, in varius urna est quis enim.', 
'Suspendisse nec fermentum orci, ut feugiat felis.', 
'Phasellus molestie urna nisi, nec
imperdiet orci pretium vel. Donec vehicula tellus nisl, nec commodo diam posuere eu.',
'Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc in libero non velit consectetur facilisis tincidunt non justo.',
'Pellentesque', 'Scelerisque nec nibh a sollicitudin.', 'Nullam porttitor nulla est, nec semper felis mattis sit amet.',
'Donec', 'fringilla congue felis, ornare', 'tempus velit congue at.', 
'Curabitur euismod, urna ut pretium sodales',
'felis ligula tincidunt tellus, a vestibulum urna velit ac odio.',
'In non est et arcu sollicitudin', 
'Faucibus et in metus. Proin consequat dictum aliquam. Fusce sodales, nisl sit amet ornare porta', 
'velit odio ultricies quam', 'ut accumsan massa enim a tortor', 
'Sed euismod est eu laoreet blandit.',
'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
'Donec eget enim egestas, pulvinar nulla non, mollis risus. In id ipsum ex. Morbi laoreet dui feugiat enim dapibus rhoncus. Curabitur mollis velit accumsan ex suscipit fringilla. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur quis fermentum nibh. Aenean eget tellus eu ligula hendrerit dapibus vitae at leo. Vivamus at ligula non purus iaculis eleifend. Integer eget risus non dui scelerisque consectetur. Quisque et leo ut ex lacinia malesuada dictum vitae diam. Integer eleifend in nibh in mattis. Aenean eu justo quis mauris tempus eleifend. Praesent malesuada turpis ut justo semper tempor. Integer varius, nisi non elementum molestie, leo arcu euismod velit, eu tempor ligula diam convallis sem. Sed ultrices hendrerit suscipit. Pellentesque volutpat a urna nec placerat. Etiam auctor dapibus leo nec ullamcorper. Nullam id placerat elit. Vivamus ut quam a metus tincidunt laoreet sit amet a ligula. Sed rutrum felis ipsum, sit amet finibus magna tincidunt id. Suspendisse vel urna interdum lacus luctus ornare. Curabitur ultricies nunc est, eget rhoncus orci vestibulum eleifend. In in consequat mi. Curabitur sodales magna at consequat molestie. Aliquam vulputate, neque varius maximus imperdiet, nisi orci accumsan risus, sit amet placerat augue ipsum eget elit. Quisque sodales orci non est tincidunt tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In ut diam in dolor ultricies accumsan sit amet eu ex. Pellentesque aliquet scelerisque ullamcorper. Aenean porta enim eget nisl viverra euismod sed non eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at imperdiet sem, non volutpat metus. Phasellus sed velit sed orci iaculis venenatis ac id risus.');


 $pdf=new exFPDF();
 $pdf->AddPage('P', 'Letter'); 
 $pdf->SetFont('helvetica','',10);
 $pdf->AddFont('FontUTF8','','Arimo-Regular.php'); 
 $pdf->AddFont('FontUTF8','B','Arimo-Bold.php');
 $pdf->AddFont('FontUTF8','I','Arimo-Italic.php');
 $pdf->AddFont('FontUTF8','BI','Arimo-BoldItalic.php');

 $table=new easyTable($pdf, 21, 'width:700; border-color:#000; font-size:10; border:1; paddingY:2;');

 $table->rowStyle('align:{C}; bgcolor:#FFA190;font-style:B');
 $table->easyCell("Colegio Nuevo Milenio, Col. Las Brisas Soyapango.", 'colspan:21');

 $table->printRow();

 $table->rowStyle('align:{C}; bgcolor:#FFA190;font-style:B');
 $table->easyCell("FORMANDO LOS VALORES PARA EL NUEVO SIGLO", 'colspan:21');
 $table->printRow();

 $table->rowStyle('align:C; valign:M');

 $table->easyCell("No.", 'font-size:8; font-style:B');
 $table->easyCell("1", 'font-size:8; colspan:4;');
 $table->easyCell("Nombre:", 'font-size:8; colspan:2; font-style:B');
 $table->easyCell("Amaya Sánchez, Gabriela Alessandra", 'font-size:8; colspan:14');
 
 $table->printRow();

 $table->rowStyle('align:L; valign:M');
 
  $table->easyCell("Grado:", 'font-size:6; font-style:B');
  $table->easyCell("8", 'font-size:8; colspan:4;');
  $table->easyCell("Seccion:", 'font-size:8; colspan:2; font-style:B');
  $table->easyCell("A", 'font-size:8; colspan:3; font-style:B');
  $table->easyCell("NIE:", 'font-size:8; colspan:1');
  $table->easyCell("2345678", 'font-size:8; colspan:10; font-style:B');
  
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
 $table->easyCell('T.Puntos', 'font-size:6; align:C; valign:M; colspan:1; font-style:B');
 $table->printRow();

 
 $sql="SELECT * FROM materia WHERE Status=? AND Id_Grado=8";
 $values=array(1);
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
                $sql="SELECT * FROM Nota WHERE Status=? AND Id_Tarea=? AND Id_Alumno=7699265";
                $values=array(1, $filaene['Id_Tarea']);
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
 
 
 
 $table->endTable(10);
 
 $pdf->Output(); 


 

?>