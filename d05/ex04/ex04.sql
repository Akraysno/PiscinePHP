UPDATE `ft_table`
SET `date_de_creation` = CONCAT(YEAR(`date_de_creation`)+20, '-', MONTH(`date_de_creation`), '-', DAY(`date_de_creation`))
WHERE `id` > 5;