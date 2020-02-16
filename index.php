<?php
// 文字コード設定
header('Content-Type: text/html; charset=UTF-8');

// numが存在するかつnumが数字のみで構成されているか
if(isset($_GET["num"]) && !preg_match('/[^0-9]/', $_GET["num"])) {
    // numをエスケープ(xss対策)
    $param = htmlspecialchars($_GET["num"]);
    // メイン処理
    $arr["status"] = "yes";
    $arr["user_msg"] = "WebAPIからのメッセージ（テスト）";
    $arr["input_data"] = (string)((int)$param);
} else {
    // paramの値が不適ならstatusをnoにしてプログラム終了
    $arr["status"] = "no";
}

// 配列をjson形式にデコードして出力, 第二引数は、整形するための定数
print json_encode($arr, JSON_PRETTY_PRINT);
?>
