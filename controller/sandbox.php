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
`sku` varchar (10) NOT NULL,
`price` decimal(4,3) NOT NULL,
`description` varchar(1024) NOT NULL,
`qtd` int(2) NOT NULL,
`categories` varchar(64) NOT NULL,
PRIMARY KEY (`id`)
) AUTO_INCREMENT=1 ;

// run for launh store ==

?>