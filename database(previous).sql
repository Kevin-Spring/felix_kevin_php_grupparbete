DROP TABLE PostImage;
DROP TABLE Posts;
DROP TABLE Comments;
DROP TABLE Images;
DROP TABLE Categories;
/*DROP TABLE Admins;*/
DROP TABLE Users;

Create table Users(
Id INT NOT NULL AUTO_INCREMENT,
	firstName VARCHAR(40) NOT NULL,
    lastName VARCHAR(40) NOT NULL,
    userName VARCHAR(25) NOT NULL,
    userPassword VARCHAR(32) NOT NULL,
    email VARCHAR(30) NOT NULL,
    accountCreated DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    role VARCHAR(5) DEFAULT 'user' NOT NULL,
    PRIMARY KEY (Id)
);

Create table Categories(
Id INT NOT NULL AUTO_INCREMENT,
    categoryName VARCHAR(30),
    PRIMARY KEY(Id)
);

Create table Images(
Id INT NOT NULL AUTO_INCREMENT,
    imageLink VARCHAR(500),
    imageDescription VARCHAR(30),
    PRIMARY KEY(Id)
);

Create table Comments(
Id INT NOT NULL AUTO_INCREMENT,
    userId INT NOT NULL,
    commentDate Date NOT NULL,
    commentContent VARCHAR(280) NOT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY(userId) REFERENCES Users(Id)
);

Create table Posts(
Id INT NOT NULL AUTO_INCREMENT,
    commentId INT NOT NULL,
    imageId INT NOT NULL,
    categoryId INT NOT NULL,
    postDate DATE NOT NULL,
    postTitle VARCHAR(20) NOT NULL,
    postContent VARCHAR(2000) NOT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY(commentId) REFERENCES Comments(Id),
    FOREIGN KEY(imageId) REFERENCES Images(Id),
    FOREIGN KEY(categoryId) REFERENCES Categories(Id)
);


Create table PostImage(
Id INT NOT NULL AUTO_INCREMENT,
    imageId INT NOT NULL,
    postID INT NOT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY(imageId) REFERENCES Images(Id),
    FOREIGN KEY(postId) REFERENCES Posts(Id)
);

INSERT INTO Users(firstName, lastName, userName, userPassword, email, accountCreated, role) VALUES("admin", "admin", "admin", "21232f297a57a5a743894a0e4a801fc3", "admin@mail.com","2020-02-25", "admin");



