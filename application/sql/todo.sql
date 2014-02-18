
CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(255) DEFAULT NULL,
  `completed` tinyint(1) DEFAULT '0',
  `date_due` date DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1

CREATE TRIGGER `todo`.`items_new` BEFORE INSERT
    ON `todo`.`items`
    FOR EACH ROW BEGIN
	SET NEW.date_added = NOW();
    END

CREATE TRIGGER `todo`.`items_update` BEFORE UPDATE
    ON `todo`.`items`
    FOR EACH ROW BEGIN
	SET NEW.date_updated = NOW();
    END