CREATE TABLE `submit_answer` (
  `qno` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pdfname` varchar(50) NOT NULL,
  `visible` int(11) NOT NULL,
  `marks` float NOT NULL DEFAULT -1,
  `credit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
