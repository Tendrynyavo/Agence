
CREATE TABLE utilisateur (
  idUser SERIAL primary key,
  nom varchar(10) DEFAULT NULL,
  prenom varchar(10) DEFAULT NULL,
  email varchar(10) DEFAULT NULL,
  mdp varchar(10) DEFAULT NULL,
  numTel varchar(10) DEFAULT NULL,
  sudo int DEFAULT NULL
);