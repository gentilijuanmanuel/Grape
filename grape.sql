#Inserción de usuarios

start transaction;

insert into usuarios values(1, 'jmgentili', 'juanma123', 'Juan Manuel', 'Gentili', '19950828', 'admin');
insert into usuarios values(2, 'mbianchi', 'martin123', 'Martín', 'Bianchi', '19950829', 'registrado');
insert into usuarios values(3, 'ischlatter', 'ivo123', 'Ivo', 'Schlatter', '19950830', 'registrado');
insert into usuarios values(4, 'jpoma', 'poma123', 'Julián Ema', 'Poma', '19940527', 'registrado');
insert into usuarios values(5, 'amalvestiti', 'andy123', 'Andrés', 'Malvestiti', '19960216', 'registrado');

commit;

rollback;

#Inserción de tipos de bebidas

start transaction;

insert into tipos_bebidas values(1, 'Whisky');
insert into tipos_bebidas values(2, 'Champagne');
insert into tipos_bebidas values(3, 'Vino');
insert into tipos_bebidas values(4, 'Vodka');
insert into tipos_bebidas values(5, 'Licor');

commit;

select * from tipos_bebidas;

#Inserción de bebidas

start transaction;

insert into bebidas values(1, 'JW Blue Label', '999', 'Whisky con 20 años de añejamiento', 1, 'Jonnhy Walker');
insert into bebidas values(2, 'JW Gold Label', '1499', 'Whisky con 25 años de añejamiento', 1, 'Jonnhy Walker');
insert into bebidas values(3, 'Ruttini Cavernet Sauvignon', '499', 'Cavernet Sauvignon', 3, 'Ruttini');
insert into bebidas values(4, 'Dom Perignon Rosé', '4999', 'Champán importado', 2, 'Dom Perignon');
insert into bebidas values(5, 'Baron B Extra Brut', '699', 'Champán importado', 2, 'Baron B');
insert into bebidas values(6, 'Absolut Pear', '459', 'Vodka saborizado', 4, 'Absolut');

commit;

rollback;

#Inserción de los pedidos

start transaction;

insert into pedidos values(1, 1, 4, current_date());
insert into pedidos values(2, 2, 10, current_date());
insert into pedidos values(3, 4, 2, current_date());

commit;








