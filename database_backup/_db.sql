CREATE TABLE IF NOT EXISTS user (
  `user_id` BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(30) NOT NULL,
  `email_address` VARCHAR(750) NOT NULL,
  `password` VARCHAR(75) NOT NULL,
  `salt` VARCHAR(75) NOT NULL,
  `sign_up_date_UTC` VARCHAR(25) NOT NULL,
  `sign_up_ip` VARCHAR(20) NOT NULL,
  `last_login_date_UTC` VARCHAR(25) NOT NULL,
  `activ_pin` VARCHAR(40) NOT NULL,
  `activ_state` enum('0','1') NOT NULL,
  `has_visited` enum('0','1'),
  `is_admin` enum('0','1','2') NOT NULL,
  `firstname` VARCHAR(25) NOT NULL,
  `lastname` VARCHAR(25) NOT NULL,
  `othername` VARCHAR(25),
  `sex` enum('M','F') NOT NULL,
  `phone_no` VARCHAR(20) NOT NULL,
  `date_of_birth` VARCHAR(25) NOT NULL,
  `marital_status` enum('Married', 'Single'),
  `village` VARCHAR(25),
  `ward` VARCHAR(25),
  `district` VARCHAR(25),
  `lga` VARCHAR(25),
  `state` VARCHAR(25),
  `home_address` VARCHAR(255),
  `town` VARCHAR(25),
  `acct_no` VARCHAR(12),
  `bvn` VARCHAR(12),
  `bank` VARCHAR(25),
  `is_flagged` enum('0','1'),
  `flagged_by_id` BIGINT(20),
  `flag_date` VARCHAR(25) DEFAULT '0000-00-00, 00:00 AM',
  `is_blocked` enum('0','1'),
  `blocked_by_id` BIGINT(20),
  `block_date` varchar(25) DEFAULT '0000-00-00, 00:00 AM' 
);

CREATE TABLE IF NOT EXISTS loan (
  `user_id` BIGINT(20) NOT NULL,
  `loan_id` BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `latitude` BIGINT(20) NOT NULL,
  `longitude` BIGINT(20) NOT NULL,
  `vat_no` BIGINT(20) NOT NULL,
  `field_officer_id` BIGINT(20) NOT NULL,
  `field_officer_name` VARCHAR(125) NOT NULL,
  `anchor_company` VARCHAR(125) NOT NULL,
  `entry_date` VARCHAR(25) DEFAULT '0000-00-00, 00:00 AM',
  `crop` enum('0','1') NOT NULL,
  `livestock` enum('0','1') NOT NULL,
  `other` enum('0','1') NOT NULL,
  `other_text` VARCHAR(125),
  `firstname` VARCHAR(25) NOT NULL,
  `middlename` VARCHAR(25),
  `lastname` VARCHAR(25) NOT NULL,
  `sex` enum('M','F') NOT NULL,
  `date_of_birth` VARCHAR(25) NOT NULL ,
  `marital_status` enum('Married','Single') NOT NULL,  
  `address` VARCHAR(255) NOT NULL,
  `tel_no` VARCHAR(20) NOT NULL,
  `village` VARCHAR(25) NOT NULL,
  `ward` VARCHAR(25) NOT NULL,
  `district` VARCHAR(25) NOT NULL,
  `lga` VARCHAR(25) NOT NULL,
  `state` VARCHAR(25) NOT NULL,
  `bvn` VARCHAR(12) NOT NULL,
  `acct_no` VARCHAR(12) NOT NULL,
  `bank` VARCHAR(12) NOT NULL,
  `hectarage` BIGINT(20) NOT NULL,
  `cost_per_hectare` BIGINT(20) NOT NULL,
  `loan_amount` VARCHAR(20) NOT NULL,
  `is_land_registered` enum('Y','N') NOT NULL,
  `bvn_orig_owner` BIGINT(20),
  `name_orig_owner` VARCHAR(125),
  `is_land_owner` enum('Y','N') NOT NULL,
  `tel_no_orig_owner` VARCHAR(20),
  `land_authority` VARCHAR(10) NOT NULL,
  `approval_status` enum('pending', 'approved', 'rejected'),
  `approved_by_id` bigint(20),
  `approve_date` varchar(25) DEFAULT '0000-00-00, 00:00 AM',
  `rejected_by_id` bigint(20),
  `reject_date` varchar(25) DEFAULT '0000-00-00, 00:00 AM',
  `is_flagged` enum('0','1'),
  `flagged_by_id` BIGINT(20),
  `flag_date` VARCHAR(25) DEFAULT '0000-00-00, 00:00 AM'
 );

CREATE TABLE IF NOT EXISTS history (
  `history_id` BIGINT(20) NOT NULL,
  `history` VARCHAR(255) NOT NULL,
  `history_date` VARCHAR(25)
);