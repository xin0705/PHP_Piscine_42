SELECT title, summary From film
WHERE title Like '%42%' OR summary Like '%42%'
ORDER BY duration;