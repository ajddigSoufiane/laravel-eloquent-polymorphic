<?php namespace UnitTests\Models;

use App\Models\Event;
use UnitTests\TestCase;

class EventTest extends TestCase
{

    public $model;

    public function __construct()
    {
        $this->model = new Event();
    }

    public function testTimestampsAreDisabled()
    {
        $this->assertFalse($this->model->usesTimestamps());
    }

    public function testFillable()
    {
        $expectedFillable = ['date'];

        $this->assertSame($expectedFillable, $this->model->getFillable());
    }

    public function testContent()
    {
        $mock = \Mockery::mock('App\Models\Event[morphOne]');
        $mock->shouldReceive('morphOne')->withArgs(['App\Models\Content', 'content_data'])->once()->andReturn(true);

        $this->assertTrue($mock->content());
    }

}
