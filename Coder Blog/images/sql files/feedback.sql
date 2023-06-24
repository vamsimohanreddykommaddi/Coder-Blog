CREATE TABLE `feedback` (
  `sno` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;