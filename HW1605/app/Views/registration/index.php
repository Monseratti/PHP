<?= $this->extend("layouts/layout") ?>
<?= $this->section("layoutBody") ?>
<form action="registration/create" method="post">
    <input type="text" name='login'>
    <input type="password" name='pass'>
    <input type="text" name='name'>
    <input type="text" name='surname'>
    <input type="date" name='birthday'>
    <input type="text" name='country'>
    <input type="submit" value="Registration">
    <a href="login">Back</a>
</div>
<?= $this->endSection("layoutBody") ?>