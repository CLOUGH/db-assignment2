/*
* STRONG ENTITIES
*/
CREATE TABLE user(
	user_id INT NOT NULL AUTO_INCREMENT,
	status VARCHAR (255),
	password VARCHAR(255),
	email VARCHAR(255) NOT NULL,

	PRIMARY KEY (user_id),
	UNIQUE (email)
);
CREATE TABLE post(
	post_id INT NOT NULL AUTO_INCREMENT,
	post_type VARCHAR(255),
	image_path VARCHAR(255),
	text_body VARCHAR(2000),

	PRIMARY KEY (post_id)
);
CREATE TABLE comment(
	comment_id INT NOT NULL AUTO_INCREMENT, 
	content VARCHAR(1000),

	PRIMARY KEY (comment_id)
);

CREATE TABLE user_group(
	group_id INT NOT NULL,
	group_name VARCHAR(255),

	PRIMARY KEY (group_id)
);


CREATE TABLE group_post(
	gpost_id INT NOT NULL AUTO_INCREMENT,
	title VARCHAR(255),
	g_post_type VARCHAR(255),
	g_image_path VARCHAR(255),
	text_body BLOB,

	PRIMARY KEY (gpost_id)
);

/*
* WEAK ENTITIES
*/
CREATE TABLE profile(
	user_id INT NOT NULL,
	fname VARCHAR(255),
	lname VARCHAR(255),
	dob DATE,
	profile_pic VARCHAR (255),

	PRIMARY KEY (user_id),
	FOREIGN KEY(user_id) REFERENCES user(user_id) ON DELETE CASCADE
);

/*
* RELATIONSHIPS
*/
CREATE TABLE creates(
	post_id INT NOT NULL,
	user_id INT NOT NULL,
	date_created DATE,

	PRIMARY KEY (post_id),
	FOREIGN KEY (post_id) REFERENCES post(post_id) ON DELETE CASCADE,
	FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE
);

CREATE TABLE comments_on(
	post_id INT NOT NULL,
	user_id INT NOT NULL,
	comment_id INT NOT NULL,
	date_commented DATE,

	PRIMARY KEY (post_id,user_id, comment_id),
	FOREIGN KEY (post_id) REFERENCES post(post_id) ON DELETE CASCADE,
	FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE,
	FOREIGN KEY (comment_id) REFERENCES comment(comment_id) ON DELETE CASCADE
);

CREATE TABLE friend_of(
	friend_owner INT NOT NULL, 
	friend INT NOT NULL, 
	type VARCHAR(255),

	PRIMARY KEY(friend_owner,friend)
);

CREATE TABLE add_editors(
	group_owner INT NOT NULL,
	user_added  INT NOT NULL,
	date_added DATE,

	PRIMARY KEY (group_owner,user_added),
	FOREIGN KEY (group_owner) REFERENCES user(user_id) ON DELETE CASCADE,
	FOREIGN KEY (user_added) REFERENCES user(user_id)
);

CREATE TABLE add_to_group(
	user_id INT NOT NULL,
	group_id INT NOT NULL,
	date_added DATE,

	PRIMARY KEY (user_id, group_id),
	FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE,
	FOREIGN KEY (group_id) REFERENCES user_group(group_id) ON DELETE	CASCADE
);

CREATE TABLE create_group(
	group_id INT NOT NULL,
	user_id INT NOT NULL,
	date_created DATE,

	PRIMARY KEY (group_id),
	FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE create_content(
	user_id INT NOT NULL,
	group_id INT NOT NULL,
	gpost_id INT NOT NULL,
	date_created DATE,

	PRIMARY KEY (user_id,group_id,gpost_id),
	FOREIGN KEY (user_id) REFERENCES user(user_id),
	FOREIGN KEY (group_id) REFERENCES user_group(group_id),
	FOREIGN KEY (gpost_id) REFERENCES group_post(gpost_id)
);


/*
TABLE ALTERATIONS
*/

/*
STORED PROCEDURES
*/

DELIMITER //
	 CREATE PROCEDURE lookUpUser(IN user_email varchar(255))
	 BEGIN
		SELECT * FROM user WHERE email=user_email;
	 END //
	DELIMITER ;
DELIMITER $$

DELIMITER //
	 CREATE PROCEDURE CreateUser(IN status varchar(255), password varchar(255), email varchar(255))
	 BEGIN
		INSERT INTO `user` ( `status`, `password`, `email`) VALUES (status, password, email);
	 END //
	DELIMITER ;
DELIMITER $$

/*
ADMIN
*/
INSERT INTO `add_to_group` (`user_id`, `group_id`, `date_added`) VALUES
(3, 3, '2014-04-16'),
(3, 4, '2014-04-16'),
(3, 5, '2014-04-16'),
(3, 6, '2014-04-16'),
(3, 7, '2014-04-16'),
(5, 6, '2014-04-16'),
(6, 3, '2014-04-16');

INSERT INTO `comment` (`comment_id`, `content`) VALUES
(1, 0x54636f6d65),
(2, 0x4920636f6d6d656e746564206f6e207468697320706f7374),
(3, 0x736166),
(4, 0x796f77);

INSERT INTO `comments_on` (`post_id`, `user_id`, `comment_id`, `date_commented`) VALUES
(1, 3, 1, '2014-04-15'),
(1, 3, 2, '2014-04-15'),
(1, 3, 3, '2014-04-15'),
(1, 3, 4, '2014-04-15');

INSERT INTO `creates` (`post_id`, `user_id`, `date_created`) VALUES
(1, 3, '2014-04-15'),
(2, 3, '2014-04-15'),
(3, 3, '2014-04-15'),
(4, 3, '2014-04-15');

INSERT INTO `create_content` (`user_id`, `group_id`, `gpost_id`, `date_created`) VALUES
(3, 3, 4, '2014-04-16'),
(3, 3, 5, '2014-04-16'),
(3, 6, 6, '2014-04-16'),
(5, 3, 3, '2014-04-16');

INSERT INTO `create_group` (`group_id`, `user_id`, `date_created`) VALUES
(0, 3, '2014-04-16'),
(3, 3, '2014-04-16'),
(4, 3, '2014-04-16'),
(5, 3, '2014-04-16'),
(6, 3, '2014-04-16'),
(7, 3, '2014-04-16'),
(8, 5, '2014-04-16');


INSERT INTO `friend_of` (`friend_owner`, `friend`, `type`) VALUES
(3, 5, 'friend'),
(5, 3, 'friend'),
(5, 6, 'friend'),
(6, 3, 'friend'),
(6, 5, 'friend');

INSERT INTO `group_post` (`gpost_id`, `title`, `g_post_type`, `g_image_path`, `text_body`) VALUES
(1, 'This a Group Post', 'Group Post', 'tesgt', 0x6564676b6d736764707367),
(3, 'Testing the assiciation rela', 'sdg', 'hf', 0x66646873),
(4, 'The New Group Post', 'sample', '', 0x546869732067726f757020697320676f696e6720746f206265207468652062657374207468696e672073696e636520736c696365206272656164),
(5, 'Final Post', 'info', '', 0x596f207520677579732073617720746865206e6577206e617275746f206d616e6761),
(6, 'This is a Group Post ', '', '', 0x54686973206973207468652073616d652070706c65617365);

INSERT INTO `post` (`post_id`, `post_type`, `image_path`, `text_body`) VALUES
(1, 'test', NULL, NULL),
(2, 'user_post', '', 0x5465657374),
(3, 'user_post', '', 0x726f6e696e73666c6b6e6470666f6e6d7064666d6e645b66),
(4, 'user_post', '', 0x78766e622c6d2066766b2f6c0d0a);

INSERT INTO `profile` (`user_id`, `fname`, `lname`, `dob`, `profile_pic`) VALUES
(3, 'Shane', 'Campbell', '1970-01-01', '../images/profile_pics/SL381711_crop.jpg'),
(5, 'Warren', 'Clough', '1970-01-01', '../images/profile_pics/IMG_20140307_091259520.jpg'),
(6, 'Kenrick', 'Beckett', '1991-06-10', NULL);

INSERT INTO `user` (`user_id`, `status`, `password`, `email`) VALUES
(3, 'active', 'a4TxbGfBrxO3Y', 'shanec132006@hotmail.com'),
(5, 'active', 'a4TxbGfBrxO3Y', 'clough.warren@gmail.com'),
(6, 'active', 'a4TxbGfBrxO3Y', 'kenrick1991@gmail.com');


INSERT INTO `user_group` (`group_id`, `group_name`) VALUES
(1, 'test'),
(2, 'This is the new one'),
(3, 'Another Group'),
(4, ''),
(5, ''),
(6, 'Final Group'),
(7, 'Second Group'),
(8, '');