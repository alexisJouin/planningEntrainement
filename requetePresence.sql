SELECT AVG(a.nbPresence) AS moyennePresence FROM 
  ( SELECT COUNT(p.id) as nbPresence FROM `presence` p 
	INNER JOIN entrainement e ON e.id = p.id_entrainement
	WHERE p.statut = 2
   	GROUP BY e.id
  	HAVING COUNT(p.id) > 3) a ;

	
SELECT e.date as entrainement, COUNT(p.id) as nbPresence FROM `presence` p 
INNER JOIN entrainement e ON e.id = p.id_entrainement
WHERE p.statut = 2 or p.statut = 1
GROUP BY e.id
HAVING COUNT(p.id) > 3
ORDER BY e.date;

/* Moyenne des présences le jeudi*/
SELECT AVG(a.nbPresence) AS moyennePresence FROM 
  ( SELECT COUNT(p.id) as nbPresence FROM `presence` p 
	INNER JOIN entrainement e ON e.id = p.id_entrainement
  	WHERE DAYOFWEEK(e.date) = 5
  	GROUP BY e.id
  	HAVING COUNT(p.id) > 3) a ;