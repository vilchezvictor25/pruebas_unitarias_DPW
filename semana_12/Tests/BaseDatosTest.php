<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use App\BaseDatos;

/**
 * @group basedatos
 * @covers \App\BaseDatos
 */
class BaseDatosTest extends TestCase
{
    private $baseDatos;

    /**
     * Se ejecuta UNA VEZ antes de todas las pruebas
     */
    public static function setUpBeforeClass(): void
    {
        echo "\n [INFO] Iniciando pruebas de base de datos...\n";
        if (ob_get_level() > 0) ob_flush();
    }

    /**
     * Se ejecuta UNA VEZ después de todas las pruebas
     */
    public static function tearDownAfterClass(): void
    {
        echo " [INFO] Finalizando pruebas de base de datos...\n";
        if (ob_get_level() > 0) ob_flush();
    }

    /**
     * Se ejecuta antes de CADA prueba
     */
    protected function setUp(): void
    {
        $this->baseDatos = new BaseDatos();
    }

    /**
     * Se ejecuta después de CADA prueba
     */
    protected function tearDown(): void
    {
        $this->baseDatos->limpiar();
        $this->baseDatos = null;
    }

    #[Test]
    public function guardarUsuario()
    {
        $resultado = $this->baseDatos->guardarUsuario('Juan Perez', 'juan@mail.com');
        $this->assertTrue($resultado);
    }

    #[Test]
    public function contarUsuarios()
    {
        $this->baseDatos->guardarUsuario('Ana Gomez', 'ana@mail.com');
        $this->baseDatos->guardarUsuario('Luis Torres', 'luis@mail.com');

        $total = $this->baseDatos->contarUsuarios();
        $this->assertEquals(2, $total);
    }

    #[Test]
    public function guardarUsuarioConEmailVacio()
    {
        $resultado = $this->baseDatos->guardarUsuario('Carlos Ruiz', '');
        $this->assertTrue($resultado);
    }

    #[Test]
    public function guardarUsuarioConNombreMuyLargo()
    {
        $nombreLargo = str_repeat('A', 255);
        $resultado = $this->baseDatos->guardarUsuario($nombreLargo, 'largo@mail.com');
        $this->assertTrue($resultado);
    }

    #[Test]
    public function guardar100Usuarios()
    {
        for ($i = 1; $i <= 100; $i++) {
            $this->baseDatos->guardarUsuario("Usuario $i", "usuario$i@mail.com");
        }

        $total = $this->baseDatos->contarUsuarios();
        $this->assertEquals(100, $total);
    }
}