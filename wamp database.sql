CREATE TABLE profile (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE post (
  id int(11) NOT NULL AUTO_INCREMENT,
  profileID int(11) DEFAULT NULL,
  profileName varchar(255) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  description text DEFAULT NULL,
  image varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
);