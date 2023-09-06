<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31.08.2023
 * Time: 15:36
 */
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class ProjectTest extends TestCase
{
    private $project_domain = "http://turbowebtesttask2";

    public function testMainPage()
    {
        $client = new Client();
        $response = $client->get($this->project_domain);
        $statusCode = $response->getStatusCode();

        $this->assertEquals(200, $statusCode);
    }

    public function testMakeCommand()
    {
        $content = $this->makeDogCommandRequest("/dogs.php?dogs_count=5&command=mops sound");

        $this->assertStringContainsString('woof! woof!', $content);
        $this->assertStringContainsString('Пііп!! Піі!!', $content);
        $this->assertStringContainsString('Cобака "Плюшевий лабрадор" не може робити звуки.', $content);
    }

    public function testMakeMissingCommand()
    {
        $content = $this->makeDogCommandRequest("/dogs.php?dogs_count=5&command=test");

        $this->assertStringNotContainsString('woof! woof!', $content);
    }

    public function testMakeCommand3()
    {
        $content = $this->makeDogCommandRequest("/dogs.php?dogs_count=5&command=hunt");

        $this->assertStringContainsString('Cобака "Плюшевий лабрадор" не може полювати.', $content);
        $this->assertStringContainsString('Cобака "Cіба-іну" пішла на полювання.', $content);
        $this->assertStringNotContainsString('Cобака "Гумова такса з пищалкою" пішла на полювання.', $content);
    }

    public function testMakeCommandWithWrongParameters()
    {
        $content = $this->makeDogCommandRequest("/dogs.php?dogs_count=5&command2=hunt");
        $this->assertStringNotContainsString('Cобака "Плюшевий лабрадор" не може полювати.', $content);

        $content = $this->makeDogCommandRequest("/dogs.php?dogs_countt=5&command=hunt");
        $this->assertStringNotContainsString('Cобака "Плюшевий лабрадор" не може полювати.', $content);
    }

    public function testMakeCommandWithMore5and0Dogs()
    {
        $content = $this->makeDogCommandRequest("/dogs.php?dogs_count=15&command=hunt");

        $this->assertStringContainsString('Cобака "Плюшевий лабрадор" не може полювати.', $content);
        $this->assertStringContainsString('Cобака "Cіба-іну" пішла на полювання.', $content);
        $this->assertStringNotContainsString('Cобака "Гумова такса з пищалкою" пішла на полювання.', $content);

        $content = $this->makeDogCommandRequest("/dogs.php?dogs_count=0&command=hunt");
        $this->assertStringNotContainsString('Cобака "Плюшевий лабрадор" не може полювати.', $content);
        $this->assertStringNotContainsString('Cобака "Cіба-іну" пішла на полювання.', $content);
    }

    private function makeDogCommandRequest($data)
    {
        $client = new Client();

        $response = $client->get($this->project_domain . $data);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody()->getContents();

        $this->assertEquals(200, $statusCode);

        return $content;
    }
}