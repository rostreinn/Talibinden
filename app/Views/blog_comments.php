<?php if (!empty($comments)): ?>
    <h3>Yorumlar:</h3>
    <ul>
        <?php foreach ($comments as $comment): ?>
            <li>
                <strong><?php echo htmlspecialchars($comment['user_id']); ?></strong>: 
                <?php echo htmlspecialchars($comment['comment']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Henüz yorum yapılmamış.</p>
<?php endif; ?>
