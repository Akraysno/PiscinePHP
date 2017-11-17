SELECT COUNT(DISTINCT `id_film`) AS 'films'
FROM `historique_membre`
WHERE (MONTH(`date`) = '12' AND DAY(`date`) = '24') OR `date` BETWEEN '2006-10-30' AND '2007-07-27';
