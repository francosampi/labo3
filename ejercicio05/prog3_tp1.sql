--Franco Sampietro - TP1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo_de_barra` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` double NOT NULL,
  `fecha_de_creacion` date NOT NULL,
  `fecha_de_modificacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


INSERT INTO `productos` (`id`, `codigo_de_barra`, `nombre`, `tipo`, `stock`, `precio`, `fecha_de_creacion`, `fecha_de_modificacion`) VALUES
(1001, '77900361', 'Westmacott', 'liquido', 33, 15.87, '2021-02-09', '2020-09-26'),
(1002, '77900362', 'Spirit', 'solido', 45, 69.74, '2020-09-18', '2020-04-14'),
(1003, '77900363', 'Newgrosh', 'polvo', 14, 68.19, '2020-11-29', '2021-02-11'),
(1004, '77900364', 'McNickle', 'polvo', 19, 53.51, '2020-11-28', '2021-04-17'),
(1005, '77900365', 'Hudd', 'solido', 68, 26.56, '2020-12-19', '2021-06-19'),
(1006, '77900365', 'Hudd', 'solido', 68, 26.56, '2020-12-19', '2021-06-19'),
(1007, '7900366', 'Schrader', 'polvo', 17, 96.54, '2020-08-02', '2021-04-18'),
(1008, '77900367', 'Bachellier', 'solido', 59, 69.17, '0000-00-00', '2021-06-07'),
(1009, '77900368', 'Fleming', 'solido', 38, 66.77, '2020-10-26', '2020-10-03'),
(1010, '77900369', 'Hurry', 'solido', 44, 43.01, '2020-07-04', '2020-05-30'),
(1011, '77900310', 'Krauss', 'polvo', 73, 35.73, '2021-03-03', '2020-08-30');


CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_de_registro` date NOT NULL,
  `localidad` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `clave`, `mail`, `fecha_de_registro`, `localidad`) VALUES
(101, 'Esteban', 'Madou', '2345', 'dkantor0@example.com', '2021-01-07', 'Quilmes'),
(102, 'German', 'Gerram', '1234', 'ggerram1@hud.gov', '2020-05-08', 'Berazategui'),
(103, 'Deloris', 'Fosis', '5678', 'bsharpe2@wisc.edu', '2020-11-28', 'Avellaneda'),
(104, 'Brok', 'Neiner', '4567', 'bblazic3@desdev.cn', '2020-12-08', 'Quilmes'),
(105, 'Garrick', 'Brent', '6789', 'gbrent4@theguardian.com', '2020-12-17', 'Moron'),
(106, 'Bili', 'Baus', '0123', 'bhoff5@addthis.com', '2020-11-27', 'Moreno');

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_de_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `ventas` (`id`, `id_producto`, `id_usuario`, `cantidad`, `fecha_de_venta`) VALUES
(1, 1001, 101, 2, '2020-07-19'),
(2, 1008, 102, 3, '2020-08-16'),
(3, 1007, 102, 4, '2021-01-24'),
(4, 1006, 103, 5, '2021-01-14'),
(5, 1003, 104, 6, '2021-03-20'),
(6, 1005, 105, 7, '2021-02-22'),
(7, 1003, 104, 6, '2020-02-12'),
(8, 1003, 106, 6, '2020-06-10'),
(9, 1002, 106, 6, '2021-02-04'),
(10, 1001, 106, 1, '2020-05-17');

ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

--PUNTO 3: CONSULTAS
--1
SELECT * FROM usuario ORDER BY nombre ASC;

--2
SELECT * FROM productos
WHERE tipo='liquido';

--3
SELECT * FROM ventas
WHERE cantidad BETWEEN 6 AND 10;

--4
SELECT SUM(cantidad) FROM ventas;

--5
SELECT id_producto FROM ventas LIMIT 3;

--6
SELECT u.nombre, p.nombre
FROM ventas v 
INNER JOIN usuario u on v.id_usuario = u.id  
INNER JOIN productos p on v.id_producto = p.id;

--7
SELECT p.precio*v.cantidad
FROM ventas v
INNER JOIN productos p on v.id_producto = p.id;

--8
SELECT sum(v.cantidad)
FROM ventas v
WHERE v.id_producto='1003' && v.id_usuario='104'

--9
SELECT v.id_producto
FROM ventas v
INNER JOIN usuario u ON v.id_usuario=u.id
WHERE u.localidad='Avellaneda'

--10
SELECT *
FROM usuario u
WHERE u.nombre LIKE '%u%'

--11
SELECT * FROM ventas
WHERE ventas.fecha_de_venta
BETWEEN "2020-06-01" AND "2021-02-01"

--12
SELECT * FROM usuario
WHERE usuario.fecha_de_registro<"2021-01-01"

--13
INSERT INTO `productos`(`codigo_de_barra`, `nombre`, `tipo`, `stock`, `precio`, `fecha_de_creacion`, `fecha_de_modificacion`)
VALUES ('77900325','Chocolate','solido','45','99.99','2022-09-20','2022-09-20')

--14
INSERT INTO `usuario`(`nombre`, `apellido`, `clave`, `mail`, `fecha_de_registro`, `localidad`)
VALUES ('Franco','Sampietro','1372','francosampi@hotmail.com','CURDATE()','Capital Federal')

--15
UPDATE productos
SET precio = 66.60
WHERE tipo = 'solido'

--16
UPDATE `productos`
SET `stock`=0
WHERE stock<=20

--17
DELETE FROM productos
WHERE id=1010

--18
DELETE u
FROM usuario AS u
LEFT JOIN venta AS v
ON u.id=v.id_usuario
WHERE v.id_usuario IS NULL;