<?= $this->extend("layouts/layout") ?>
<?= $this->section("layoutBody") ?>
<form action="login/login" method="post">
    <input type="text" name='login'>
    <input type="password" name='pass'>
    <input type="submit" value="Log in">
    <a href="registration">Registration</a>
</div>
<?= $this->endSection("layoutBody") ?>