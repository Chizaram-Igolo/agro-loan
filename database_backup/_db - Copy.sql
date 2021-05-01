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
  `has_visited` enum('0','1')
);

CREATE TABLE IF NOT EXISTS user_bio_info (
  `user_id` BIGINT(20) NOT NULL PRIMARY KEY,
  `firstname` VARCHAR(50) NOT NULL,
  `lastname` VARCHAR(50) NOT NULL,
  `othername` VARCHAR(50),
  `sex` enum('M','F') NOT NULL,
  `home_address` VARCHAR(255),
  `town` VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS user_edu_profile (
  `user_id` BIGINT(20) NOT NULL PRIMARY KEY,
  `desc_summary` VARCHAR(128),
  `institution` VARCHAR(255),
  `course` VARCHAR(255),
  `about` TEXT,
  `skills` TEXT,
  `experience` TEXT,
  `edu_history` TEXT
);

CREATE TABLE IF NOT EXISTS comments_recommend (
  `recommend_id` BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` BIGINT(20) NOT NULL,
  `comment_id` BIGINT(20) NOT NULL,
  `recommend_date_UTC` VARCHAR(25) DEFAULT '0000-00-00, 00:00 AM'  
);

CREATE TABLE IF NOT EXISTS comment_reply (
  `comment_reply_id` BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` BIGINT(20) NOT NULL,
  `comment_id` BIGINT(20) NOT NULL,
  `reply` Text,
  `reply_date_UTC` VARCHAR(25) DEFAULT '0000-00-00, 00:00 AM'  
);

CREATE TABLE IF NOT EXISTS farm_coordinates(
  `user_id` BIGINT(20) NOT NULL,
  `loan_id` BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `latitude` BIGINT(20) NOT NULL,
  `longitude` BIGINT(20) NOT NULL,
  `vat_no` BIGINT(20) NOT NULL,
  `field_officer_id` BIGINT(20) NOT NULL,
  `field_officer_name` VARCHAR(125) NOT NULL,
  `anchor_company` VARCHAR(125) NOT NULL,
  `entry_date` VARCHAR(25) DEFAULT '0000-00-00, 00:00 AM' 
);

CREATE TABLE IF NOT EXISTS farmer (
  `user_id` BIGINT(20) NOT NULL,
  `loan_id` BIGINT(20) NOT NULL PRIMARY KEY,
  `crop` enum('0','1') NOT NULL,
  `livestock` enum('0','1') NOT NULL,
  `other` enum('0','1') NOT NULL,
  `other_text` VARCHAR(125) ,
  `firstname` VARCHAR(25) NOT NULL ,
  `middlename` VARCHAR(25),
  `lastname` VARCHAR(25) NOT NULL ,
  `sex` enum('M','F') NOT NULL,
  `date_of_birth` VARCHAR(25) NOT NULL ,
  `marital_status` enum('Y','N') NOT NULL,  
  `address` VARCHAR(125) NOT NULL,
  `tel_no` BIGINT(20) NOT NULL,
  `village` VARCHAR(125) NOT NULL,
  `ward` VARCHAR(125) NOT NULL,
  `district` VARCHAR(125) NOT NULL,
  `lga` VARCHAR(125) NOT NULL,
  `state` VARCHAR(125) NOT NULL
);

CREATE TABLE IF NOT EXISTS fin_details (
  `user_id` BIGINT(20) NOT NULL,
  `loan_id` BIGINT(20) NOT NULL PRIMARY KEY,
  `bvn` BIGINT(20) NOT NULL,
  `acct_no` BIGINT(20) NOT NULL,
  `bank` VARCHAR(125) NOT NULL
);

CREATE TABLE IF NOT EXISTS economics (
  `user_id` BIGINT(20) NOT NULL,
  `loan_id` BIGINT(20) NOT NULL PRIMARY KEY,
  `hectarage` BIGINT(20) NOT NULL,
  `cost_per_hectare` BIGINT(20) NOT NULL,
  `loan_amount` VARCHAR(125) NOT NULL
);

CREATE TABLE IF NOT EXISTS land_ownership (
  `user_id` BIGINT(20) NOT NULL,
  `loan_id` BIGINT(20) NOT NULL PRIMARY KEY,
  `is_land_registered` enum('Y','N') NOT NULL,
  `bvn_orig_owner` BIGINT(20)
);

CREATE TABLE IF NOT EXISTS orig_land_holding (
  `user_id` BIGINT(20) NOT NULL,
  `loan_id` BIGINT(20) NOT NULL PRIMARY KEY,
  `name_orig_owner` VARCHAR(125),
  `is_land_owner` enum('Y','N') NOT NULL,
  `tel_no_orig_owner` BIGINT(20),
  `land_authority` VARCHAR(125) NOT NULL
);