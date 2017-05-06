CREATE DATABASE classproject2017;
USE classproject2017;

CREATE TABLE allmajor(
  majorid INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  majorname VARCHAR(50)
);

CREATE TABLE allcourses(
  courseid INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  coursecode VARCHAR(10),
  coursename VARCHAR(100),
  courseyear INTEGER
);

CREATE TABLE allpermission(
  perid INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  pername VARCHAR(50)
);

CREATE TABLE useraccount(
  userid INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE,
  pwd VARCHAR(100),
  fname VARCHAR(40),
  lname VARCHAR(40),
  email VARCHAR(50) UNIQUE,
  gender VARCHAR(1),
  major_id INTEGER,
  userstatus ENUM('ACTIVE', 'INACTIVE'),
  per_id INTEGER,
  FOREIGN KEY (major_id) REFERENCES allmajor(majorid),
  FOREIGN KEY (per_id) REFERENCES allpermission(perid)
);

CREATE TABLE majorcourses(
  majorcourseid INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  major_id INTEGER,
  course_id INTEGER,
  FOREIGN KEY (major_id) REFERENCES allmajor(majorid),
  FOREIGN KEY (course_id) REFERENCES allcourses(courseid)
);



CREATE TABLE usercourses(
  user_id INTEGER NOT NULL,
  majorcourse_id INTEGER NOT NULL,
  grade VARCHAR(10),
  PRIMARY KEY(user_id,majorcourse_id),
  FOREIGN KEY (majorcourse_id) REFERENCES majorcourses(majorcourseid),
  FOREIGN KEY (user_id) REFERENCES useraccount(userid)
);
