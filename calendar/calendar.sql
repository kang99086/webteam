--
-- 데이터베이스: `calendar`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `memorials`
--

CREATE TABLE IF NOT EXISTS `memorials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(4) NOT NULL,
  `subject` text NOT NULL,
  `start_year` char(4) DEFAULT NULL,
  `memorial_date` varchar(4) NOT NULL,
  `dateType` tinyint(2) NOT NULL DEFAULT '0',
  `writing_date` date NOT NULL DEFAULT '1990-01-01',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 테이블의 덤프 데이터 `memorials`
--

INSERT INTO `memorials` (`id`, `category`, `subject`, `start_year`, `memorial_date`, `dateType`, `writing_date`) VALUES
(1, 1, '홍길동 생일', '1978', '0827', 1, '2018-10-30'),
(2, 1, '이정민 생일', '1979', '1215', 1, '2018-10-30'),
(3, 1, '홍진경 생일', '1992', '0614', 0, '2018-10-30');

-- --------------------------------------------------------

--
-- 테이블 구조 `memorial_data`
--

CREATE TABLE IF NOT EXISTS `memorial_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relatedid` int(11) NOT NULL,
  `solar_date` date NOT NULL DEFAULT '1990-01-01',
  `lunar_date` date NOT NULL DEFAULT '1990-01-01',
  `yun` tinyint(1) NOT NULL DEFAULT '0',
  `subject` text NOT NULL,
  `category` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `relatedid` (`relatedid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `tbl_events`
--

CREATE TABLE IF NOT EXISTS `tbl_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 테이블의 덤프 데이터 `tbl_events`
--
