<?php
require_once(__DIR__ . "/../model/config.php");
?>
<h1>login</h1>
<form method="post" action="<?php echo $path . "controller/login-user.php";?>">
    <div>
        <label for="username">username: </label>
        <input type="text" name="username" />
    </div>
    <div>
        <label for="password">password: </label>
        <input type="password" name="password" />
    </div>
    <div>
        <button type="submit">submit</button>
    </div>
</form>