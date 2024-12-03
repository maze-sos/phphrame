<?php $this->view('includes/header', $data); ?>

<div class="centered">
    <h1>Signup</h1>
    <form method="post" class="form">
        <label for="username">Username</label>
        <input type="text" id="username" value="<?= old_value('username') ?>" name="username" placeholder="Username">
        <div class="error"><?= $user->getError('username') ?></div>
        
        <label for="email">Email</label>
        <input type="email" id="email" value="<?= old_value('email') ?>" name="email" placeholder="Email">
        <div class="error"><?= $user->getError('email') ?></div>
        
        <label for="password">Password</label>
        <input type="password" id="password" value="<?= old_value('password') ?>" name="password" placeholder="Password">
        <div class="error"><?= $user->getError('password') ?></div>
        
        <button type="submit" class="button">Signup</button>
    </form>
</div>

<?php $this->view('includes/footer', $data); ?>
