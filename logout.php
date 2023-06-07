<?php

session_start();

unset ($_SESSION['emailSession']);
unset ($_SESSION['senhaSession']);
session_destroy();

header("Location: BRS-HOME.php");

?>