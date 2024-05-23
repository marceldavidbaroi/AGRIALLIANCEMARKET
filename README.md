# AGRIALLIANCEMARKET

Welcome to AGRIALLIANCEMARKET, a comprehensive platform designed for farmers to purchase their daily farming commodities as well as food items. Our website is built with a focus on simplicity and ease of use, ensuring that farmers can find and order what they need without hassle.

## Features

- **User Authentication**: Secure login, logout, and signup systems.
- **Shopping Cart**: A convenient cart to manage orders and goods.
- **Remove Item from Order**: Ability to remove unwanted items from the order list.
- **Confirm Order**: Option to confirm the order and update the status to 'confirmed'.

## Built With

- PHP
- HTML
- Bootstrap
- MySQL

## Getting Started

To get a local copy up and running, follow these simple steps.

### Prerequisites

- Download and install [XAMPP](https://www.apachefriends.org/index.html).

### Installation

1. **Start XAMPP** and ensure that MySQL is running. If MySQL can't find the port, copy the backup folder of MySQL and rename it to `data`.
2. **Create a database** named `userdb` which will contain 3 tables: `users`, `ProductList`, and `Orders`.

   Use the following SQL command to create the database and the tables:

````markdown
```sql

CREATE DATABASE userdb;
USE userdb;
CREATE TABLE `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `location` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `phone` VARCHAR(15) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);
 CREATE TABLE ProductList (
     ProductID INT AUTO_INCREMENT,
     Type VARCHAR(255),
     Name VARCHAR(255),
     Price DECIMAL(10, 2),
     Quantity INT,
     PRIMARY KEY (ProductID)
 );
 CREATE TABLE Orders (
     id INT AUTO_INCREMENT,
     phone VARCHAR(255),
     Pname VARCHAR(255),
     Ptype VARCHAR(255),
     Pprice DECIMAL(10, 2),
     status VARCHAR(50) DEFAULT 'not confirmed',
     insert_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (id)
 );
    ALTER TABLE Orders
    ADD COLUMN status VARCHAR(50) DEFAULT 'not confirmed' AFTER Pprice;
```
````

3. **Copy the repository** to the `xampp/htdocs` folder.
4. **Launch the application** by navigating to `localhost/[repository_name]` in your web browser.

### Note

A product list in the form of SQL is included in the repo to kickstart the project. Simply run the SQL in the productlist_SQL.txt in the `productlist` table to populate it with data.

## Contributing

Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

## Sample Output

![image](https://github.com/marceldavidbaroi/AGRIALLIANCEMARKET/assets/159849210/e520f8c3-8d3c-477f-89e9-d5d26c63ef96)
![image](https://github.com/marceldavidbaroi/AGRIALLIANCEMARKET/assets/159849210/8ca8b6fe-3444-421d-8829-ffd41954a0c3)
<<<<<<< HEAD
![image](https://github.com/marceldavidbaroi/AGRIALLIANCEMARKET/assets/159849210/433975f5-6486-491d-bc78-ffd31954a0c3)
=======
>>>>>>> 3169a58b1ad75abd24bb6835d37376170d6a5c0b
![image](https://github.com/marceldavidbaroi/AGRIALLIANCEMARKET/assets/159849210/b608ed67-55a7-4707-bb41-fd6f5c004da8)
