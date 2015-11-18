<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Blog</title>
</head>

<body>
  <h2>This is my blog</h2>


    <?php

    if($query)
    {
      foreach($query as $post){
         echo $post->entry_name;
         //echo $post->entry_date;
          echo $post->entry_body;
      }
    }
?>


</body>
</html>
