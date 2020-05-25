<?php
require('db_connect.php');

// CREATE DATABASE `webjump`;

DROP TABLE IF EXISTS `webjump`.`categories`;
DROP TABLE IF EXISTS `webjump`.`products`;
 

CREATE TABLE `webjump`.`categories` (
`id` int(2) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`code` int(2) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `webjump`.`products` (
`id` int(5) NOT NULL AUTO_INCREMENT,
`name` varchar(80) NOT NULL,
`sku` varchar(10) NOT NULL,
`price` decimal(4,3) NOT NULL,
`description` varchar(1024) NOT NULL,
`qtd` int(2) NOT NULL,
`categories` varchar(64) NOT NULL,
PRIMARY KEY (`id`)
) AUTO_INCREMENT=1 ;

CREATE TABLE `webjump`.`users` (
`id` int(1) NOT NULL AUTO_INCREMENT,
`user` varchar(10) NOT NULL,
`pass`VARCHAR(36) NOT NULL,
PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

// run for launch store ==

// Basic Products

INSERT INTO `products` (`id`, `name`, `sku`, `price`, `description`, `qtd`, `categories`) VALUES
(2, 'Ombro', '456', '9.999', '          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \n        ', 10, '1'),
(3, 'Naiki', '123', '9.999', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \n        ', 10, '1'),
(4, 'Féla', '951', '9.999', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \n        ', 0, '1'),
(5, 'Ardidas', '753', '9.999', 'adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \n        ', 2, '1');


// Basic Categories

INSERT INTO `categories` (`id`, `name`, `code`) VALUES
(2, 'Trekking', 24),
(3, 'Court', 7),
(4, 'Fitness', 8),
(5, 'Casual', 13);

?>