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
        $this->Cell(0,10,'Reporte de Admintradores',0,1,'C',true);
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
        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);

        // Verificar si hay registros
        if ($result->num_rows > 0) {
            // Cabecera de la tabla
            $this->SetFont('Arial','B',12);
            $this->SetFillColor(232,232,232);
            $this->Cell(25,10,'ID',1,0,'C',true);
            $this->Cell(40,10,'Nombre',1,0,'C',true);
            $this->Cell(40,10,'Direccion',1,0,'C',true);
            $this->Cell(40,10,'Telefono',1,0,'C',true);
            $this->Cell(50,10,'Correo Electronico',1,1,'C',true);

            // Datos de los administradores
            $this->SetFont('Arial','',12);
            while($row = $result->fetch_assoc()) {
                $this->Cell(25,10,$row['idusuario'],1,0,'C');
                $this->Cell(40,10,$row['nombre'],1,0,'C');
                $this->Cell(40,10,$row['direccion'],1,0,'C');
                $this->Cell(40,10,$row['telefono'],1,0,'C');
                $this->Cell(50,10,$row['correo_electronico'],1,1,'C');
            }
        } else {
            $this->Cell(0,10,'No hay administradores',0,1,'C');
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
