<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>重置密码链接</title>
</head>
<body>


<p>
    请点击下面的链接重置密码：
    <a href="{{ route('reset_email', $user->token) }}">
        {{ route('reset_email', $user->token) }}
    </a>
</p>

<p>
    如果这不是您本人的操作，请忽略此邮件。
</p>
</body>
</html>