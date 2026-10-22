<?php

use PHPUnit\Framework\TestCase;

require_once 'CalculadorRecargo.php';

class CalculadorRecargoTest extends TestCase {
    private CalculadorRecargo $calculador;

    protected function setUp(): void {
        $this->calculador = new CalculadorRecargo();
    }

    public function testDiasNegativosLanzaExcepcion(): void {
        // Cobertura RN-04: Días negativos
        $this->expectException(InvalidArgumentException::class);
        $this->calculador->calcularRecargo(-1);
    }

    public function testSinRecargo(): void {
        // Cobertura RN-01: Periodo de gracia (0 y 3 días)
        $this->assertEquals(0, $this->calculador->calcularRecargo(0));
        $this->assertEquals(0, $this->calculador->calcularRecargo(3));
    }

    public function testRecargoLeve(): void {
        // Cobertura RN-02: Recargo leve (4 y 15 días)
        $this->assertEquals(5, $this->calculador->calcularRecargo(4));
        $this->assertEquals(5, $this->calculador->calcularRecargo(15));
    }

    public function testRecargoGrave(): void {
        // Cobertura RN-03: Recargo grave (> 15 días)
        $this->assertEquals(15, $this->calculador->calcularRecargo(16));
        $this->assertEquals(15, $this->calculador->calcularRecargo(30));
    }
}