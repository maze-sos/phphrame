<?php $this->view('includes/header', $data); ?>

<div class="home">
    <section class="hero">
        <h1>Welcome to PHPhrame</h1>
        <p>Build robust, maintainable web applications with PHPhrame – a simple and flexible PHP MVC framework.</p>
        <div class="cta-buttons">
            <a href="<?=ROOT?>/signup" class="button">Get Started</a>
            <a href="<?=ROOT?>/login" class="button">Login</a>
        </div>
    </section>

    <section class="features">
        <h2>Why Choose PHPhrame?</h2>
        <div class="features-grid">
            <div class="feature">
                <h3>Simple & Intuitive</h3>
                <p>PHPhrame’s lightweight MVC structure makes web development easy and straightforward.</p>
            </div>
            <div class="feature">
                <h3>Customizable</h3>
                <p>Adapt PHPhrame to your project’s needs with flexible configurations and clear conventions.</p>
            </div>
            <div class="feature">
                <h3>Scalable</h3>
                <p>Build applications that grow with your users, from small projects to large-scale solutions.</p>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <h2>What Developers Are Saying</h2>
        <blockquote>
            <p>“PHPhrame has streamlined our development process, letting us focus on what matters. A game-changer!”</p>
            <footer>– Developer at Web Solutions</footer>
        </blockquote>
    </section>
</div>

<?php $this->view('includes/footer', $data); ?>
