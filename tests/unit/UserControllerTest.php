<?php

class UserControllerTest extends TestCase
{
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

    public function testInsertUser() {}
    public function testGetUserById() {}
    public function testUpdateUserById() {}
    public function testDeleteUserById() {}
    public function testGetAllUsers() {}
}
