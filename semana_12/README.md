```text
======================================================
        PROYECTO DE PRUEBAS UNITARIAS (PHPUNIT)
        Hecho por: Víctor Vílchez 
======================================================


# Tecnologías y Herramientas Utilizadas

Para el desarrollo y automatización de la suite de pruebas del sistema, se seleccionó el siguiente ecosistema tecnológico estándar en la industria de desarrollo web con PHP:

* **PHP (Versión 8.2+):** Lenguaje base utilizado para la lógica de negocio, aprovechando características modernas como tipado estricto de propiedades y Atributos nativos de PHP.
* **PHPUnit (Versión 11.0):** Framework de pruebas unitarias empleado para diseñar, estructurar y ejecutar los casos de prueba automatizados.
* **Composer:** Gestor de dependencias utilizado para la instalación del entorno de pruebas de PHPUnit y para la configuración del mecanismo de carga automática (*Autoloading*) bajo el estándar **PSR-4**.


# RESPUESTAS


### 1. ¿Qué importancia tiene el rol del QA en el proceso de desarrollo?
Para mí, el rol del QA es clave porque me ayudó a cambiar la mentalidad de "programar rápido para ver si funciona" a **"programar pensando en qué podría salir mal"**. Durante esta práctica me di cuenta de que no basta con que el código corra en un escenario ideal; el verdadero valor del aseguramiento de calidad está en adelantarse a los errores antes de que lleguen al usuario final. Al validar que un correo tenga formato real o que un precio no sea negativo, evitamos fallos graves en cascada y ahorramos muchísimo tiempo arreglando problemas en el futuro.

### 2. ¿Cómo cambia tu enfoque al trabajar con un plan de pruebas ya elaborado?
Trabajar con un plan de pruebas estructurado me dio una **guía clara y directa**, quitándome de encima la duda de qué probar o por dónde empezar. En lugar de hacer pruebas manuales al azar abriendo el navegador a cada rato, el plan me permitió enfocarme en cubrir de forma ordenada tanto los casos felices (que la reserva calcule el total correcto) como los casos de error (manejo de fechas inválidas o en el pasado). Esto hace que mi flujo de trabajo sea mucho más eficiente y me da la seguridad de que, si cambio algo en el código más adelante, las pruebas me avisarán de inmediato si rompí algo.

### 3. ¿Qué ventaja tiene documentar las pruebas con @covers y @group?
Aunque en las versiones más nuevas de PHPUnit (como la versión 11 que usamos) se emplean Atributos nativos como `#[CoversClass]` o `#[Group]` en lugar de las anotaciones clásicas, las ventajas que encontré al aplicarlos son enormes:

* **Con `#[CoversClass]`:** Vinculo de forma exacta mi clase de prueba con la clase de negocio real correspondiente. La gran ventaja es que, al generar reportes de cobertura de código, el sistema sabe con precisión qué líneas de código analicé y cuáles me faltan, evitando falsos positivos.
* **Con `#[Group]`:** Puedo etiquetar o clasificar mis pruebas por módulos (por ejemplo, separar las pruebas críticas de las de negocio). Esto me da la flexibilidad de ejecutar en la terminal solo un grupo de pruebas específico si tengo prisa, sin necesidad de correr los 12 tests completos de golpe, optimizando el tiempo de ejecución.