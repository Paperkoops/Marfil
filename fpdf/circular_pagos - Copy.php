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


$mes = "1";


 $sql="SELECT * FROM `pago` WHERE STATUS=? GROUP BY Id_Alumno";
 $values=array(1);
 $datos=Database::getRows($sql, $values);
 
 foreach ($datos as $fila) 
 {
    $table=new easyTable($pdf, 12, 'width:700; border-color:#000; font-size:10; border:1; paddingY:2;');
    
     $table->rowStyle('align:{C}; bgcolor:#fff;font-style:B');
     $table->easyCell("", 'img:Pics/logo3.png, w30;colspan:3; rowspan:1; font-size:9'); 
     $table->easyCell("Colegio Nuevo Milenio
     Col. Las Brisas Soyapango.", 'colspan:6; font-size:12; align:C; valign:M;');
     $table->easyCell("", 'img:Pics/logo2.png, w20;colspan:3; rowspan:1; font-size:9'); 
    
     $table->printRow();  
    
     $table->rowStyle('min-height:10; align:{C};font-size:18;');   // let's adjust the height of this row
     $table->easyCell("", 'font-size:6; align:C; valign:M; colspan:12; font-style:B');
     $table->printRow(); 
    
     $sql="SELECT a.NIE, a.Nombre_Alumno, a.Apellido_Alumno, a.Fecha_Nacimiento, a.Id_Genero, a.Nacionalidad, a.Id_Estado, a.Partida_Nacimiento, a.Distancia, a.Id_Medio, a.Dirección, a.Id_Municipio, a.Telefono, a.Celular, a.Email, a.Id_Religion, a.Miembros_Familia, a.Trabaja, a.Tiene_Hijos, a.Convivencia, a.Nombre_Padre, a.Dui_Padre, a.Telefono_Padre, a.Trabajo_Padre, a.Profesion_Padre, a.Nombre_Madre, a.Dui_Madre, a.Telefono_Madre, a.Trabajo_Madre, a.Profesion_Madre, a.Nombre_Responsable, a.Dui_Responsable, a.Telefono_Responsable, a.Trabajo_Responsable, a.Profesion_Responsable, a.Enfermedades_Alergias, a.Medicamentos, a.Fecha_Admision, a.Id_Grado, a.observacion, a.Foto, a.Status, g.Nombre_Grado, ec.Nombre_Estado, gene.Nombre_Genero, mt.Nombre_Medio, mt.Nombre_Medio, m.Nombre_Municipio, r.Nombre_Religion, case a.Trabaja when 1 then 'Si' else 'No' end as Trabaj, case a.Tiene_Hijos when 1 then 'Si' else 'No' end as Hijos FROM alumno a, grado g, estado_civil ec, genero gene, medio_transporte mt, municipio m, religion r WHERE a.Id_Genero=gene.Id_Genero AND a.Id_Estado=ec.Id_Estado AND a.Id_Medio=mt.Id_Medio AND a.Id_Municipio=m.Id_Municipio AND a.Id_Religion=r.Id_Religion AND a.Id_Grado=g.Id_Grado AND a.NIE=?";
     $values=array($fila['Id_Alumno']);
     $datos3=Database::getRow($sql, $values);
     if ($datos3['Id_Genero'] == 1) {
        $texto = "Estimados padres de Familia, por este medio se le informa que el pago de la colegiatura del Alumno: ";
     } else {
        $texto = "Estimados padres de Familia, por este medio se le informa que el pago de la colegiatura de la Alumna: ";
     }
     
     
     $texto.= "$datos3[Nombre_Alumno] $datos3[Apellido_Alumno]" ;
     $texto.= " de ";
     $texto.= $datos3['Nombre_Grado'];
     $texto.= " con los meses:";
     
     
     $sql="SELECT * FROM `pago` WHERE STATUS=? AND Id_Alumno=?";
     $values=array(1, $fila['Id_Alumno'] );
     $datos2=Database::getRows($sql, $values);
     $lmao = 1;
     foreach ($datos2 as $fila2) 
     {
         $salir = false;
        switch($mes)
        {
            case "1":
            if ($fila2['Mes'] == 'Enero' ) {
                $salir = false;
            } else {
                $salir = true;
            }
            break;
            
            case "2":
            if ($fila2['Mes'] == 'Enero' || $fila2['Mes'] == 'Febrero' ) {
                $salir = false;
            } else {
                $salir = true;
            }
            break;
            
        }

        if ($salir == true) {
            continue;
        } else {
            # code...
        }
        
         
     if ( $lmao == 1) {
         $texto.=" ";
         $texto.=$fila2['Mes'];
         $texto.="";
     } else {
         $texto.=", ";
         $texto.=$fila2['Mes'];
     }
     $lmao++;
     
    
    }
    $texto.= " se encuentran pendientes, favor realizar los pagos necesarios lo mas pronto posible";

    $table->easyCell($texto, 'font-size:9; align:J; valign:M; colspan:12; font-style:B');
    $table->printRow(); 
   
   $table->endTable(2);
 }
 


 
 $pdf->Output('I','Boletas', true); 


 

?>