<?php $this->view('includes/header', $data); ?>

<div class="dashboard">
    <section class="welcome">
        <h1>Welcome back, <?= $data['username'] ?? 'User' ?>!</h1>
        <p>Here’s an overview of your recent activity and quick actions to get started.</p>
    </section>

    <section class="stats">
        <div class="stat">
            <h3>Projects</h3>
            <p>12 Active</p>
        </div>
        <div class="stat">
            <h3>Tasks</h3>
            <p>23 Open</p>
        </div>
        <div class="stat">
            <h3>Messages</h3>
            <p>5 New</p>
        </div>
    </section>

    <section class="quick-actions">
        <h2>Quick Actions</h2>
        <div class="action-cards">
            <a href="#" class="action-card">
                <h3>Create New Project</h3>
                <p>Start a new project and organize your tasks.</p>
            </a>
            <a href="#" class="action-card">
                <h3>View Messages</h3>
                <p>Check your inbox for new notifications.</p>
            </a>
            <a href="#" class="action-card">
                <h3>Manage Tasks</h3>
                <p>Stay on top of your to-do list and upcoming deadlines.</p>
            </a>
        </div>
    </section>

    <section class="recent-activity">
        <h2>Recent Activity</h2>
        <ul class="activity-feed">
            <li><strong>Project Update:</strong> Project Alpha - completed initial setup.</li>
            <li><strong>New Task:</strong> "Client feedback review" added to Project Beta.</li>
            <li><strong>Message:</strong> Reply from John Doe regarding meeting schedule.</li>
        </ul>
    </section>
</div>

<?php $this->view('includes/footer', $data); ?>
