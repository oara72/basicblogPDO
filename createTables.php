CREATE table blog_posts
	(postID INT AUTO_INCREMENT PRIMARY KEY, 
	postTitle VARCHAR(255), 
	postDesc TEXT,
	postCont TEXT,
	postDate DATETIME);

CREATE TABLE blog_members
(memberID INT AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(255), 
    password VARCHAR(255),  
    email VARCHAR(255),
    verifystring VARCHAR(20),
	active TINYINT);

nota: poner 0 en el class.user.php
entrar en admin y add-user.php
y a myphpadmin y cambiar manualmente el usuario creado a 1.
volver a poner en 1 el class.user.php