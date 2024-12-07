create database raizes;
use raizes;

create table usuario (
userID int auto_increment primary key,
userNome varchar(255) not null,
userEmail varchar(255),
userTelefone int,
senha varchar(255) not null,
acesso varchar(13) default "aluno"
);

CREATE TABLE curso (
cursoID int auto_increment primary key,
cursoTitulo varchar(255) not null,
cursoDescricao text,
professorID int,
foreign key (professorID) references Usuario(userID),
INDEX (professorID)
);


create table conteudo (
	conteudoID int auto_increment primary key,
	conteudoTitulo varchar(255) not null,
	descricaoConteudo text not null,
	nomeCurso varchar(255) not null,
	tipoConteudo ENUM('Video','Texto','Link') not null,
	cursoID int,
	foreign key (cursoID) references curso(cursoID),
	INDEX (cursoID)
);

create table inscricao (
    inscricaoID int auto_increment primary key,
    userID int,
    cursoID int,
    FOREIGN KEY (userID) REFERENCES usuario(userID),
    FOREIGN KEY (cursoID) REFERENCES curso(cursoID)
);

create table forum (
forumID int auto_increment primary key,
topicoForum varchar(255) not null,
descricaoForum varchar(255),
modulo text not null,
ForumArquivo blob not null,
userID int,
FOREIGN KEY (userID) REFERENCES usuario(userID)
);

create table projeto (
projetoID int auto_increment primary key,
projetoTitulo varchar(255) not null,
projetoDescricao varchar(255) not null,
projetoIndicadores text not null,
projetoArquivo blob not null
);

