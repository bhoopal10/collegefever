DROP TABLE IF EXISTS cmn_codes;

CREATE TABLE `cmn_codes` (
  `PK_CodesID` int(11) NOT NULL auto_increment,
  `CodeDetail` varchar(200) NOT NULL,
  `CodeChar` varchar(5) NOT NULL,
  PRIMARY KEY  (`PK_CodesID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO cmn_codes VALUES("1","UTUnknown","UN");
INSERT INTO cmn_codes VALUES("2","UTGuest","GU");
INSERT INTO cmn_codes VALUES("3","UTProspective Customer","PR");
INSERT INTO cmn_codes VALUES("4","UTActive Customer","AC");
INSERT INTO cmn_codes VALUES("5","UTInactive Customer","IN");
INSERT INTO cmn_codes VALUES("6","UTLost Customer","LO");
INSERT INTO cmn_codes VALUES("7","UTBlackListed Customer","BL");
INSERT INTO cmn_codes VALUES("8","UTUserInfo","UI");
INSERT INTO cmn_codes VALUES("9","UTDistributors","DS");
INSERT INTO cmn_codes VALUES("10","UTAdmin","AD");
INSERT INTO cmn_codes VALUES("11","PANValid","VP");
INSERT INTO cmn_codes VALUES("12","PANNull","NP");
INSERT INTO cmn_codes VALUES("13","PANFake","FP");
INSERT INTO cmn_codes VALUES("14","P1Prefix","TS");
INSERT INTO cmn_codes VALUES("15","SRCOnline","SO");
INSERT INTO cmn_codes VALUES("16","SRCDistributor","SD");
INSERT INTO cmn_codes VALUES("17","SRCCustomer","SC");
INSERT INTO cmn_codes VALUES("18","UDISAdmin","UDA");
INSERT INTO cmn_codes VALUES("19","UDISOnline","UDO");



