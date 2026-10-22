<?php

class CalculadorRecargo {
    
    /**
     * Calcula el porcentaje de recargo según los días de mora
     */
    public function calcularRecargo(int $diasMora): float {
        // RN-04: Manejo de errores
        if ($diasMora < 0) {
            throw new InvalidArgumentException("Los días de retraso no pueden ser negativos.");
        }

        // RN-01: Sin recargo (0 a 3 días)
        if ($diasMora <= 3) {
            return 0;
        }

        // RN-02: Recargo leve (4 a 15 días)
        if ($diasMora <= 15) {
            return 5;
        }

        // RN-03: Recargo grave (mayor a 15 días)
        return 15;
    }
}