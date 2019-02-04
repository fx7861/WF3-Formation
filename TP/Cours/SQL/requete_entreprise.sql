select service from employes where id_employes = 547; --1
select date_embauche from employes where prenom = 'amandine'; --2
select nom from employes where prenom = 'Guillaume'; --3
select count(*) as nb_personne from employes where id_employes like '5%'; --4
select count(*) as nb_commerciaux from employes where service = 'commercial'; --5
select ROUND(AVG(salaire)) as salaire_moyen_informaticien from employes where service = 'informatique'; --6
select * from employes order by nom ASC limit 5; --7
select SUM(salaire*12) as cout_des_commerciaux from employes where service = 'commercial'; --8
select service, ROUND(AVG(salaire),2) as salaire_moyen from employes GROUP BY service; --9
select count(*) from employes where date_embauche between '2010-01-01' and '2010-12-31'; --10
select AVG(salaire) as salaire_moyen_2005_2007 from employes where date_embauche between '2005-01-01' and '2007-12-31'; --11
select count(distinct service) as nb_services from employes; --12
select * from employes where service not in ('production','secretariat'); --13
select (select count(*) from employes where sexe = 'm') as Homme, (select count(*) from employes where sexe = 'f') as Femme from employes limit 1; --14 
select * from employes where date_embauche < '2005-01-01' and service = 'commercial' and sexe = 'm' and salaire > 2500; --15
select * from employes order by date_embauche DESC limit 1; --16
select * from employes where service = 'commercial' and salaire = (select max(salaire) from employes where service = 'commercial'); --17
select prenom from employes where service = 'comptabilite' and salaire = (select max(salaire) from employes where service = 'comptabilite'); --18
select prenom from employes where service = 'informatique' order by date_embauche limit 1; --19
update employes set salaire = salaire+100; --20
DELETE FROM employes WHERE service = 'secretariat';