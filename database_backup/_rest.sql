
CREATE TABLE IF NOT EXISTS lodge_owner (
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

CREATE TABLE IF NOT EXISTS lodge (
	`lodge_id` BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`owner_id` BIGINT(20) NOT NULL,
	`lodge_name` VARCHAR(125) NOT NULL,
	`description` TEXT NOT NULL,
	`images` TEXT NOT NULL,
	`available_rooms` INT(10),
	`available` enum('0', '1') NOT NULL
);

CREATE TABLE IF NOT EXISTS reviews (
	`lodge_id` BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`reviewer_id` BIGINT(20) NOT NULL,
	`review` TEXT NOT NULL,
	`review_date` VARCHAR(25) NOT NULL	
);

CREATE TABLE IF NOT EXISTS posts (
  `post_id` BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `post_type` SMALLINT(2),
  `post_title` VARCHAR(25) NOT NULL,
  `post_category` VARCHAR(25),
  `post_content` TEXT,
  `post_date` VARCHAR(25) DEFAULT '0000-00-00, 00:00 AM',
  `poster` VARCHAR(25)
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

CREATE TABLE IF NOT EXISTS comments (
  `comment_id` BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `post_id` BIGINT(20) NOT NULL,
  `commenter_id` BIGINT(20) NOT NULL,
  `comment_body` TEXT,
  `recommended` BIGINT(20),
  `comment_date` VARCHAR(25) DEFAULT '0000-00-00, 00:00 AM',
  `comment_type` INT(4)
);

CREATE TABLE IF NOT EXISTS comment_reply (
  `comment_reply_id` BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` BIGINT(20) NOT NULL,
  `comment_id` BIGINT(20) NOT NULL,
  `reply` Text,
  `reply_date_UTC` VARCHAR(25) DEFAULT '0000-00-00, 00:00 AM'  
);

CREATE TABLE IF NOT EXISTS friends (
  `friendship_id` BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `mem_id` BIGINT(20) NOT NULL,
  `mem_id_2` BIGINT(20) NOT NULL,
  `mem_friended_date_UTC` VARCHAR(25) DEFAULT '0000-00-00, 00:00 AM' 
);

CREATE TABLE IF NOT EXISTS private_messages (
  `message_id` BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `sender_id` BIGINT(20) NOT NULL,
  `receiver_id` BIGINT(20) NOT NULL,
  `message_body` TEXT,
  `message_date_UTC` VARCHAR(25)
);