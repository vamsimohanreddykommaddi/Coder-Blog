CREATE TABLE `post_question` (
  `qno` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` varchar(15) NOT NULL,
  `start_time` varchar(15) NOT NULL,
  `due_date` varchar(30) NOT NULL,
  `due_time` varchar(15) NOT NULL,
  `question` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `trend` int(11) NOT NULL DEFAULT 1,
   PRIMARY KEY(qno)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
