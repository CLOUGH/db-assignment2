/*
* STRONG ENTITIES
*/
CREATE TABLE user(
	user_id INT NOT NULL,
	status VARCHAR (255),
	password VARCHAR(255),
	reg_id VARCHAR(255),

	PRIMARY KEY (user_id)
);
CREATE TABLE post(
	post_id INT NOT NULL,
	post_type VARCHAR(255),
	image_path VARCHAR(255),
	text_body BLOB,

	PRIMARY KEY (post_id)
);
CREATE TABLE comment(
	comment_id INT NOT NULL,
	content BLOB,

	PRIMARY KEY (comment_id)
);

CREATE TABLE group(
	group_id INT NOT NULL,
	group_name VARCHAR(255),

	PRIMARY KEY (group_id)
);


CREATE TABLE group_post(
	gpost_id INT NOT NULL,
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
	email VARCHAR(255),
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
	FOREIGN KEY (post_id) REFERENCES post(post_id) ON DELETE CASCADE
	FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE
);

CREATE TABLE comments_on(
	post_id INT NOT NULL,
	user_id INT NOT NULL,
	comment_id INT NOT NULL,
	date_commented DATE,

	PRIMARY KEY (post_id),
	PRIMARY KEY (user_id),
	PRIMARY KEY (comment_id),
	FOREIGN KEY (post_id) REFERENCES post(post_id) ON DELETE CASCADE
	FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE
	FOREIGN KEY (comment_id) REFERENCES comment(comment_id) ON DELETE CASCADE
);

CREATE TABLE friend_of(
	friend_owner INT NOT NULL, 
	friend INT NOT NULL, 
	type VARCHAR(255),

	PRIMARY KEY(friend_owner),
	PRIMARY KEY (friend)
);

CREATE TABLE add_editors(
	group_owner INT  
);