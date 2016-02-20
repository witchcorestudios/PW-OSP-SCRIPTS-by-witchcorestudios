<?php
// configuration
$url = 'http://banlist.dark-age.net';
$file = '/darkage/pw/Banlist/banlist.txt';

// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
    file_put_contents($file, $_POST['text']);

    // redirect to form again
    header(sprintf('Location: %s', $url));
    printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    exit();
}

// read the textfile
$text = file_get_contents($file);

?>
<!-- HTML form -->
<head>
</head>
<center>
<body>
<form action="" method="post">

	<br>

<br>
	<br>
<textarea name="text" rows="20" cols="140"><?php echo htmlspecialchars($text) ?></textarea><br/><br/>
<input type="submit" value="Update" />
	<br/>
<link rel="stylesheet" type="text/css" href="astyle.css">
</center>
</body>
</form>
</center>