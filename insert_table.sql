DROP TABLE IF EXIsts attendance_check;
DROP TABLE IF EXISTS students;

CREATE TABLE students(
  id  INT NOT NULL,
  pw  VARCHAR(300)  NOT NULL,
  name  VARCHAR(30) NOT NULL,
  section CHAR(1) NOT NULL DEFAULT 'A',
  major VARCHAR(30) NOT NULL DEFAULT '소프트웨어학과',
  question_no INT NOT NULL,
  question_answer VARCHAR(30) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE attendance_check (
  attendance_date DATE  NOT NULL DEFAULT current_date,
  student_id  INT NOT NULL,
  attendance_time TIMESTAMP NOT NULL  DEFAULT current_timestamp,
  attance INT NOT NULL  DEFAULT 0,
  PRIMARY KEY (attendance_date,student_id),
  FOREIGN KEY (student_id) REFERENCES students (id)
);
