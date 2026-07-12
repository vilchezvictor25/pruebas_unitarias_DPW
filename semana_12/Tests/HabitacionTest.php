<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use App\Habitacion;
use InvalidArgumentException;
use Exception;

require_once __DIR__ . '/../src/Habitacion.php';

class HabitacionTest extends TestCase
{
    #[Test]
    public function testNumeroCero()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("El número de habitación debe ser positivo.");
        
        new Habitacion(0, "Suite", 150.00);
    }

    #[Test]
    public function testNumeroNegativo()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("El número de habitación debe ser positivo.");
        
        new Habitacion(-12, "Suite", 150.00);
    }

    #[Test]
    public function testPrecioCero()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("El precio debe ser positivo");
        
        new Habitacion(204, "Suite", 0);
    }

    #[Test]
    public function testPrecioNegativo()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("El precio debe ser positivo");
        
        new Habitacion(204, "Suite", -75.00);
    }

    #[Test]
    public function testReservarHabitacionDisponible()
    {
        $habitacion = new Habitacion(204, "Suite", 150.00, true);
        
        $resultado = $habitacion->reservar();
        
        $this->assertTrue($resultado);
        $this->assertFalse($habitacion->isDisponible());
    }

    #[Test]
    public function testReservarHabitacionNoDisponible()
    {
        $this->expectException(Exception::class);
        
        $habitacion = new Habitacion(204, "Suite", 150.00, false);
        $habitacion->reservar();
    }
}