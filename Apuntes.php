<?php


/* Apuntes

# Create Database

Ejemplo: 

- CREATE DATABASE test;

--------------------------------------------------------------------------------

# Show Current Databases:

Ejemplo:

- SHOW DATABASES;

--------------------------------------------------------------------------------

# Pick or select any database:

Ejemplo:

- USE cat_app;
- SELECT DATABASE(); // see whats the database im currently on

--------------------------------------------------------------------------------

# Erase Databases:

Ejemplo:

- DROP DATABASE test;

--------------------------------------------------------------------------------

# Create Table

Ejemplo: 

- CREATE TABLE test (name VARCHAR(100), age INT);
- CREATE TABLE test (name VARCHAR(100) NOT NULL, age INT NOT NULL);

--------------------------------------------------------------------------------

# Show Current Tables from database

Ejemplo:

- SHOW TABLES;
- DESC test; // Ver los detalles y como esta formada la tabla

--------------------------------------------------------------------------------

# Borrar Tablas

Ejemplo:

- DROP TABLE test;

--------------------------------------------------------------------------------

# Inser

Ejemplo:

INSERT INTO test(name, age) values ("Jetson", 7);

# Inser Multiple values into the Tables

Ejemplo:

- INSERT INTO test (name, age) values 
    ('abel', 9), 
    ('cadiel', 7), 
    ('sodiel', 12); 

--------------------------------------------------------------------------------

# Show warnings

Ejemplo:

SHOW WARNINGS;

--------------------------------------------------------------------------------

# Setting default values into columns 

Ejemplo:

CREATE TABLE cats3 
    (
        cat_id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(20) --- DEFAULT --- 'no name provided',
        age INT ---  DEFAULT --- 99,
        PRIMARY KEY (cat_id)
    );

CREATE TABLE cats4
    (
        name VARCHAR(20) DEFAULT 'no name provided' NOT NULL,
        age INT DEFAULT 99 NOT NULL
    );

--------------------------------------------------------------------------------

# Tarea:

CREATE TABLE cats 
  ( 
     cat_id INT NOT NULL AUTO_INCREMENT, 
     name   VARCHAR(100), 
     breed  VARCHAR(100), 
     age    INT, 
     PRIMARY KEY (cat_id) 
  ); 

INSERT INTO cats(name, breed, age) 
VALUES ('Ringo', 'Tabby', 4),
       ('Cindy', 'Maine Coon', 10),
       ('Dumbledore', 'Maine Coon', 11),
       ('Egg', 'Persian', 4),
       ('Misty', 'Tabby', 13),
       ('George Michael', 'Ragdoll', 9),
       ('Jackson', 'Sphynx', 7);

--------------------------------------------------------------------------------

# Read:

Ejemplo:

- SELECT * FROM cats;
- SELECT name FROM cats; 
- SELECT breed FROM cats;
- SELECT age FROM cats;
- SELECT cat_id FROM cats;
- SELECT name, age FROM cats;

# Read: Where

Ejemplo:

- SELECT * FROM cats WHERE name = 'Egg';
- SELECT * FROM cats WHERE breed = 'Tabby';
- SELECT article, color, shirt_size, last_worn FROM shirts WHERE shirt_size = 'M';

# Read: Aliases

Ejemplo:

- SELECT cat_id as id, name as 'kitty name', breed AS 'kitty breed' from cats;
- SELECT author_fname AS first, author_lname AS last, CONCAT(author_fname, ' ', author_lname) AS full FROM books; // Esto es para hacer una revision y darle un titulo especifico a cada columna 

--------------------------------------------------------------------------------

# Update

Ejemplo:

- UPDATE cats SET breed = 'Shorthair' WHERE breed = 'Tabby';
- UPDATE cats SET age = 14 WHERE name = 'Misty';

--------------------------------------------------------------------------------

# Delete

Ejemplo: 

- DELETE FROM cats WHERE name = 'Egg';
- DELETE FROM cats; // Deletes everything from the table;

--------------------------------------------------------------------------------

# CONCAT 

Ejemplo:

- SELECT CONCAT(author_fname, ' ', author_lname) FROM books;
- SELECT CONCAT_WS(' - ', author_fname, author_lname) from books; // Esto lo que hace es poner una raya en medio de cada columna, muy util

--------------------------------------------------------------------------------

# SUBSTR() or SUBSTRING()

Ejemplo:

- SELECT SUBSTRING('Hello World', 1, 4); // = Hell
- SELECT SUBSTRING('Hello World', 7); // = World
- SELECT SUBSTRING('Hello World', -7); // = o World
- SELECT SUBSTRING(title, 1, 4) FROM books;
- SELECT CONCAT (
    SUBSTRING(
        title, 1, 10
    ), '...'
) AS 'short title'
FROM books;


--------------------------------------------------------------------------------

# Replace

Ejemplo:

- SELECT REPLACE('Hello World'. 'Hell', '****'); =  ****o World // This is case sentitive

# Replace: Substring

Ejemplo: 

- SELECT SUBSTRING(REPLACE(title, 'e', '3'), 1, 10) from books;

--------------------------------------------------------------------------------

# Reverse

Ejemplo: 

-SELECT REVERSE ('Hello World'); = DLROw OLLEH;
-SELECT CONCAT(author_fname, REVERSE(author_fname)) FROM books;

--------------------------------------------------------------------------------

# Char Length

Ejemplo:

- SELECT CHAR_LENGTH('HELLO WORLD'); // 11
- SELECT author_lname, CHAR_LENGTH(author_lname) AS 'length' FROM books; // Name, 4
- SELECT CONCAT(author_lname, ' is ', CHAR_LENGTH(author_lname), ' characters long');

--------------------------------------------------------------------------------

# UPPER() and LOWER() and REVERSE

Ejemplo:

- SELECT UPPER('Hello World'); = HELLO WORLD
- SELECT LOWER('Hello World'); = hello world
- SELECT CONCAT('MY BOOK', LOWER(title)) from books; = MY BOOK rome
- SELECT CONCAT(UPPER(author_fname), ' ', UPPER(author_lname)) AS "full name in caps" 
FROM books;

--------------------------------------------------------------------------------

Tarea: 

- SELECT 
   author_lname AS forwards,
   REVERSE(author_lname) AS backwards 
FROM books;

- SELECT
   UPPER
   (
      CONCAT(author_fname, ' ', author_lname)
   ) AS 'full name in caps'
FROM books;

- SELECT
   CONCAT(title, ' was released in ', released_year) AS blurb
FROM books;
SELECT
   title,
   CHAR_LENGTH(title) AS 'character count'
FROM books;

- SELECT
   CONCAT(SUBSTRING(title, 1, 10), '...') AS 'short title',
   CONCAT(author_lname, ',', author_fname) AS author,
   CONCAT(stock_quantity, ' in stock') AS quantity
FROM books;

--------------------------------------------------------------------------------

# DISTINCT: sirve para mostrar valores que no se repitan mas de una vez

Ejemplo: 

- SELECT DISTINCT author_lname FROM books;
- SELECT DISTINCT concat(author_lname, ' ', author_fname) FROM books;
- SELECT DISTINCT author_fname, author_lname FROM books;

--------------------------------------------------------------------------------

# ORDER BY: sirve para ordenar los valores mostrados de manera alfabetica o numeral o tambien de muchas maneras

Ejemplo:

- SELECT book_id, author_fname, author_lname FROM books ORDER BY author_fname;
- SELECT id, author_name, author_lname, released_year FROM books ORDER BY released_year;
- SELECT author_name, author_lname, released_year FROM books ORDER BY 2 DESC // 

--------------------------------------------------------------------------------

# LIMIT: Permite establecer un maxinmo de informacion traida de una query 

Ejemplo:

- SELECT book_id, title, released_year FROM books LIMIT 5;
- SELECT book_id, title, released_year FROM books ORDER BY released_year LIMIT 5;
- SELECT book_id, title, released_year FROM books ORDER BY released_year DESC LIMIT 5; // Me trae los libros mas recientes
- SELECT book_id, title, released_year FROM books ORDER BY released_year 1,5 // Quiere decir que me trae desde la fila numero 1 hasta la fila numero 1 hasta la fila numero 5 de la query traida
- SELECT book_id, title, released_year FROM books ORDER BY released_year 3,2 // Me trae 2 libros pero comenzando desde la fila numero 3


--------------------------------------------------------------------------------

# LIKE: Better searching, la diferencia de WHERE y LIKE es que LIKE te busca filas que se parezcan al valor insertado

Ejemplo: 

- SELECT title, author_fname, author_lname FROM books WHERE author_fname LIKE '%a%'; // Busca valores que tengan una a dentro del dato
- SELECT * FROM books WHERE title LIKE '%:%';
- SELECT * FROM books WHERE author_fname LIKE '_ _ _ _'; // Esto lo que hara es buscarme nombres que tengas cuatro valores 
- SELECT * FROM books WHERE author_fname LIKE '_a_'; // Busca valores que tengan una a de por medio ejemplo: Dan
- SELECT * FROM books WHERE author_fname LIKE '%n'; // Da como resultado Don, John, Dan
- SELECT * FROM books where author_fname LIKE '%\%%'; // Esto es para buscar con el simbolo %

--------------------------------------------------------------------------------

# Tarea

SELECT title, author_name FROM books WHERE author_name LIKE '%\_%';

SELECT title, released_year, stock_quantity FROM books ORDER BY stock_quantity LIMIT 3;

SELECT title, author_name FROM books ORDER BY author_name,title;

SELECT CONCAT('MY FAVORITE AUTHOR IS ', UPPER(author_lname), '!') AS yell FROM books ORDER BY author_lname;

SELECT title, author_lname FROM books WHERE author_lname LIKE '% %';


