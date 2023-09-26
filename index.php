<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Brand</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<?php
// Include the API functions from api.php
require_once "api.php";

// URL of the JSON data
$json_url = "https://www.thebrand.ai/i/prompt/seo-strategy?mode=categoryView";

// Call the function to fetch JSON data from the provided URL
$data = getJSONData($json_url);

// Check if there was an error while fetching or decoding the JSON data
if (isset($data["error"])) {
    echo "Error: " . $data["error"];
} else {
    // Extract category and posts data from the JSON
    $category = $data["category"];
    $posts = $data["posts"];

    // Display category name and description
    echo "<h1>" . $category["name"] . "</h1>";
    echo "<p>" . $category["description"] . "</p>";

    // Start a container for displaying posts
    echo '<div class="container">';

    // Loop through each post and display its information
    foreach ($posts as $post) {
        echo '<div class="post">';

        // Display post image if available
        if ($post['image_default']) {
            $image_base_url = "https://www.thebrand.ai/i/uploads/blog/202307/img_64afce13320925-40899747-89813831.jpg";
            echo '<img src="' . $image_base_url . '" alt="Image">';
        }

        // Display post title, keywords, creation date, category name, and category slug
        echo '<h2>' . $post['title'] . '</h2>';
        echo '<p class="keywords">Keywords: ' . $post['keywords'] . '</p>';
        echo '<p> Created At: ' . $post['created_at'] . '</p>';
        echo '<p>' . $post['category_name'] . '</p>';
        echo '<p>' . $post['category_slug'] . '</p>';

        echo '</div>'; // Close the post div
    }

    echo '</div>'; // Close the container div
}
?>
</body>
</html>