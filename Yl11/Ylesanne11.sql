CREATE TABLE moovel_loomaaed
(
id integer PRIMARY KEY auto_increment,
nimi varchar(50),
vanus integer,
liik varchar(50),
puur integer
);

INSERT INTO moovel_loomaaed (nimi, vanus, liik , puur) VALUES ('Lolo', 3, 'pingviin', 1), ('Pepe', 2, 'pingviin', 1), ('Simba', 5, 'lõvi', 2), ('Alex', 4, 'lõvi', 3), ('Samson', 7, 'lõvi', 4); 

SELECT nimi, puur FROM moovel_loomaaed WHERE puur=1

SELECT max( vanus ) AS vanim, min( vanus ) AS noorim
FROM moovel_loomaaed

SELECT puur, count(*) FROM moovel_loomaaed GROUP BY puur; 

UPDATE moovel_loomaaed SET vanus=vanus+1;