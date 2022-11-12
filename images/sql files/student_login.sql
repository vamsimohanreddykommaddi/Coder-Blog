CREATE TABLE `student_login` (
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'user.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


