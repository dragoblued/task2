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
            $comment = new Comment();
            $comment = json_decode($comment->postRequest($name, $text));
            $this->assertSame( $comment2->comment->text, $text );
            $this->assertSame( $comment2->comment->name, $name );
        }

        public function testPutRequest() {
            $comment = new Comment();
            $comments = json_decode($comment->putRequest($name, $text, $id));
            $this->assertSame( $comment2->comment->text, $text );
            $this->assertSame( $comment2->comment->name, $name );
            $this->assertSame( $comment2->comment->id, $id );
        }

        public function providerPostRequest ()
        {
            return array (
                array (2, 2),
                array (2, 3),
            );
        }

        public function providerPutRequest ()
        {
            return array (
                array ("name", "text", 1),
                array ("name2", "text2", 2),
            );
        }
    }
?>