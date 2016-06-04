<!DOCTYPE html>
<html>
<head>
	<title>Add Post</title>
</head>
<body>
<h1>Add Post</h1>
<form method="post" action="<?php echo base_url(). 'AddPost'?>" enctype="multipart/form-data">
<p>Title:</p>
<p><input type=text name="title" size="50" value=<?php echo set_value('title')?>><?=form_error('title') ?></p>
<p>Text:</p>
<p><textarea name="text" rows="20" cols="50"></textarea><?=form_error('text') ?></p>
<p><input type="file" name="image"><?=form_error('image') ?></p>
<p><input type="submit" name="submit" value="დამატება"></p>
</form>
</body>
</html>
