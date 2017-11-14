<?php
require('includes/config.php');

$stmt = $db->prepare('SELECT postID, postTitle, postSlug, postCont, postDate FROM blog_posts WHERE postSlug = :postSlug');
$stmt->execute(array(':postSlug' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['postID'] == ''){
    header('Location: ./');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php echo $row['postTitle'];?></title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

<div id="wrapper">

    <h1>Blog</h1>
    <hr />
    <p><a href="./">Blog Index</a></p>

<?php
    echo '<div>';
    echo '<h1>'.$row['postTitle'].'</h1>';
    echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
    echo '<p>'.$row['postCont'].'</p>';
    echo '</div>';
    ?>

    <div id="disqus_thread"></div>
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*

         var disqus_config = function () {
         this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
         this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
         };

         */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://oliver507.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>

    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>


</body>
</html>