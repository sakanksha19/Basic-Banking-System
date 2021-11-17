SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `accountdetails` (
  `sno` int(11) NOT NULL,
  `accNo` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `accountdetails` (`sno`, `accNo`, `name`, `email`, `balance`) VALUES
(1, 5212, 'Divya', 'divya@gmail.com', 6547),
(2, 4589, 'Anjali', 'anjali@gmail.com', 5655),
(3, 1289, 'Vaibhav', 'vaibhav@gmail.com', 9556),
(4, 3077, 'Adarsh', 'adarsh@gmail.com', 8766),
(5, 5467, 'Aman', 'aman@gmail.com', 8000),
(6, 7899, 'Sumit', 'sumit@gmail.com', 9000),
(7, 7978, 'Kartik', 'kartik@gmail.com', 8890),
(8, 4356, 'Shreyash', 'shreyash@gmail.com', 6546),
(9, 1456, 'Shifa', 'shifa@gmail.com', 8900),
(10, 9876, 'Prashant', 'prashant@gmail.com', 9999),
(11, 2431, 'Vishal', 'vishal@gmail.com', 9999);

CREATE TABLE `history` (
  `sno` int(11) NOT NULL,
  `payer` text NOT NULL,
  `payerAcc` int(11) NOT NULL,
  `payee` text NOT NULL,
  `payeeAcc` int(11) NOT NULL,
  `amount` double NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `history` (`sno`, `payer`, `payerAcc`, `payee`, `payeeAcc`, `amount`, `time`) VALUES
(1, 'Divya', 5212, 'Vaibhav', 1289, 200, '2021-11-02 20:40:09'),
(2, 'Anjali', 4589, 'Adarsh', 3077, 500, '2021-11-04 11:56:22');

ALTER TABLE `accountdetails`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `history`
  ADD PRIMARY KEY (`sno`);

ALTER TABLE `accountdetails`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `history`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
