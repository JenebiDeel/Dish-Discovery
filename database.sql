DROP DATABASE IF EXISTS dish_discovery;

CREATE DATABASE dish_discovery;

USE dish_discovery;

CREATE TABLE users (
	user_id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    about_me TEXT NULL,
    profiel_foto BLOB NULL
);

ALTER TABLE users ADD (email VARCHAR(50) NOT NULL);

CREATE TABLE recipes (
    recipe_id MEDIUMINT PRIMARY KEY AUTO_INCREMENT,
    user_id MEDIUMINT,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    food_type ENUM('Breakfast', 'Lunch', 'Dinner', 'Dessert', 'Snack'),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);


INSERT INTO `users` (`username`, `password`, `about_me`, `profiel_foto`, `email`)
VALUES ('foo', 'bar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
   Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'foobar@gmail.com');

INSERT INTO `recipes` (`recipe_id`, `user_id`, `title`, `description`, `food_type`) 
VALUES (1, 1, 'Pannenkoeken', '- 300 g tarwebloem - 1 tl zout - 2 middelgrote scharreleieren - 500 ml halfvolle melk 
- 30 g ongezouten roomboter - 1 Zeef de bloem met het zout boven een grote beslagkom. 
Voeg de eieren en de melk toe en klop met een garde tot een glad beslag. Schenk de rest van de melk 
erbij en klop opnieuw glad. Dek de kom af met vershoudfolie en laat het beslag 30 min. staan. 
- 2 Verhit een klontje boter in een koekenpan van 24 cm doorsnee en schep er een soeplepel beslag in. Draai de pan rond zodat de hele bodem bedekt is. 
- 3 Laat de pannenkoek 2 min. op middelhoog vuur bakken tot de bovenkant droog is en de onderkant goudbruin. Draai de pannenkoek om en bak nog 1 min. Herhaal met de rest van het beslag.
 - 4 Houd de pannenkoeken warm onder een deksel of een bord tot al het beslag gebruikt is.', 'Breakfast');

INSERT INTO `recipes` (`user_id`, `title`, `description`, `food_type`) 
VALUES(1, 'Yoghurtcake met framboos', 'Ingrediënten 2 middelgrote scharreleieren 150 ml halfvolle yoghurt 80 ml zonnebloemolie 8 g vanillesuiker 130 g honing
1 biologische citroen 175 g volkoren tarwemeel 1 tl bakpoeder ¼ tl zout 175 g diepvries frambozen Verwarm de oven voor op 160 °C. Bedek de bodem van de bakvorm met bakpapier. Klop de eieren met de yoghurt, olie, vanillesuiker en honing in een kom los.
2 Boen de citroen schoon en rasp de gele schil van de citroen. Voeg het volkorenmeel, de bakpoeder, citroenrasp en het zout toe en roer goed door. Spatel voorzichtig de helft van de bevroren frambozen erdoor en verdeel het beslag over de bakvorm. Verdeel de rest van de frambozen erover en bak de cake in ca. 35 min. in de oven gaar.
3 Controleer na 30 min. of de cake gaar is. Steek hiervoor een satéprikker in het midden van de cake. Als deze er schoon uitkomt, is de cake gaar. Neem de cake uit de oven en laat in 2 uur afkoelen.')