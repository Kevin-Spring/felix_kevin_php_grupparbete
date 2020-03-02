Create table Users(
Id INT NOT NULL AUTO_INCREMENT,
	firstName VARCHAR(40) NOT NULL,
    lastName VARCHAR(40) NOT NULL,
    userName VARCHAR(25) NOT NULL,
    userPassword VARCHAR(32) NOT NULL,
    email VARCHAR(30) NOT NULL,
    accountCreated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    role VARCHAR(5) DEFAULT 'user' NOT NULL,
    PRIMARY KEY (Id)
);

Create table TestPost(
id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    content VARCHAR(2000) NOT NULL,
    img VARCHAR(500) NOT NULL,
    date_posted DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    Category VARCHAR(30) NOT NULL,
    PRIMARY KEY(id)
);

Create table TestComments(
id INT NOT NULL AUTO_INCREMENT,
    userId INT NOT NULL,
    postId INT NOT NULL,
    commentDate DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    commentContent VARCHAR(280) NOT NULL,
    commentTitle VARCHAR(30) NOT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY(userId) REFERENCES Users(Id),
    FOREIGN KEY(postId) REFERENCES TestPost(id)
);



INSERT INTO Users(firstName, lastName, userName, userPassword, email, accountCreated, role) VALUES("admin", "admin", "admin", "21232f297a57a5a743894a0e4a801fc3", "admin@mail.com","2020-02-25", "admin");



