CREATE DATABASE comp_1006_final_city_rental;
USE comp_1006_final_city_rental;

CREATE TABLE `cities` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `population` int(11) NULL,
  UNIQUE (`name`, `province`, 'country')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `rentals` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `owner_name` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `contact_email` varchar(250) NULL,
  `contact_phone_number` varchar(250) NULL,
  `city_id` int NOT NULL,
  UNIQUE (`owner_name`, `contact_email`, `city_id`),
  FOREIGN KEY (`city_id`) REFERENCES cities(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
