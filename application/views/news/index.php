<?php foreach ($news as $news_item): ?>

    <h2><?php echo $news_item['title'] ?></h2>
    <div id="main">
        <?php echo $news_item['text'] ?>
    </div>
    <p><a href="<?php echo $news_item['slug'] ?>">View article</a></p>
   <p><a href="edit/<?php echo $news_item['slug'] ?>">edit article</a></p>
   <p><a href="delete/<?php echo $news_item['slug'] ?>">delete article</a></p>
<?php endforeach ?>