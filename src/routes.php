<?php
// Routes

$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => 'test_slimfw',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8'
]);

$app->post('/', function ($request, $response, $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    //return $this->renderer->render($response, 'index.phtml', $args);

    return json_encode($GLOBALS['database']->select("chiens","*"));
});

$app->get('/chien/[{id:[0-9]+}]', function ($request, $response, $args) {

    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    //return $this->renderer->render($response, 'index.phtml', $args);

    return json_encode($GLOBALS['database']->select("chiens", ["id_chien", "nom_chien"], ["id_chien" => $args]));
});
