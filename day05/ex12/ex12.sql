SELECT last_name, first_name
FROM user_card
WHERE last_name LIKE '%-%' OR first_name LIKE '%-%'
ORDER by last_name, first_name;