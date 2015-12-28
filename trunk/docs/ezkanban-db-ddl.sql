CREATE DATABASE ezkanban;

GRANT ALL ON ezkanban.* TO 'ezkanban'@'localhost' IDENTIFIED BY 'ezkanban';

USE ezkanban;

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `x_pos` int(5) NOT NULL,
  `y_pos` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `color` text NOT NULL,
  `zindex` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `labels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `x_pos` int(4) NOT NULL,
  `y_pos` int(4) NOT NULL,
  `text` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `bars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `x_pos` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;


