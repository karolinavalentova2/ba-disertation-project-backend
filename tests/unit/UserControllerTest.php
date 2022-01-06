<?php
namespace Tests\Feature;
use Laravel\Lumen\Application;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;

class UserControllerTest extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication(): Application
    {
        return require __DIR__ . '/../../bootstrap/app.php';
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

    public function testInsertUser() {
        $testUser = [
            'email' => 'test@test.com',
            'password' => '$2y$10$GGOJxC3AMt7NWET/3YLpRu/q6.6d66YEcX45NgELIAOyBOIiaHeYW',
            'verificationCode' => '123456',
            'imagePath' => './assets/default-profile.png',
            'active' => 1,
            'name' => 'Test'
        ];

        $res = $this->post('/user', $testUser);
        $res = json_decode($this->response->getContent());
        $res = $res[0];
        $this->assertEquals(
            $testUser["email"], $res->email,
        );
        $this->assertEquals(
            $testUser["imagePath"], $res->imagePath,
        );
        $this->assertEquals(
            $testUser["active"], $res->active,
        );
        $this->assertEquals(
            $testUser["name"], $res->name,
        );
    }
    public function testGetUserById() {}
    public function testUpdateUserById() {}
    public function testDeleteUserById() {}
}
