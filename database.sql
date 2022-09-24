create database midaddress; <-- -->

use midaddress;

CREATE TABLE `users1` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);