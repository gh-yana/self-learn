<?
echo 'phpのテスト';

$dbinfo = parse_url(getenv('DATABASE_URL'));

$dsn = 'pgsql:host=' . $dbinfo['host'] . ';dbname=' . substr($dbinfo['path'],1);

$pdo = new PDO($dsn, $dbinfo['user'], $dsinfo['pass']);
var_dump($pdo-->getattribute(PDO::ATTR_SERVER_VERSION));

phpinfo();
?>
