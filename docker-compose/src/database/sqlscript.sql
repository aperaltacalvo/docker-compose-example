CREATE USER 'admin' IDENTIFIED BY 'admin';
CREATE DATABASE mi_base_de_datos;
USE mi_base_de_datos;
CREATE TABLE comentarios (id bigint(7) default NULL, id_noticia bigint(7) default NULL, nick char(20) default NULL, comentario char(250) default NULL, KEY id (id) );
GRANT ALL PRIVILEGES ON *.* TO 'admin' WITH GRANT OPTION;