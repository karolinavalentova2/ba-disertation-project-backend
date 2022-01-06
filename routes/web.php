<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/user/{id}', 'UserController@doGetUserById');
$router->post('/user', 'UserController@doInsertUser');
$router->put('/user/{id}', 'UserController@doUpdateUserById');
$router->delete('/user/{id}', 'UserController@doDeleteUserById');

$router->get('/team/{id}', 'TeamController@doGetTeamById');
$router->get('/team', 'TeamController@doGetAllTeams');
$router->post('/team', 'TeamController@doInsertUser');
$router->put('/team/{id}', 'TeamController@doUpdateUserById');
$router->delete('/team/{id}', 'TeamController@doDeleteUserById');

$router->get('/project', 'ProjectController@doGetAllProjects');
$router->get('/project/{id}', 'ProjectController@doGetProjectById');
$router->post('/project', 'ProjectController@doInsertProject');
$router->put('/project/{id}', 'ProjectController@doUpdateProjectById');
$router->delete('/project/{id}', 'ProjectController@doDeleteProjectById');

$router->get('/task', 'ProjectTaskController@doGetAllTasks');
$router->get('/task/{id}', 'ProjectTaskController@doGetTaskById');
$router->get('/task/byBoardId/{boardId}', 'ProjectTaskController@doReturnTasksByBoardId');
$router->post('/task', 'ProjectTaskController@doInsertTask');
$router->put('/task/{id}', 'ProjectTaskController@doUpdateTaskById');
$router->delete('/task/{id}', 'ProjectTaskController@doDeleteTaskById');

$router->get('/board', 'ProjectBoardController@doGetAllBoardColumns');
$router->get('/board/byProjectId/{projectId}', 'ProjectBoardController@doGetProjectBoardsByProjectId');
$router->get('/board/{id}', 'ProjectBoardController@doGetProjectBoardColumnById');
$router->post('/board', 'ProjectBoardController@doInsertProjectBoardColumn');
$router->put('/board/{id}', 'ProjectBoardController@doUpdateBoardColumnById');
$router->delete('/board/{id}', 'ProjectBoardController@doDeleteBoardColumnById');

$router->get('/comment', 'CommentController@doGetAllComments');
$router->get('/comment/{id}', 'CommentController@doGetCommentById');
$router->get('/comment/byTaskId/{taskId}', 'CommentController@doReturnCommentsByTaskId');
$router->post('/comment', 'CommentController@doInsertComment');
$router->put('/comment/{id}', 'CommentController@doUpdateCommentById');
$router->delete('/comment/{id}', 'CommentController@doDeleteCommentById');

$router->get('/notification/{id}', 'NotificationController@doGetNotificationById');
$router->get('/notification/byUserId/{userId}', 'NotificationController@doGetNotificationsByUser');
$router->post('/notification', 'NotificationController@doInsertNotification');
$router->put('/notification/{id}', 'NotificationController@doUpdateNotification');
$router->delete('/notification/{id}', 'NotificationController@doDeleteNotificationById');
