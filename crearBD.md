#CREAR UNA BASE DE DATOS EN PHPMyAdmin
CREATE IF NOT EXISTS empleados;

#CREAR LA SIGUIENTE TABLA
CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `place` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




