<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC管理画面</title>
    <link rel="stylesheet" type="text/css" href="pc-list.css">
</head>
<body>
    <h1>PC管理画面</h1>
    <button onclick="location.href='add.php'">新規登録</button>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>PCID</th>
                <th>モデル</th>
                <th>OS</th>
                <th>CPU</th>
                <th>メモリ</th>
                <th>名前</th>
                <th>保管場所</th>
                <th>メモ</th>
                <th>編集</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // データベース接続
            $pdo = new PDO('mysql:host=localhost;dbname=pc_management;charset=utf8', 'root', '');
            $stmt = $pdo->query('SELECT * FROM pcs');
            foreach ($stmt as $row) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                echo '<td>' . htmlspecialchars($row['pcid']) . '</td>';
                echo '<td>' . htmlspecialchars($row['model']) . '</td>';
                echo '<td>' . htmlspecialchars($row['os']) . '</td>';
                echo '<td>' . htmlspecialchars($row['cpu']) . '</td>';
                echo '<td>' . htmlspecialchars($row['memory']) . '</td>';
                echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['storagerocation']) . '</td>';
                echo '<td>' . htmlspecialchars($row['memo']) . '</td>';
                echo '<td><a href="edit.php?id=' . htmlspecialchars($row['id']) . '">編集</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
  <!-- 削除ボタンをテーブルの外に配置 -->
  <form method="POST" action="delete.php" id="deleteForm">
        <label for="deleteId">削除するPCのID:</label>
        <input type="text" name="id" id="deleteId" required>
        <input type="submit" value="削除">
    </form>

    <!-- 削除ボタンをクリックしたときに、削除する行のIDを設定 -->
    <script>
        function setDeleteId(id) {
            document.getElementById('deleteId').value = id;
        }
    </script>  
</body>
</html>