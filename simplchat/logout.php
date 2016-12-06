
<?php
session_start();
session_destroy();
if (isset($_GET['chat'])) {
	header('Location: chat.php');
} else {
header('Location: index.php');
}
?>