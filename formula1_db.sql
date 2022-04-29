-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2022 at 05:03 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formula1_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `carID` int(11) NOT NULL,
  `chassis` varchar(10) NOT NULL,
  `powerUnit` varchar(20) NOT NULL,
  `team` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`carID`, `chassis`, `powerUnit`, `team`) VALUES
(1, 'MCL36', 'Mercedes', 6),
(2, 'F1-75', 'Ferrari', 1),
(3, 'W13', 'Mercedes', 4),
(4, 'RB18', 'Red Bull Powertrains', 3),
(5, 'VF-22', 'Ferrari', 11),
(6, 'C42', 'Ferrari', 7),
(7, 'A522', 'Renault', 8),
(8, 'AT03', 'Red Bull Powertrains', 9),
(9, 'AMR22', 'Mercedes', 10),
(10, 'FW44', 'Mercedes', 5);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driverID` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `country` varchar(30) NOT NULL,
  `podiums` int(11) NOT NULL,
  `careerPoints` int(11) NOT NULL,
  `championships` int(11) NOT NULL,
  `team` int(11) DEFAULT NULL,
  `rNum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driverID`, `firstName`, `lastName`, `dateOfBirth`, `country`, `podiums`, `careerPoints`, `championships`, `team`, `rNum`) VALUES
(1, 'Kevin', 'Magnussen', '1992-05-10', 'Denmark', 1, 168, 0, 11, 20),
(2, 'Mick', 'Schumacher', '1999-03-22', 'Germany', 0, 0, 0, 11, 47),
(3, 'Nicholas', 'Latifi', '1995-06-29', 'Canada', 0, 7, 0, 5, 6),
(4, 'Alexander', 'Albon', '1996-03-23', 'Thailand', 2, 197, 0, 5, 23),
(5, 'Sebastian', 'Vettel', '1987-07-03', 'Germany', 122, 3114, 4, 10, 5),
(6, 'Lance', 'Stroll', '1998-10-29', 'Canada', 3, 176, 0, 10, 18),
(7, 'Fernando', 'Alonso', '1981-07-29', 'Spain', 98, 1982, 2, 8, 14),
(8, 'Esteban', 'Ocon', '1996-09-17', 'France', 2, 278, 0, 8, 31),
(9, 'Max', 'Verstappen', '1997-09-30', 'Netherlands', 60, 1557, 1, 3, 1),
(10, 'Sergio', 'Perez', '1990-01-26', 'Mexico', 15, 896, 0, 3, 11),
(11, 'Daniel', 'Ricciardo', '1989-07-01', 'Australia', 32, 1274, 0, 6, 3),
(12, 'Lando', 'Norris', '1999-11-13', 'United Kingdom', 5, 306, 0, 6, 4),
(13, 'Pierre', 'Gasly', '1996-02-07', 'France', 3, 309, 0, 9, 10),
(14, 'Yuki', 'Tsunoda', '2000-05-11', 'Japan', 0, 36, 0, 9, 22),
(15, 'Valterri', 'Bottas', '1989-08-28', 'Finland', 67, 1746, 0, 7, 77),
(16, 'Guanyu', 'Zhou', '1999-05-30', 'China', 0, 1, 0, 7, 24),
(17, 'Lewis', 'Hamilton', '1985-01-07', 'England', 183, 4180, 7, 4, 44),
(18, 'George', 'Russell', '1998-02-15', 'England', 1, 31, 0, 4, 63),
(19, 'Charles', 'Leclerc', '1997-10-16', 'Monaco', 14, 586, 0, 1, 16),
(20, 'Carlos', 'Sainz', '1994-09-01', 'Spain', 7, 554, 0, 1, 55),
(21, 'Nico', 'Hulkenberg', '1987-08-19', 'Germany', 0, 521, 0, 10, 27);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `teamID` int(11) NOT NULL,
  `teamName` varchar(50) NOT NULL,
  `firstTeamEntry` int(11) NOT NULL,
  `worldChampionships` int(11) NOT NULL,
  `base` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`teamID`, `teamName`, `firstTeamEntry`, `worldChampionships`, `base`) VALUES
(1, 'Scuderia Ferrari', 1950, 16, 'Italy'),
(3, 'Red Bull Racing', 1997, 5, 'England'),
(4, 'Mercedes-AMG', 1970, 8, 'England'),
(5, 'Williams Racing', 1978, 9, 'England'),
(6, 'McLaren', 1966, 8, 'England'),
(7, 'Alfa Romeo', 1993, 0, 'Switzerland'),
(8, 'Alpine', 1986, 2, 'England'),
(9, 'Scuderia AlphaTauri', 1985, 0, 'Italy'),
(10, 'Aston Martin', 2018, 0, 'United Kingdom'),
(11, 'Haas', 2016, 0, 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(45) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `firstname` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `firstname`, `lastname`) VALUES
(2, 'jdoe', '$2y$10$6dI4x26we0OMskwnHhTHqe/hDQf6Gyq1AFrg6/q.TsDrM4aT6umpC', 'johndoe@nobody.com', 'John', 'Doe'),
(3, 'ab', '$2y$10$xEw4s2CEdNYYYP/2zb.GE.H791aCyQWhsSvW2qcas.nXch1gfizNK', 'anantb77@gmail.com', 'Anant', 'Batgali'),
(4, 'worldchampion', '$2y$10$wrm9T4mTLtIxFU7sy.RahumGR07lNHUnjp2moMThX2GiFHqyiEZce', 'champ@gmail.com', 'Yes', 'Right'),
(5, 'someone', '$2y$10$jR5spKGqZDpJGaqJdfk43eOK8Yox6GPdKqcokp3/WpOvTC.d1TOf6', 'new@guy.com', 'Elon', 'Musk'),
(7, 'abcd', '$2y$10$2B7HAfFHYCHWL7bdCDk4DuJJiuJXTOWhKwg1GW3ujpk.tlQW229ue', 'abcd@nobody.com', 'hello', 'from the other side'),
(14, 'anotherone', '$2y$10$/i0G0XNWkv2dOhasgPNW.ON/S1ABpV/8h5ImCJwUPd2I6/3PyoMiS', 'keep@playing.com', 'DJ', 'Khaled'),
(16, 'admin', '$2y$10$43BW8dlS0G..lsbzppUq6OR4DnWO5Y8vyvMqQmGgZX9JXAdP7myuK', 'admin@f1.com', 'someone', 'important'),
(17, 'drum', '$2y$10$OCApUDy8w.1p0Sr1cweNPe/ytYhtnlsTTC.xrGymENoOe9bSxt806', 'drum@gmail.com', 'drum', 'gum'),
(18, 'again', '$2y$10$icg/Ej7NrAf/4KTa1VpUd.w2EndFhsmpHsqoobLCFYKykPxs9l7ZO', 'someone@gmail.com', 'here we go', 'again'),
(19, 'pickle_returns', '$2y$10$c.5LM.s7b.p0kTAJj/pW0e1z6jXkH.OKYa/GR3ZStgBFJ3jyedK36', 'any@gmail.com', 'pickle', 'pickle');

-- --------------------------------------------------------

--
-- Table structure for table `user_favorites`
--

CREATE TABLE `user_favorites` (
  `favID` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `driverID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_favorites`
--

INSERT INTO `user_favorites` (`favID`, `username`, `driverID`) VALUES
(4, 'ab', 5),
(5, 'ab', 7),
(7, 'someone', 18),
(8, 'someone', 4),
(14, 'someone', 5),
(19, 'admin', 5),
(20, 'admin', 7),
(21, 'admin', 11),
(22, 'admin', 12),
(23, 'admin', 3),
(24, 'ab', 12),
(25, 'jdoe', 17),
(26, 'jdoe', 7),
(27, 'jdoe', 9),
(28, 'jdoe', 10),
(29, 'pickle_returns', 11),
(30, 'pickle_returns', 21),
(31, 'pickle_returns', 18),
(32, 'pickle_returns', 12),
(33, 'pickle_returns', 17),
(35, 'ab', 9),
(36, 'ab', 5),
(37, 'ab', 18),
(38, 'ab', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`carID`),
  ADD KEY `team` (`team`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driverID`),
  ADD KEY `team` (`team`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`teamID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_favorites`
--
ALTER TABLE `user_favorites`
  ADD PRIMARY KEY (`favID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `carID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `teamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_favorites`
--
ALTER TABLE `user_favorites`
  MODIFY `favID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`team`) REFERENCES `teams` (`teamID`);

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`team`) REFERENCES `teams` (`teamID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
