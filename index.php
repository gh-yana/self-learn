<?
echo 'phpのテスト';

$dbinfo = parse_url(getenv('DATABASE_URL'));

$dsn = 'pgsql:host=' . $dbinfo['ec2-184-72-236-57.compute-1.amazonaws.com'] . ';dbname=' . substr($dbinfo['path'],1);

$pdo = new PDO($dsn, $dbinfo['sbzqiggebhgruh'], $dsinfo['5f93db4c254634fa20ce3cec96f5caebe4df96186f4c196af214049d4aa6c446']);
var_dump($pdo-->getattribute(PDO::ATTR_SERVER_VERSION));

phpinfo();
?>
