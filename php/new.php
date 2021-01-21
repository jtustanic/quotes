<?php
include("../tmpl/header.html");
include("pdo.php");
?>

<div class="forNew">
    <form method="post" action="actions.php?action=new">
        Author: <input type="text" name="autor"><br>
        Quote: <br>
        <textarea name="quote" rows="10"></textarea>
        <input type="submit" name="Submit" value="Submit" class="button">
    </form>
</div>
<?php
include("../tmpl/footer.html");
?>