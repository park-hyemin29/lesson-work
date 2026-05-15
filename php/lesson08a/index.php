<?php
$name = trim($_POST['name'] ?? '');
$comment = trim($_POST['comment'] ?? '');
$email = trim($_POST['email'] ?? '');
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($name === '') {
        $errors[] = '名前を入力してください。';
    }

    if ($comment === '') {
        $errors[] = 'コメントを入力してください。';
    }

    if ($email === '') {
        $errors[] = 'emailを入力してください。';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHPフォーム受け取り</title>
</head>
<body>
    <h1>PHPフォーム受け取り</h1>

    <?php if ($errors !== []): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $errors === []): ?>
        <p>受け取りました。</p>
        <p>名前: <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>コメント: <?php echo nl2br(htmlspecialchars($comment, ENT_QUOTES, 'UTF-8')); ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <div>
            <label for="name">名前</label>
            <input id="name" type="text" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">
        </div>

        <div>
            <label for="comment">コメント</label>
            <textarea id="comment" name="comment"><?php echo htmlspecialchars($comment, ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>

        <div>
            <label for="email">email</label>
            <input id="email" type="email" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
        </div>

        <button type="submit">送信する</button>
    </form>
</body>
</html>
