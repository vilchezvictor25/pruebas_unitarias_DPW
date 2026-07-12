<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use App\Cliente;
use App\Habitacion;
use App\Reserva;
use InvalidArgumentException;

require_once __DIR__ . '/../src/Cliente.php';
require_once __DIR__ . '/../src/Habitacion.php';
require_once __DIR__ . '/../src/Reserva.php';

class ReservaTest extends TestCase
{
    private Cliente $cliente;
    private Habitacion $vivienda;

    protected function setUp(): void
    {
        $this->cliente = new Cliente("Carlos Mendoza", "carlos@correo.com", "987654321");
        $this->vivienda = new Habitacion(204, "Suite", 150.00, true);
    }

    #[Test]
    public function testFechaIngresoInvalido()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Formato de fecha de ingreso inválido. Utilice AAAA-MM-DD");
        
        new Reserva(
            $this->cliente,
            $this->vivienda,
            "31/12/2026",
            "2026-12-05"
        );
    }

    #[Test]
    public function testFechaIngresoPasado()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("La fecha de ingreso no puede ser en el pasado");
        
        $fechaPasado = date('Y-m-d', strtotime('-2 days'));
        
        new Reserva(
            $this->cliente,
            $this->vivienda,
            $fechaPasado,
            date('Y-m-d', strtotime('+4 days'))
        );
    }

    #[Test]
    public function testFechaSalidaAnterior()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("La fecha de salida debe ser posterior a la fecha de ingreso.");
        
        $fechaIngreso = date('Y-m-d', strtotime('+6 days'));
        $fechaSalida = date('Y-m-d', strtotime('+2 days'));
        
        new Reserva(
            $this->cliente,
            $this->vivienda,
            $fechaIngreso,
            $fechaSalida
        );
    }

    #[Test]
    public function pruebaCalcularTotal()
    {
        $fechaIngreso = date('Y-m-d', strtotime('+2 days'));
        $fechaSalida = date('Y-m-d', strtotime('+6 days')); // 4 días de diferencia
        
        $reserva = new Reserva(
            $this->cliente,
            $this->vivienda,
            $fechaIngreso,
            $fechaSalida
        );
        
        $total = $reserva->calcularTotal();
        
        // 4 días x 150.00 = 600.00
        $this->assertEquals(600.00, $total);
    }
}