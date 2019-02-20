ALTER TABLE cinema
ADD CONSTRAINT cinema_FK FOREIGN KEY (location_id) REFERENCES locations(location_id)


ALTER TABLE favorite_movies
ADD CONSTRAINT user_FK FOREIGN KEY (user_id) REFERENCES users(user_id),
ADD CONSTRAINT mov_FK FOREIGN KEY (movie_id) REFERENCES movies(movie_id)


ALTER TABLE halls
ADD CONSTRAINT cin_FK FOREIGN KEY (cinema_id) REFERENCES cinema(cinema_id),
ADD CONSTRAINT ha_FK FOREIGN KEY (hall_type_id) REFERENCES hall_types(hall_type_id)


ALTER TABLE movies
ADD CONSTRAINT cin1_FK FOREIGN KEY (movie_type_id) REFERENCES movie_type(movie_type_id),
ADD CONSTRAINT age1_FK FOREIGN KEY (age_rest_id) REFERENCES age_restriction(age_rest_id)


ALTER TABLE tickets
ADD CONSTRAINT cin2_FK FOREIGN KEY (cinema_id) REFERENCES cinema(cinema_id),
ADD CONSTRAINT h1_FK FOREIGN KEY (hall_id) REFERENCES halls(hall_id),
ADD CONSTRAINT m1_FK FOREIGN KEY (movie_id) REFERENCES movies(movie_id)