

CREATE TABLE `Programs` (
  `program_id` INT NOT NULL AUTO_INCREMENT,
  `hall_id` INT NOT NULL,
  `movie_id` INT NOT NULL,
  `hour_start` VARCHAR(45) NOT NULL,
  `period_id` INT NOT NULL,
  CONSTRAINT PK_Users PRIMARY KEY(program_id),
  CONSTRAINT hall_FK3 FOREIGN KEY (hall_id) REFERENCES halls(hall_id),
  CONSTRAINT movie_FK3 FOREIGN KEY (movie_id) REFERENCES movies(movie_id),
  CONSTRAINT period_FK3 FOREIGN KEY (period_id) REFERENCES periods(period_id))
  


CREATE TABLE  `age_restriction` (
  `age_rest_id` INT NOT NULL AUTO_INCREMENT,
  `restriction` VARCHAR(200) NOT NULL,
  CONSTRAINT PK_age PRIMARY KEY (`age_rest_id`))


CREATE TABLE `cinema` (
  `cinema_id` INT NOT NULL AUTO_INCREMENT,
  `location_id` INT NOT NULL,
  `cinema_name` VARCHAR(100) NOT NULL,
  CONSTRAINT PK_cinema PRIMARY KEY (`cinema_id`))



CREATE TABLE `favorite_movies` (
  `user_id` INT NOT NULL,
  `movie_id` INT NOT NULL)




CREATE TABLE `hall_types` (
  `hall_type_id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(100) NOT NULL,
  CONSTRAINT PK_hall_type  PRIMARY KEY (`hall_type_id`))



CREATE TABLE `halls` (
  `hall_id` INT NOT NULL AUTO_INCREMENT,
  `cinema_id` INT NOT NULL,
  `hall_type_id` INT NOT NULL,
  CONSTRAINT PK_halls PRIMARY KEY (`hall_id`))


CREATE TABLE `locations` (
  `location_id` INT NOT NULL AUTO_INCREMENT,
  `city` VARCHAR(100) NOT NULL,
  CONSTRAINT PK_locations  PRIMARY KEY (`location_id`))



CREATE TABLE `movie type` (
  `movie_type_id` INT NOT NULL AUTO_INCREMENT,
  `movie_type` VARCHAR(100) NOT NULL,
 CONSTRAINT PK_movie_type  PRIMARY KEY (`movie_type_id`))



CREATE TABLE `movies` (
  `movie_id` INT NOT NULL AUTO_INCREMENT,
  `movie_name` VARCHAR(100) NOT NULL,
  `description` VARCHAR(200) NOT NULL,
  `movie_type_id` INT NOT NULL,
  `image_uri` VARCHAR(100) NOT NULL,
  `trailer_uri` VARCHAR(100) NOT NULL,
  `age_rest_id` INT NOT NULL,
  CONSTRAINT PK_movies PRIMARY KEY (`movie_id`))



CREATE TABLE `periods` (
  `period_id` INT NOT NULL AUTO_INCREMENT,
  `start_date` DATE NOT NULL,
  `end_date` DATE NOT NULL,
  CONSTRAINT PK_periods PRIMARY KEY (`period_id`))



CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket_id` INT NOT NULL AUTO_INCREMENT,
  `cinema_id` INT NOT NULL,
  `hall_id` INT NOT NULL,
  `movie_id` INT NOT NULL,
  `date` DATE NOT NULL,
  `price` DOUBLE NOT NULL,
  CONSTRAINT PK_tickets PRIMARY KEY (`ticket_id`))



CREATE TABLE `users` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(100) NOT NULL,
  `last_name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(100) NOT NULL,
  `age` INT NOT NULL,
  `is_admin` TINYINT NULL,
  CONSTRAINT PK_users PRIMARY KEY (`user_id`))




