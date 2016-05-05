SELECT
	users.user_nicename AS 班级名称,
	count(posts.ID) AS 博客数量
FROM
	posts,
	post_metas,
	users
WHERE
	posts.ID = post_metas.id
AND users.id = posts.post_author
AND posts.post_status = 'publish'
AND post_metas.category = 2464
AND posts.post_date >= '2014-03-01'
GROUP BY
	users.id
