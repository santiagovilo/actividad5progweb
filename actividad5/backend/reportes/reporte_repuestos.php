<?php
// Incluir la librería FPDF
require('fpdf/fpdf.php');

// Crear la clase para el reporte
class PDF extends FPDF
{
    // Cabecera del reporte
    function Header()
    {
        // Titulo del reporte
        $this->SetFont('Arial','B',15);
        $this->SetFillColor(200,220,255);
        $this->Cell(0,10,'Reporte de Repuestos',0,1,'C',true);
        $this->Ln(10);
    }

    // Contenido del reporte
    function Content()
    {
        // Conexion a la base de datos
        $conn = new mysqli("localhost", "root", "", "inventario");

        // Verificar la conexion
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta a la base de datos
        $sql = "SELECT * FROM repuestos";
        $result = $conn->query($sql);

        // Verificar si hay registros
        if ($result->num_rows > 0) {
            // Cabecera de la tabla
            $this->SetFont('Arial','B',12);
            $this->SetFillColor(232,232,232);
            $this->Cell(10,10,'ID',1,0,'C',true);
            $this->Cell(40,10,'Descripcion',1,0,'C',true);
            $this->Cell(30,10,'Marca',1,0,'C',true);
            $this->Cell(30,10,'Modelo',1,0,'C',true);
            $this->Cell(20,10,'Anio',1,0,'C',true);
            $this->Cell(30,10,'Clasificacion',1,0,'C',true);
            $this->Cell(30,10,'ID Vehiculo',1,1,'C',true);

            // Datos de los repuestos
            $this->SetFont('Arial','',12);
            while($row = $result->fetch_assoc()) {
                $this->Cell(10,10,$row['id_repuesto'],1,0,'C');
                $this->Cell(40,10,$row['descripcion'],1,0,'C');
                $this->Cell(30,10,$row['marca'],1,0,'C');
                $this->Cell(30,10,$row['modelo'],1,0,'C');
                $this->Cell(20,10,$row['anio'],1,0,'C');
                $this->Cell(30,10,$row['clasificacion'],1,0,'C');
                $this->Cell(30,10,$row['id_vehiculo'],1,1,'C');
            }
        } else {
            $this->Cell(0,10,'No hay repuestos',0,1,'C');
        }

        // Cerrar la conexion
        $conn->close();
    }

    // Pie de pagina del reporte
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Crear el objeto del reporte
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$pdf->Output();

?>


