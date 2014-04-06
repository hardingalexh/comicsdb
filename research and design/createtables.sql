CREATE TABLE publisher (
	ID int NOT NULL AUTO_INCREMENT,
	name varchar(255),
	PRIMARY KEY (ID)
);

CREATE TABLE series (
	ID int NOT NULL AUTO_INCREMENT,
	title varchar(255),
	pub_id int,
	PRIMARY KEY (ID),
	FOREIGN KEY (pub_id) REFERENCES publisher(ID) 
);

CREATE TABLE issue (
	ID int NOT NULL AUTO_INCREMENT,
	format varchar(255),
	pages int,
	issue_num varchar(255),
	title varchar(255),
	price float(4,2),
	cover varchar(255),	cov_date date,
	description text,
	series_id int,
	identifier varchar(255),
	PRIMARY KEY (ID),
	FOREIGN KEY (series_id) REFERENCES series(ID)
	);

CREATE TABLE creator (
	ID int NOT NULL AUTO_INCREMENT,
	fname varchar(255),
	lname varchar(255),
	bio text,
	PRIMARY KEY (ID)
);

CREATE TABLE role (
	ID int NOT NULL AUTO_INCREMENT,
	type varchar(255),
	PRIMARY KEY (ID)
);

CREATE TABLE creator_issue (
c_ID int NOT NULL,
r_ID int NOT NULL,
i_ID int NOT NULL,
FOREIGN KEY (c_ID) REFERENCES creator(ID),
FOREIGN KEY (r_ID) REFERENCES role(ID),
FOREIGN KEY (i_ID) REFERENCES issue(ID),
CONSTRAINT pk_creator_issue PRIMARY KEY (c_ID, r_ID, i_ID)
);

CREATE TABLE story_arc (
	ID int NOT NULL AUTO_INCREMENT,
	title varchar(255),
	description text,
	PRIMARY KEY (ID)
);

CREATE TABLE issue_arc (
	arc_id int NOT NULL,
	issue_id int NOT NULL,
	FOREIGN KEY (arc_id) REFERENCES story_arc(ID),
	FOREIGN KEY (issue_id) REFERENCES issue(ID),
	CONSTRAINT issue_arc_pk PRIMARY KEY (arc_id, issue_id)
);

CREATE TABLE collected_edition (
	ID int NOT NULL AUTO_INCREMENT,
	format varchar(255),
	pages int,
	cover varchar(255),
	title varchar(255),
	price float(4,2),
	ISBN varchar(255),
	pub_date date,
	PRIMARY KEY (ID)
);

CREATE TABLE arc_edition (
	arc_id int,
	ce_id int,
	FOREIGN KEY (arc_id) REFERENCES story_arc(ID),
	FOREIGN KEY (ce_id) REFERENCES collected_edition(ID),
	CONSTRAINT ae_pk PRIMARY KEY (arc_id, ce_id)
);

CREATE TABLE plot_element (
	ID int NOT NULL AUTO_INCREMENT,
	type varchar(255),
	explanation text,
	PRIMARY KEY (ID)
);

CREATE TABLE plot_arc (
	arc_id int,
	plot_id int,
	FOREIGN KEY (arc_id) references story_arc(ID),
	FOREIGN KEY (plot_id) references plot_element(ID),
	CONSTRAINT plot_arc_pk PRIMARY KEY (arc_id, plot_id)
);

CREATE TABLE collect_issue (
	ce_id int,
	issue_id int,
	FOREIGN KEY (ce_id) REFERENCES collected_edition(ID),
	FOREIGN KEY (issue_id) REFERENCES issue(ID),
	CONSTRAINT ce_pk PRIMARY KEY (ce_id, issue_id)
);

CREATE TABLE characters (
	ID int NOT NULL AUTO_INCREMENT,
	fname varchar(255),
	mname varchar(255),
	lname varchar(255),
	PRIMARY KEY (ID)
);

CREATE TABLE alias (
	ID int NOT NULL AUTO_INCREMENT,
	name varchar(255),
	PRIMARY KEY (ID)
);

CREATE TABLE organization (
	ID int NOT NULL AUTO_INCREMENT,
	name varchar(255),
	PRIMARY KEY (ID)
);

CREATE TABLE c_a_i (
	c_id int,
	a_id int,
	i_id int,
	FOREIGN KEY (c_id) REFERENCES characters(ID),
	FOREIGN KEY (a_id) REFERENCES alias(ID),
	FOREIGN KEY (i_id) REFERENCES issue(ID),
	CONSTRAINT c_a_i_pk PRIMARY KEY (c_id, a_id, i_id)
);

CREATE TABLE c_o_i (
	c_id int,
	o_id int,
	i_id int,
	FOREIGN KEY (c_id) REFERENCES characters(ID),
	FOREIGN KEY (o_id) REFERENCES organization(ID),
	FOREIGN KEY (i_id) REFERENCES issue(ID),
	CONSTRAINT c_a_i_pk PRIMARY KEY (c_id, o_id, i_id)
);

/* users and feedback */

CREATE TABLE user (
	ID int AUTO_INCREMENT,
	username varchar(255),
	password varchar(255),
	email varchar(255),
	PRIMARY KEY (ID)
);

CREATE TABLE fback_ce (
	user_id int,
	ce_id int,
	rating int,
	FOREIGN KEY (user_id) REFERENCES user(ID),
	FOREIGN KEY (ce_id) REFERENCES collected_edition(ID),
	CONSTRAINT fback_ce_pk PRIMARY KEY (user_id, ce_id)
);

CREATE TABLE fback_sa (
	user_id int,
	sa_id int,
	rating int,
	FOREIGN KEY (user_id) REFERENCES user(ID),
	FOREIGN KEY (sa_id) REFERENCES story_arc(ID),
	CONSTRAINT fback_sa_pk PRIMARY KEY (user_id, sa_id)
);

CREATE TABLE fback_i (
	user_id int,
	i_id int,
	rating int,
	FOREIGN KEY (user_id) REFERENCES user(ID),
	FOREIGN KEY (i_id) REFERENCES issue(ID),
	CONSTRAINT fback_i_pk PRIMARY KEY (user_id, i_id)
);

CREATE TABLE fback_s (
	user_id int,
	s_id int,
	rating int,
	FOREIGN KEY (user_id) REFERENCES user(ID),
	FOREIGN KEY (s_id) REFERENCES series(ID),
	CONSTRAINT fback_s_pk PRIMARY KEY (user_id, s_id)
);

