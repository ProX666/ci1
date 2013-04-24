<h1><?php echo $title ?></h1>
<h2><?php echo $news_item['title'] ?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open('news/create') ?>

	<label for="title">Title</label>
	<input type="input" name="title" value="<?php echo $news_item['title']; ?>" /><br />

	<label for="text">Text</label>
	<textarea name="text"><?php echo $news_item['text']; ?></textarea><br />
        <input type="hidden" name="slug_old" value="<?php echo $news_item['slug']; ?>" />
	<input type="submit" name="submit" value="Create news item" />

</form>