<?php namespace UnitTests\Models;

use App\Models\Article;
use UnitTests\TestCase;

class ArticleTest extends TestCase
{

    public $model;

    public function __construct()
    {
        $this->model = new Article();
    }

    public function testTimestampsAreDisabled()
    {
        $this->assertFalse($this->model->usesTimestamps());
    }

    public function testFillable()
    {
        $expectedFillable = ['body'];

        $this->assertSame($expectedFillable, $this->model->getFillable());
    }

    public function testContent()
    {
        $mock = \Mockery::mock('App\Models\Article[morphOne]');
        $mock->shouldReceive('morphOne')->withArgs(['App\Models\Content', 'content_data'])->once()->andReturn(true);

        $this->assertTrue($mock->content());
    }

}
