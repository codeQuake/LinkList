DROP TABLE IF EXISTS wcf1_counter_update_type;
CREATE TABLE wcf1_counter_update_type (
	counterUpdateTypeID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	packageID INT(10) NOT NULL,
	counterUpdateType VARCHAR(255) NOT NULL,
	classFile VARCHAR(255) NOT NULL,
	UNIQUE KEY (packageID, counterUpdateType)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;