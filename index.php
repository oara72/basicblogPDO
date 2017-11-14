<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

<div id="wrapper">

    <h1>Blog</h1>
    <hr />
    <nav>
    <a href="admin/login.php">login</a>
    </nav>

    <?php
    try {

        $stmt = $db->query('SELECT postID, postTitle, postSlug, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
        while($row = $stmt->fetch()){

            echo '<div>';
            echo '<h1><a href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></h1>';
            //echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
            // inicio cambio posted
            echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).' in ';

            $stmt2 = $db->prepare('SELECT catTitle, catSlug    FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
            $stmt2->execute(array(':postID' => $row['postID']));

            $catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            $links = array();
            foreach ($catRow as $cat){
                $links[] = "<a href='c-".$cat['catSlug']."'>".$cat['catTitle']."</a>";
            }
            echo implode(", ", $links);

            echo '</p>';
            //termina cambio posted on
            echo '<p>'.$row['postDesc'].'</p>';
            echo '<p><a href="'.$row['postSlug'].'">Read More</a></p>';
            echo '</div>';

        }

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    ?>
</div>


</body>
</html>


