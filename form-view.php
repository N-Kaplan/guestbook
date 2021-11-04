<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guestbook</title>    
</head>
<body>
    <form action="" method="POST">
        <?php if (isset($error) && !empty($error)){echo "<div>" . $error . "</div>";} ?>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title">
        <label for="message">Message:</label>
        <input type="text" name="message" id="message">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <label for="display_nr">Number of posts to display:</label>
        <input type="number" name="display_nr" id="display_nr" min="1" max="100" value="20">
        <button type="submit">Submit</button>
    </form>

</body>
</html>