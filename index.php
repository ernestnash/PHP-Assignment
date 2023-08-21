<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Brand</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<?php
require_once "api.php";

$json_url = "https://www.thebrand.ai/i/prompt/seo-strategy?mode=categoryView";
$data = getJSONData($json_url);

if (isset($data["error"])) {
    echo "Error: " . $data["error"];
} else {
    $category = $data["category"];
    $posts = $data["posts"];

    echo "<h1>" . $category["name"] . "</h1>";
    echo "<p>" . $category["description"] . "</p>";

    echo '<div class="container">';

    foreach ($posts as $post) {

        echo '<div class="post">';

        if ($post['image_default']) {
            $image_base_url = "https://www.thebrand.ai/i/uploads/blog/202307/img_64afce13320925-40899747-89813831.jpg";
            echo '<img src="' . $image_base_url . '" alt="Image">';
        }

        echo '<h2>' . $post['title'] . '</h2>';
        echo '<p class="keywords">Keywords: ' . $post['keywords'] . '</p>';
        echo '<p> Created At: ' . $post['created_at'] . '</p>';
        echo '<p>' . $post['category_name'] . '</p>';
        echo '<p>' . $post['category_slug'] . '</p>';

        echo '</div>';

    }

    echo '</div>';
}
?>
</body>
</html>