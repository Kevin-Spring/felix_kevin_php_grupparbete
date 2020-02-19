

Create table Users(
Id INT NOT NULL AUTO_INCREMENT,
	firstName VARCHAR(40) NOT NULL,
    lastName VARCHAR(40) NOT NULL,
    userName VARCHAR(25) NOT NULL,
    userPassword VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    PRIMARY KEY (Id)
);

Create table Admins(
Id INT NOT NULL AUTO_INCREMENT,
    adminFirstName VARCHAR(40) NOT NULL,
    adminLastName VARCHAR(40) NOT NULL,
    adminUserName VARCHAR(25) NOT NULL,
    adminPassword VARCHAR(30) NOT NULL,
   PRIMARY KEY(Id)
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
    adminId INT NOT NULL,
    commentDate Date NOT NULL,
    commentContent VARCHAR(280) NOT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY(userId) REFERENCES Users(Id),
    FOREIGN KEY(adminId) REFERENCES Admins(Id)
);

Create table Posts(
Id INT NOT NULL AUTO_INCREMENT,
    commentId INT NOT NULL,
    adminId INT NOT NULL,
    imageId INT NOT NULL,
    categoryId INT NOT NULL,
    postDate DATE NOT NULL,
    postTitle VARCHAR(20) NOT NULL,
    postContent VARCHAR(2000) NOT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY(commentId) REFERENCES Comments(Id),
    FOREIGN KEY(adminId) REFERENCES Admins(Id),
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

INSERT INTO Admins(adminFirstName, adminLastName, adminUserName, adminPassword) VALUES("AdminFirstName", "AdminLastName", "Admin", "Admin");



