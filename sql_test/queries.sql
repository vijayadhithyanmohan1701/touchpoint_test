/* 
1.	Create 2 tables “posts” (id, title, pub_date) and “tags” (id, post_id, tag) with the fields mentioned in parentheses. 
The tags table will contain each tag against the post in each separate row. 
Write a SQL statement to get post id, title, and tags (comma separated tags from tags table)
*/
SELECT posts.id AS 'id', posts.title AS 'title', GROUP_CONCAT(tags.tag SEPARATOR ',') AS 'tags' FROM posts, tags WHERE posts.id = tags.post_id GROUP BY posts.id

/* 
2.	Create 2 tables users (id,name, num_post) and user_posts (id, user_id, title) with the fields mentioned in parentheses. 

Write a single update query to update the num_post field for all the users in the users table. 

After updating, the data in users table should look similar to the below example.	

*/
UPDATE users SET users.num_posts = (SELECT COUNT(user_posts.user_id) FROM user_posts WHERE users.id = user_posts.user_id)