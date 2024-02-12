SELECT `ФИО клиента` AS Клиент, `Контактый номер` AS Телефон FROM `фио клиента`
ORDER BY `ФИО клиента`;

SELECT `Название товара`, `Цена(руб.)` FROM товар
WHERE `Цена(руб.)`<10000;

SELECT `Ф.И.О. курьера` FROM доставка
WHERE`Ф.И.О. курьера` LIKE 'Щербаков%';

SELECT `ID клиента`, `ФИО клиента`, `Код заказа`, `Код товара`
FROM `фио клиента`
LEFT JOIN заказ
ON `фио клиента`.`ID клиента` = заказ.`ФИО клиента_ID клиента`
UNION
SELECT `ID клиента`, `ФИО клиента`, `Код заказа`, `Код товара`
FROM `фио клиента`
RIGHT JOIN заказ
ON `фио клиента`.`ID клиента` = заказ.`ФИО клиента_ID клиента`;

SELECT `Название товара`,`Интернет-магазин_Код магазина`
FROM товар INNER JOIN `магазин-товар`
ON товар.`Код товара`=`магазин-товар`.`Товар_Код товара`;

SELECT `Ф.И.О. курьера`, `Код товара`
FROM доставка LEFT JOIN заказ
ON доставка.`Код заказа` = заказ.`Код заказа`;

SELECT `Название товара`, Количество, `Дата заказа`, `Время заказа`
FROM товар JOIN заказ 
ON товар.`Код товара`=заказ.`Код товара`
ORDER BY заказ.Количество AND товар.`Название товара`;

INSERT INTO `интернет-магазин` VALUES (16, "pschaden@hotmail.com", 0);
UPDATE `интернет-магазин` SET `Оплата доставки` = 1 WHERE (`Код магазина` = '3'); 
DELETE FROM `интернет-магазин` WHERE (`Код магазина` = '16');
