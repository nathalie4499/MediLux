use mldemo;
CREATE TABLE Patient (
	id INT AUTO_INCREMENT PRIMARY KEY,
	ssn INT UNSIGNED,
	givenname VARCHAR(255),
	birthname VARCHAR(255),
	maritalname VARCHAR(255),
	nationality VARCHAR(255),
	`language` VARCHAR(255),
	age INT,
    telephone VARCHAR(255),
	activeproblems VARCHAR(255)
    )ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_bin;

INSERT INTO Patient (`ssn`, `givenname`, `birthname`, `maritalname`, `nationality`, `language`, `age`, `telephone`, `activeproblems` ) VALUE ('55454555', 'Laura', 'Halliday', 'Smet', 'French', 'French', '35', '691444666', 'Neurastenic, diabetic');
INSERT INTO Patient (`ssn`, `givenname`, `birthname`, `maritalname`, `nationality`, `language`, `age`, `telephone`, `activeproblems` ) VALUE ('78632117', 'Paul', 'Auster', 'relate', 'American', 'English', '55', '691222784', 'Migraines, heart problems, skin issues');
INSERT INTO Patient (`ssn`, `givenname`, `birthname`, `maritalname`, `nationality`, `language`, `age`, `telephone`, `activeproblems` ) VALUE ('63227415', 'Marco', 'Margine', 'Balk', 'German', 'German', '50', '691532744', 'blood issues, diabetic');
INSERT INTO Patient (`ssn`, `givenname`, `birthname`, `maritalname`, `nationality`, `language`, `age`, `telephone`, `activeproblems` ) VALUE ('37281462', 'Elisa', 'Gainsbourg', 'Paris', 'Norvegian', 'English', '25', '691887544', 'Anorexy, bore out');
INSERT INTO Patient (`ssn`, `givenname`, `birthname`, `maritalname`, `nationality`, `language`, `age`, `telephone`, `activeproblems` ) VALUE ('26873544', 'Igor', 'Marty', 'Marty', 'French', 'French', '29', '69158772', 'geek, overweight');
INSERT INTO Patient (`ssn`, `givenname`, `birthname`, `maritalname`, `nationality`, `language`, `age`, `telephone`, `activeproblems` ) VALUE ('46825543', 'Brigitte', 'Nordel', 'Lepage', 'French', 'French', '42', '691789334', 'burn out, stress');