<html>
<head>
<meta charset="iso-8851-1"/>
</head>

<body>
<?php

setlocale(LC_TIME,"portuguese");
$data_completa = strftime("Hoje é %A, %d de %B de %Y nª são", mktime(0,0,0,10,21,2014));
echo $data_completa;


?>

</body>
</html>