<?php
    namespace Dragoblued\Task2;
    use PHPUnit\Framework\TestCase;
    use Dragoblued\Task2\Comment;

    class TestComment extends TestCase {
        public function testGetRequest() {
            $comment = new Comment();
            $comments = json_decode($comment->getRequest());
            $this->assertSame( is_array([]), is_array($comments) );
        }

        public function testPostRequest() {
            $name = 'name';
            $text = 'text';
            $comment = new Comment();
            $result = json_decode($comment->postRequest($text, $name));
            $this->assertSame( $result->comment->text, $text );
            $this->assertSame( $result->comment->name, $name )
        }

        public function testPutRequest() {
            $name = 'change_name';
            $text = 'change_text';
            $id = 1;
            $comment = new Comment();
            $result = json_decode($comment->putRequest($text, $name, $id));
            $this->assertSame( $result->comment->text, $text );
            $this->assertSame( $result->comment->name, $name );
            $this->assertSame( $result->comment->id, $id );
        }
    }
?>