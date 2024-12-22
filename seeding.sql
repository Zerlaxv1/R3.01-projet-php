insert into Entraineur values (1, 'demo', '$2y$10$gVlQaQwR6WdCzdTLSaxhUuKDOZrfBr3O2BcXWEEBqT2J9Bma0ljLG');
insert into Entraineur values (2, 'coach1', '$2y$10$abcdefg1234567890hijklmnopqrstuvwxyz');
insert into Entraineur values (3, 'coach2', '$2y$10$1234567890abcdefghijklmnopqrstuvwxyz');

insert into Joueur values (1, 'Dupont', 'Jean', '123456', '1990-01-01', 180, 75.5, NULL, 'Actif', 'Pillier', 'Bon joueur');
insert into Joueur values (2, 'Martin', 'Paul', '654321', '1992-02-02', 175, 80.0, NULL, 'Blessé', 'Talonneur', 'En rééducation');
insert into Joueur values (3, 'Durand', 'Pierre', '789012', '1994-03-03', 185, 85.0, NULL, 'Suspendu', 'Demi', 'Suspendu pour 2 matchs');
insert into Joueur values (4, 'Petit', 'Luc', '345678', '1996-04-04', 170, 70.0, NULL, 'Absent', 'Trois-quart', 'Absent pour raisons personnelles');

insert into `Match` values (1, 'Equipe A', '2023-10-01 15:00:00', 'Domicile', 'Victoire');
insert into `Match` values (2, 'Equipe B', '2023-10-15 15:00:00', 'Exterieur', 'Défaite');
insert into `Match` values (3, 'Equipe C', '2023-11-01 15:00:00', 'Domicile', 'Nul');

insert into Participe values (1, 1, 8);
insert into Participe values (1, 2, 7);
insert into Participe values (2, 3, 6);
insert into Participe values (3, 4, 9);