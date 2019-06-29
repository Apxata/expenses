-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.41 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных expenses
CREATE DATABASE IF NOT EXISTS `expenses` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `expenses`;

-- Дамп структуры для таблица expenses.balance_sheet
CREATE TABLE IF NOT EXISTS `balance_sheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы expenses.balance_sheet: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `balance_sheet` DISABLE KEYS */;
INSERT INTO `balance_sheet` (`id`, `name`) VALUES
	(1, 'Продукты и хоз расходы'),
	(2, 'Лечение и лекарства'),
	(3, 'Обучение'),
	(4, 'Развлечения');
/*!40000 ALTER TABLE `balance_sheet` ENABLE KEYS */;

-- Дамп структуры для таблица expenses.expenses
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `balance_id` int(10) unsigned NOT NULL DEFAULT '0',
  `expense_sum` int(10) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_expenses_balance_sheet` (`balance_id`),
  CONSTRAINT `FK_expenses_balance_sheet` FOREIGN KEY (`balance_id`) REFERENCES `balance_sheet` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы expenses.expenses: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` (`id`, `balance_id`, `expense_sum`, `date_created`, `deleted`, `comment`) VALUES
	(10, 1, 150, '2019-04-25 21:30:36', 0, 'мармелад');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
