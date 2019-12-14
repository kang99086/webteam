SET foreign_key_checks = 0;
DROP TABLE IF EXIsts attendance_check;
DROP TABLE IF EXISTS students;

CREATE TABLE students(
  id  INT NOT NULL,
  pw  VARCHAR(300)  NOT NULL,
  name  VARCHAR(30) NOT NULL,
  section CHAR(1) NOT NULL DEFAULT 'A',
  major VARCHAR(30) NOT NULL DEFAULT '소프트웨어학과',
  question_no INT NOT NULL,
  question_answer VARCHAR(30) not NULL,
  CONSTRAINT PK_stuents PRIMARY KEY(id)
);

CREATE TABLE attendance_check (
  attendance_day DATE  NOT NULL DEFAULT current_date,
  id  INT NOT NULL,
  attendance_time TIMESTAMP NOT NULL  DEFAULT current_timestamp,
  attendance INT NOT NULL  DEFAULT 0,
  CONSTRAINT PK_attendance_check PRIMARY KEY (attendance_day,id),
  CONSTRAINT FK_attendance_check FOREIGN KEY(id)
  REFERENCES students(id) ON UPDATE CASCADE ON DELETE RESTRICT
);

insert into students(id,pw,name,section,major,question_no,question_answer) values
(2018777777,"qwe123","홍길동","A","테스트1학과",1,"라면"),
(2018777776,"qwe123","홍길순","A","테스트1학과",1,"라면"),
(2017777777,"qwe123!","홍순이","B","테스트2학과",1,"김치찌개"),
(2017777776,"qwe123!","홍순삼","B","테스트2학과",1,"김치찌개");

insert into attendance_check(attendance_day,id,attendance_time,attendance) values
("2019-12-14",2018777777,"2019-12-14 14:02:04",1),
("2019-12-14",2018777776,"2019-12-14 14:02:04",0),
("2019-12-12",2017777777,"2019-12-12 14:02:04",0),
("2019-12-13",2017777777,"2019-12-13 14:02:04",0),
("2019-12-14",2017777777,"2019-12-14 14:02:04",1);
