CREATE DATABASE `libcatalog` /*!40100 COLLATE 'utf8_general_ci' */;

USE `libcatalog`;

CREATE TABLE `authors` (
	`id` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
	`fullname` VARCHAR(256) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `fullname` (`fullname`)
)
COMMENT='Авторы книг'
COLLATE='utf8_general_ci'
;

CREATE TABLE `books` (
	`id` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(500) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `title` (`title`)
)
COMMENT='Книги'
COLLATE='utf8_general_ci'
;

CREATE TABLE `authorship` (
	`book_id` INT(11) NOT NULL COMMENT 'Код книги',
	`author_id` INT(11) NOT NULL COMMENT 'Код автора',
	INDEX `ix_books` (`book_id`),
	INDEX `author_id` (`author_id`)
)
COMMENT='Авторство - связь между авторами и книгами.'
COLLATE='utf8_general_ci'
;
