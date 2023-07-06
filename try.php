<php?
$id = 123;
$name = "My Item";

// Generate the slug by replacing spaces with hyphens and converting the string to lowercase
$slug = strtolower(str_replace(" ", "-", $name)) . "-" . $id;

// Use the slug in the URL
$url = "/items/" . $slug;
echo $url;
?>