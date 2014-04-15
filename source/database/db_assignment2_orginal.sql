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
	content BLOB,

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

/*
DELIMITER $$
CREATE PROCEDURE `registerUser`(IN `user_email` VARCHAR(255), IN `user_lname`, IN `user_password`, IN `user_fname` VARCHAR(255))
BEGIN
	INSERT INTO user(status,password,email) VALUES ('active',`user_password`,`user_email`);
	SELECT @current_user_id := user_id FROM user
	INSERT INTO profile(user_id, fname,lname) VALUES(current_user_id,user_lname,user_fname)

END $$
DELIMITER;
*/
