
<?php

// 模拟用户数据，实际应用中这些数据可能来自数据库或其他来源
$users = array(
    array(
     'id' => 1,
     'username' => 'Mengxin_萌新',
     'email' => '54188@163.com'
      )
);

// 获取请求中的用户ID参数
$userId = isset($_GET['id']) ? $_GET['id'] : null;

// 检查用户ID是否存在，如果存在则返回对应的用户信息
if ($userId) {
    $user = null;
    foreach ($users as $u) {
        if ($u['id'] == $userId) {
            $user = $u;
            break;
        }
    }

    if (!$user) {
        http_response_code(404); // 如果未找到用户，返回 404 状态码
        echo json_encode(array('error' => 'User not found'));
    } else {
        $json_user_jx = json_encode($user);
        $user_cg = json_decode($json_user_jx);
        echo $user_cg ; // 返回用户信息
    }

} else {
    http_response_code(400); // 如果请求参数不正确，返回 400 状态码
    echo json_encode(array('error' => 'Invalid request'));
}