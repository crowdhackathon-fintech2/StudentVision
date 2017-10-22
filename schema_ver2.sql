
    CREATE TABLE `branch_table` (
  		`Branch_id` int(11) NOT NULL,
  		`Branch_name` varchar(30) NOT NULL,
  		`City` varchar(30) NOT NULL,
  		`Assets` decimal(18,0) NOT NULL
	) ENGINE=MyISAM DEFAULT CHARSET=utf8;
    CREATE TABLE `cheque_table` (
      `Cheque_number` varchar(70) CHARACTER SET latin1 NOT NULL,
      `Cheque_recip_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
      `Cheque_recip_surname` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
      `Cheq_hold_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
      `Cheq_hold_surname` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
      `IBAN` varchar(50) CHARACTER SET latin1 NOT NULL,
      `Amount` decimal(18,0) NOT NULL,
      `Validation_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      `Expiration_Date` date NOT NULL COMMENT 'Λήξη',
      `Cashed_date` date DEFAULT NULL COMMENT 'Εξαργυρωση',
      `Blocked` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Μπλοκαρισμενη?',
      `Encrypted_Key` bigint(20) NOT NULL
	) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        INSERT INTO `cheque_table` (`Cheque_number`, `Cheque_recip_name`, `Cheque_recip_surname`, `Cheq_hold_name`, `Cheq_hold_surname`, `IBAN`, `Amount`, `Validation_Time`, `Expiration_Date`, `Cashed_date`, `Blocked`, `Encrypted_Key`) VALUES
    ('139084579', 'Λαζαρος', 'Ζερβος', 'Γιωργος', 'Ζερβoς', 'GR16 0110 1630 0000 1345 6789 4324 7854', '1500', '2017-10-04 00:41:09', '0000-00-00', NULL, 0, 0),
    ('139084577', 'Γιωργος', 'Ζερβος', 'Λαζαρος', 'Ζερβος', 'GR16 0110 1630 0000 1345 6789 4324 7854', '350', '2017-10-03 22:36:59', '0000-00-00', NULL, 1, 0),
    ('139084578', 'Γιωργος', 'Ζερβος', 'Λαζαρος', 'Ζερβος', 'GR16 0110 1630 0000 1345 6789 4324 7854', '1500', '2017-10-03 22:37:47', '0000-00-00', NULL, 1, 0),
    ('123456789', 'Λαζαρος', 'Ζερβος', 'Γιωργος', 'Μοσχοβης', 'GR16 0110 1630 0000 1634 7042 661', '0', '2017-10-08 00:28:19', '2017-10-03', '2017-10-25', 0, 0),
    ('123456788', 'Λαζαρος', 'Ζερβος', 'Δημητριος', 'Μπουκας', 'GR16 0110 1630 0000 1634 7042 661', '1230', '2017-10-04 00:41:44', '2301-09-10', NULL, 0, 0),
    ('126357123', 'Γιωργος', 'Ζερβος', 'Λαζαρος', 'Ζερβος', 'GR16 0110 1630 0000 1634 7042 661', '1230', '2017-10-03 22:39:21', '2190-03-10', NULL, 0, 0),
    ('157894356', 'Λαζαρος', 'Ζερβος', 'Κωνσταντινος', 'Ζερβος', 'GR16 0110 1630 0000 1634 7980 435', '1300', '2017-10-08 00:15:48', '2017-10-22', NULL, 0, 0);
    CREATE TABLE `depositor` (
      `User_id` varchar(30) NOT NULL,
      `Account_number` varchar(50) NOT NULL,
      `Registration_key` varchar(30) NOT NULL
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
    CREATE TABLE `log_table` (
      `User_id` varchar(30) NOT NULL,
      `Activity` varchar(10) NOT NULL,
      `Activity_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      `User_type` varchar(10) NOT NULL DEFAULT 'Client'
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
    INSERT INTO `log_table` (`User_id`, `Activity`, `Activity_Time`, `User_type`) VALUES
        ('User', 'Login', '2017-10-01 14:08:22', 'Client'),
        ('User', 'Logout', '2017-10-01 14:08:28', 'Client'),
        ('MANAGER', 'Login', '2017-10-01 14:55:54', 'Staff'),
        ('User', 'Login', '2017-10-01 14:33:30', 'Client'),
        ('User', 'Logout', '2017-10-01 14:34:17', 'Client'),
        ('MANAGER', 'Logout', '2017-10-01 14:55:58', 'Staff'),
        ('MANAGER', 'Login', '2017-10-01 15:51:38', 'Staff'),
        ('MANAGER', 'Logout', '2017-10-01 16:12:11', 'Staff'),
        ('MANAGER', 'Login', '2017-10-01 16:12:32', 'Staff'),
        ('MANAGER', 'Logout', '2017-10-01 16:33:21', 'Staff'),
        ('MANAGER', 'Login', '2017-10-01 16:33:31', 'Staff'),
        ('MANAGER', 'Logout', '2017-10-01 19:16:55', 'Staff'),
        ('User', 'Login', '2017-10-01 21:36:16', 'Client'),
        ('User', 'Logout', '2017-10-01 21:37:00', 'Client'),
        ('User', 'Login', '2017-10-01 22:07:35', 'Client'),
        ('User', 'Login', '2017-10-01 23:53:54', 'Client'),
        ('User', 'Login', '2017-10-02 00:07:49', 'Client'),
        ('User', 'Login', '2017-10-02 00:09:31', 'Client'),
        ('User', 'Login', '2017-10-02 00:19:20', 'Client'),
        ('User', 'Login', '2017-10-02 00:26:11', 'Client'),
        ('User', 'Login', '2017-10-02 00:27:06', 'Client'),
        ('User', 'Session Ex', '2017-10-02 00:58:03', 'Client'),
        ('User', 'Login', '2017-10-02 00:58:21', 'Client'),
        ('User', 'Login', '2017-10-02 01:05:21', 'Client'),
        ('User', 'Session Ex', '2017-10-02 01:20:13', 'Client'),
        ('User', 'Login', '2017-10-02 21:38:39', 'Client'),
        ('User', 'Login', '2017-10-02 22:46:20', 'Client'),
        ('User', 'Login', '2017-10-02 22:58:22', 'Client'),
        ('User', 'Login', '2017-10-02 23:37:20', 'Client'),
        ('User', 'Login', '2017-10-02 23:40:42', 'Client'),
        ('laz', 'Login', '2017-10-03 22:43:18', 'Client'),
        ('laz', 'Login', '2017-10-08 00:14:18', 'Client'),
        ('laz', 'Login', '2017-10-08 00:17:46', 'Client');
    CREATE TABLE `registrator` (
      `User_id` varchar(30) NOT NULL,
      `Cheque_number` varchar(10) NOT NULL,
      `Withdrawal_key` varchar(30) NOT NULL
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
    CREATE TABLE `supervisor` (
      `Login` varchar(30) NOT NULL,
      `Pasword` varchar(30) NOT NULL
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
    INSERT INTO `supervisor` (`Login`, `Pasword`) VALUES
	('MANAGER', '1234');
    CREATE TABLE `user_table` (
      `User_id` varchar(30) NOT NULL,
      `First_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
      `Last_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
      `Pasword` varchar(30) NOT NULL
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
    INSERT INTO `user_table` (`User_id`, `First_name`, `Last_name`, `Pasword`) VALUES
    ('User', 'Γιωργος', 'Ζερβος', '1234'),
    ('laz', 'Λαζαρος', 'Ζερβος', '12345');
    ALTER TABLE `account_table`
      ADD PRIMARY KEY (`IBAN`),
      ADD KEY `fk_account` (`Branch_id`),
      ADD KEY `name` (`name`,`surname`);
    ALTER TABLE `branch_table`
  	ADD PRIMARY KEY (`Branch_id`);
    ALTER TABLE `cheque_table`
  ADD PRIMARY KEY (`Cheque_number`),
  ADD KEY `fk1_loan` (`IBAN`),
  ADD KEY `Cheq_hold_name` (`Cheq_hold_name`,`Cheq_hold_surname`),
  ADD KEY `Cheque_recip_name` (`Cheque_recip_name`,`Cheque_recip_surname`);
  ALTER TABLE `depositor`
  ADD PRIMARY KEY (`User_id`,`Account_number`),
  ADD KEY `fk2_depositor` (`Account_number`);
  ALTER TABLE `log_table`
  ADD PRIMARY KEY (`User_id`,`Activity_Time`,`User_type`);
  ALTER TABLE `registrator`
  ADD PRIMARY KEY (`User_id`,`Cheque_number`),
  ADD KEY `fk2_borrower` (`Cheque_number`);
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`Login`);
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`User_id`);
