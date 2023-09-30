/*
	All'interno di postgreSQL creare con l'utente " postgres " il database 
	tramite il seguente comando:

	CREATE DATABASE movielife;

*/

/*
	Dopo aver aperto il query tool del database " movielife " creare l'utente 
	tramite il seguente comando:

	CREATE USER www PASSWORD 'tsw2022'

*/



/*
	Script di creazione del database
*/

DROP TABLE IF EXISTS film CASCADE;
DROP TABLE IF EXISTS utente CASCADE;
DROP TABLE IF EXISTS categoria CASCADE;
DROP TABLE IF EXISTS appartenenza CASCADE;
DROP TABLE IF EXISTS recensione CASCADE;
DROP TABLE IF EXISTS preferito CASCADE;
DROP TABLE IF EXISTS attore CASCADE;
DROP TABLE IF EXISTS recitazione CASCADE;


CREATE TABLE film (
	codice serial PRIMARY KEY,
	titolo varchar(50) NOT NULL,
	regista varchar(50) NOT NULL,
	trama text NOT NULL,
	durata varchar(50) NOT NULL,
	produzione varchar(50) NOT NULL,
	trailer text NOT NULL,
	anno integer NOT NULL,
	datauscita date NOT NULL,
	copertina text NOT NULL,
	premi integer default 0,
	oscar boolean default false,
	CONSTRAINT unique_tit_reg UNIQUE(titolo,regista)
);

CREATE TABLE utente(
	codice serial PRIMARY KEY,
	nome varchar(50) NOT NULL,
	cognome varchar(50) NOT NULL,
	username varchar(50) NOT NULL UNIQUE,
	password varchar(255) NOT NULL,
	email varchar(50) NOT NULL UNIQUE,
	foto text default 'Images/default_avatar.jpg'
);

CREATE TABLE categoria(
	nome varchar(50) PRIMARY KEY
);

CREATE TABLE appartenenza(
	categoria varchar(50),
	film integer,
	PRIMARY KEY (categoria,film),
	CONSTRAINT fk_categoria FOREIGN KEY (categoria) REFERENCES categoria(nome)
						on update CASCADE on delete RESTRICT,
	CONSTRAINT fk_film FOREIGN KEY (film) REFERENCES film(codice)
						on update CASCADE on delete RESTRICT
);

CREATE TABLE attore(
	nome varchar(80) PRIMARY KEY,
	wiki text NOT NULL,
	foto text NOT NULL
);

CREATE TABLE recitazione(
	film integer,
	attore varchar(80),
	PRIMARY KEY (film,attore),
	CONSTRAINT fk_film FOREIGN KEY (film) REFERENCES film(codice)
						on update CASCADE on delete RESTRICT,
	CONSTRAINT fk_attore FOREIGN KEY (attore) REFERENCES attore(nome)
						on update CASCADE on delete RESTRICT
);


CREATE TABLE preferito(
	utente integer, 
	film integer, 
	PRIMARY KEY (utente,film),
	CONSTRAINT fk_film FOREIGN KEY (film) REFERENCES film(codice)
						on update CASCADE on delete RESTRICT,
	CONSTRAINT fk_utente FOREIGN KEY (utente) REFERENCES utente(codice)
						on update CASCADE on delete RESTRICT
);

CREATE TABLE recensione(
	id serial PRIMARY KEY,
	utente integer,
	film integer,
	headline text NOT NULL,
	recensione text NOT NULL,
	dataRecensione date NOT NULL,
	rating integer  NOT NULL,
	CONSTRAINT fk_film FOREIGN KEY (film) REFERENCES film(codice)
						on update CASCADE on delete RESTRICT,
	CONSTRAINT fk_utente FOREIGN KEY (utente) REFERENCES utente(codice)
						on update CASCADE on delete RESTRICT
);


/*            
		Permessi all'utente www             
*/

GRANT ALL PRIVILEGES ON film TO www;
GRANT ALL PRIVILEGES ON utente TO www;
GRANT ALL PRIVILEGES ON categoria TO www;
GRANT ALL PRIVILEGES ON appartenenza TO www;
GRANT ALL PRIVILEGES ON recensione TO www;
GRANT ALL PRIVILEGES ON preferito TO www;
GRANT ALL PRIVILEGES ON attore TO www;
GRANT ALL PRIVILEGES ON recitazione TO www;
GRANT USAGE,SELECT ON ALL SEQUENCES IN SCHEMA public TO www;