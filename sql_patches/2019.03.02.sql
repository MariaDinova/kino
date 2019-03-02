ALTER TABLE `halls` ADD `hall_rows` TINYINT NOT NULL DEFAULT '10' AFTER `seats`;

ALTER TABLE tickets ADD user_id INT

ALTER TABLE tickets
ADD CONSTRAINT user_ticket_FK FOREIGN KEY (user_id) REFERENCES users(user_id);

ALTER TABLE tickets ADD slots INT

ALTER TABLE tickets ADD program_id INT

ALTER TABLE tickets ADD hall_row INT, ADD seat INT


ALTER TABLE tickets DROP FOREIGN KEY cin2_FK;

ALTER TABLE tickets DROP FOREIGN KEY H1_FK;

ALTER TABLE tickets DROP FOREIGN KEY m1_FK;

ALTER TABLE `tickets`
  DROP `cinema_id`,
  DROP `hall_id`,
  DROP `movie_id`;

ALTER TABLE `tickets` ADD UNIQUE( `date`, `slots`, `program_id`, `hall_row`, `seat`);