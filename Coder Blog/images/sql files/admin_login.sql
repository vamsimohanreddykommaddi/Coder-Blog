CREATE TABLE `admin_login` (
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'user.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`first_name`, `last_name`, `username`, `password`, `email`, `contact`, `image`) VALUES
('kommaddi', 'vamsi', 'mohan', 'cb@32', 'kvmrvamsi@gmail.com', 8008381047, 'admin_1.jpg');