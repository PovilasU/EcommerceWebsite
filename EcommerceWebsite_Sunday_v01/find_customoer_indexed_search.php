<html>
<head>
<title> <find Csustomer demo</title>
</head>
<body>
<form action="find_customer_indexed_search.php" method="get">
Customer name: <input type="text" name="name" required>
<input type="submit">
</form>
</body>
</html>

//Extrack the data that was sent to the server
<?php
$search_string = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);

//Create a PHP array with out seach criteria
$findCriteria = [
'$text'=>[]
]
?>

