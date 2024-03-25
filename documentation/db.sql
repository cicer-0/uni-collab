CREATE TABLE Users (
  id INT PRIMARY KEY,
  Username VARCHAR(255),
  Password VARCHAR(255),
  Email VARCHAR(255),
  DateCreated DATETIME
);

CREATE TABLE Roles (
  id INT PRIMARY KEY,
  RoleName VARCHAR(255),
  Description VARCHAR(255)
);

CREATE TABLE UserRoles (
  UserId INT,
  RoleId INT,
  PRIMARY KEY (UserId, RoleId),
  FOREIGN KEY (UserId) REFERENCES Users(id),
  FOREIGN KEY (RoleId) REFERENCES Roles(id)
);

CREATE TABLE Projects (
  id INT PRIMARY KEY,
  UserId INT,
  ProjectName VARCHAR(255),
  Status VARCHAR(255),
  ProjectOwner VARCHAR(255),
  Faculty VARCHAR(255),
  ResearchArea VARCHAR(255),
  ResearchLine VARCHAR(255),
  NumMembers INT,
  Description VARCHAR(255),
  FOREIGN KEY (UserId) REFERENCES Users(id)
);

CREATE TABLE Forms (
  id INT PRIMARY KEY,
  ProjectId INT,
  MicrosoftFormLink VARCHAR(255),
  FOREIGN KEY (ProjectId) REFERENCES Projects(id)
);

CREATE TABLE Requests (
  id INT PRIMARY KEY,
  ProjectId INT,
  UserId INT,
  RequestStatus VARCHAR(255),
  FOREIGN KEY (ProjectId) REFERENCES Projects(id),
  FOREIGN KEY (UserId) REFERENCES Users(id)
);
