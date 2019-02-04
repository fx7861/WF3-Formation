SELECT prenom from abonne WHERE id_abonne IN (SELECT id_abonne from emprunt where date_sortie = '2014-12-19');
SELECT COUNT(*) as nb_guillaume FROM emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = 'guillaume');
SELECT prenom FROM abonne WHERE id_abonne = (SELECT id_abonne FROM emprunt WHERE id_livre = (SELECT id_livre FROM livre WHERE auteur = 'ALPHONSE DAUDET'));
SELECT id_livre, titre from livre where id_livre in (SELECT id_livre from emprunt WHERE id_abonne = (SELECT id_abonne from abonne WHERE prenom = 'Chloé')); 
SELECT titre from livre where id_livre NOT in (SELECT id_livre from emprunt WHERE id_abonne = (SELECT id_abonne from abonne WHERE prenom = 'Chloé'));
SELECT titre from livre where id_livre in (SELECT id_livre from emprunt WHERE date_rendu is null and id_abonne = (SELECT id_abonne from abonne WHERE prenom = 'Chloé'));
SELECT prenom from abonne where id_abonne = (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_abonne) DESC limit 1);

SELECT e.date_sortie, e.date_rendu FROM emprunt e, livre l WHERE e.id_livre = l.id_livre AND l.auteur = 'Alphonse Daudet';
SELECT a.prenom FROM emprunt e, abonne a, livre l WHERE e.id_livre = l.id_livre AND e.id_abonne = a.id_abonne AND l.titre = 'Une Vie' AND e.date_sortie LIKE '2014%';
SELECT a.prenom, COUNT(e.id_abonne) AS nb_de_livre_emprunte FROM emprunt e, abonne a WHERE e.id_abonne = a.id_abonne GROUP BY e.id_abonne;
SELECT a.prenom, COUNT(e.id_abonne) AS nb_de_livre_a_rendre FROM emprunt e, abonne a WHERE e.id_abonne = a.id_abonne AND e.date_rendu IS NULL GROUP BY e.id_abonne;
SELECT a.prenom, e.date_sortie, l.titre FROM emprunt e, abonne a, livre l WHERE e.id_livre = l.id_livre AND e.id_abonne = a.id_abonne;
SELECT a.prenom, l.id_livre FROM emprunt e, abonne a, livre l WHERE e.id_livre = l.id_livre AND e.id_abonne = a.id_abonne;


