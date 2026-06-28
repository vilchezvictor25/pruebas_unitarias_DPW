<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use App\Cliente;
use InvalidArgumentException;

require_once __DIR__ . '/../src/Cliente.php';

class ClienteTest extends TestCase
{
    #[Test]
    public function testNombreVacio()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("El nombre no puede estar vacío");
        
        new Cliente("", "carlos@correo.com", "987654321");
    }

    #[Test]
    public function testEmailInvalido()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("El correo electrónico no tiene un formato válido.");
        
        new Cliente("Carlos Mendoza", "correo_invalido_total", "987654321");
    }
}