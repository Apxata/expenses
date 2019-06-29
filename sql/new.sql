-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.41 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы expenses.balance_sheet: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `balance_sheet` DISABLE KEYS */;
/*!40000 ALTER TABLE `balance_sheet` ENABLE KEYS */;

-- Дамп структуры для таблица expenses.expenses
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `balance_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sum` int(10) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_expenses_balance_sheet` (`balance_id`),
  CONSTRAINT `FK_expenses_balance_sheet` FOREIGN KEY (`balance_id`) REFERENCES `balance_sheet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы expenses.expenses: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
