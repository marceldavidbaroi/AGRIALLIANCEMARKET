
create  users table in the database 
CREATE TABLE `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `location` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `phone` VARCHAR(15) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);


create profuct list
CREATE TABLE ProductList (
    ProductID INT AUTO_INCREMENT,
    Type VARCHAR(255),
    Name VARCHAR(255),
    Price DECIMAL(10, 2),
    Quantity INT,
    PRIMARY KEY (ProductID)
);


order list
CREATE TABLE Orders (
    id INT AUTO_INCREMENT,
    phone VARCHAR(255),
    Pname VARCHAR(255),
    Ptype VARCHAR(255),
    Pprice DECIMAL(10, 2),
    insert_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);





