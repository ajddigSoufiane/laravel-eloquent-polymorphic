<?php namespace UnitTests\Models;

use App\Models\Article;
use App\Models\Content;
use UnitTests\TestCase;

class ContentTest extends TestCase
{

    public $model;

    public function __construct()
    {
        $this->model = new Content();
    }

    public function testTimestampsAreDisabled()
    {
        $this->assertFalse($this->model->usesTimestamps());
    }

    public function testFillable()
    {
        $expectedFillable = ['title'];

        $this->assertSame($expectedFillable, $this->model->getFillable());
    }

    /**
     * Unit test for the relation.
     */
    public function testContentData()
    {
        $mock = \Mockery::mock('App\Models\Content[morphTo]');
        $mock->shouldReceive('morphTo')->with('content_data')->once()->andReturn(true);

        $this->assertTrue($mock->contentData());
    }

    /**
     * Integration test
     */
    public function testPolymorphicRelation()
    {
        $articleData = [
            'body' => 'Article content goes here',
        ];
        $article = Article::create($articleData);

        $content = new Content();
        $content->title = 'Test article';

        $content->contentData()->associate($article);
        $content->save();

        $loadedContent = Content::all()->first();
        $loadedArticle = $loadedContent->contentData;

        $this->assertEquals($content->title, $loadedContent->title);
        $this->assertEquals($articleData['body'], $loadedArticle->body);
    }

}
