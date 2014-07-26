DROP TABLE IF EXISTS cmn_states;

CREATE TABLE `cmn_states` (
  `PK_StatesID` int(11) NOT NULL auto_increment,
  `CountryID` int(11) NOT NULL,
  `StateList` varchar(200) NOT NULL,
  PRIMARY KEY  (`PK_StatesID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

INSERT INTO cmn_states VALUES("1","1","Andhra Pradesh");
INSERT INTO cmn_states VALUES("2","1","Arunachal Pradesh");
INSERT INTO cmn_states VALUES("3","1","Assam");
INSERT INTO cmn_states VALUES("4","1","Bihar");
INSERT INTO cmn_states VALUES("5","1","Chattisgarh");
INSERT INTO cmn_states VALUES("6","1","Goa");
INSERT INTO cmn_states VALUES("7","1","Gujarat");
INSERT INTO cmn_states VALUES("8","1","Haryana");
INSERT INTO cmn_states VALUES("9","1","Himachal Pradesh");
INSERT INTO cmn_states VALUES("10","1","Jammu Kashmir");
INSERT INTO cmn_states VALUES("11","1","Jharkhand");
INSERT INTO cmn_states VALUES("12","1","Karnataka");
INSERT INTO cmn_states VALUES("13","1","Kerala");
INSERT INTO cmn_states VALUES("14","1","Madhya Pradesh");
INSERT INTO cmn_states VALUES("15","1","Maharashtra");
INSERT INTO cmn_states VALUES("16","1","Manipur");
INSERT INTO cmn_states VALUES("17","1","Meghalaya");
INSERT INTO cmn_states VALUES("18","1","Mizoram");
INSERT INTO cmn_states VALUES("19","1","Nagaland");
INSERT INTO cmn_states VALUES("20","1","Orissa");
INSERT INTO cmn_states VALUES("21","1","Punjab");
INSERT INTO cmn_states VALUES("22","1","Rajasthan");
INSERT INTO cmn_states VALUES("23","1","Sikkim");
INSERT INTO cmn_states VALUES("24","1","Tamil Nadu");
INSERT INTO cmn_states VALUES("25","1","Tripura");
INSERT INTO cmn_states VALUES("26","1","Uttar Pradesh");
INSERT INTO cmn_states VALUES("27","1","Uttarakhand");
INSERT INTO cmn_states VALUES("28","1","West Bengal");
INSERT INTO cmn_states VALUES("29","1","Union Territory");
INSERT INTO cmn_states VALUES("30","1","Delhi");



