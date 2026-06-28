<?php

namespace App;

class Reserva
{
    private Cliente $cliente;
    private Habitacion $habitacion;
    private \DateTime $fechaIngreso;
    private \DateTime $fechaSalida;

    public function __construct(Cliente $cliente, Habitacion $habitacion, string $fechaIngreso, string $fechaSalida)
    {
        $ingreso = \DateTime::createFromFormat('Y-m-d', $fechaIngreso);
        $salida = \DateTime::createFromFormat('Y-m-d', $fechaSalida);

        if (!$ingreso || $ingreso->format('Y-m-d') !== $fechaIngreso) {
            throw new \InvalidArgumentException("Formato de fecha de ingreso inválido. Utilice AAAA-MM-DD");
        }

        if (!$salida || $salida->format('Y-m-d') !== $fechaSalida) {
            throw new \InvalidArgumentException("Formato de fecha de salida inválido. Utilice AAAA-MM-DD");
        }

        $hoy = new \DateTime('today');
        if ($ingreso < $hoy) {
            throw new \InvalidArgumentException("La fecha de ingreso no puede ser en el pasado");
        }

        if ($salida <= $ingreso) {
            throw new \InvalidArgumentException("La fecha de salida debe ser posterior a la fecha de ingreso.");
        }

        $this->cliente = $cliente;
        $this->habitacion = $habitacion;
        $this->fechaIngreso = $ingreso;
        $this->fechaSalida = $salida;

        $this->habitacion->reservar();
    }

    public function calcularTotal(): float
    {
        $dias = $this->fechaIngreso->diff($this->fechaSalida)->days;
        return $dias * $this->habitacion->getPrecio();
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function getHabitacion(): Habitacion
    {
        return $this->habitacion;
    }

    public function getFechaIngreso(): \DateTime
    {
        return $this->fechaIngreso;
    }

    public function getFechaSalida(): \DateTime
    {
        return $this->fechaSalida;
    }
}