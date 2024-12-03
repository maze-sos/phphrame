<?php $this->view('includes/header', $data); ?>

<div class="centered">
    <h1>Login</h1>
    <?php if (message()): ?>
        <div class="alert"><?= message('', true) ?></div>
    <?php endif ?>
    <form method="post" class="form">
        <label for="email">Email</label>
        <input type="email" id="email" value="<?= old_value('email') ?>" name="email" placeholder="Email">
        <div class="error"><?= $user->getError('email') ?></div>
        
        <label for="password">Password</label>
        <input type="password" id="password" value="<?= old_value('password') ?>" name="password" placeholder="Password">
        <div class="error"><?= $user->getError('password') ?></div>
        
        <button type="submit" class="button">Login</button>
    </form>
</div>

<?php $this->view('includes/footer', $data); ?>
