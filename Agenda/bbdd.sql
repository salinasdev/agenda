-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 30-01-2014 a las 10:45:54
-- Versión del servidor: 5.0.67
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `personal`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `personal`
-- 

CREATE TABLE `personal` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `tlf` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `personal`
-- 

INSERT INTO `personal` VALUES (1, 'Joserra', 666000666, 'joserra@joserra.com');
INSERT INTO `personal` VALUES (2, 'Jorge', 666999666, 'gito@gito.com');
INSERT INTO `personal` VALUES (3, 'Victor', 676929666, 'vic@vic.com');
INSERT INTO `personal` VALUES (4, 'Aureliano', 667888999, 'aure@mail.com');
INSERT INTO `personal` VALUES (6, 'Pedro', 688999000, 'pedro@mail.com');
INSERT INTO `personal` VALUES (7, 'Manolooooo', 666777122, 'manolo@mail.com');