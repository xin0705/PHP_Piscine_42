SELECT SUBSTRING(REVERSE(phone_number), 1, 9) AS 'rebmunenohp'
FROM distrib
WHERE phone_number LIKE '05%';