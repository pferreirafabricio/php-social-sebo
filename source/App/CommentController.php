<?php 

namespace Source\App;
use Source\App\Controller;
use Source\Business\CommentDB;
use Source\Classes\Session;

class CommentController extends Controller
{    
    public function insert()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $userId = Session::getValue('id');
        $bookId = $data['bookId'];
        $comment = $data['comment'];

        if (!$this->validate($bookId, $userId, $comment))
            return responseJson([
                'code' => 2,
                'message' => 'Invalid fields!'
            ]);
        

        if (!(new CommentDB)->insert($bookId, $userId, $comment))
            return responseJson([
                'code' => 2,
                'message' => 'Something was wrong on register the comment!'
            ]);

        return responseJson([
            'code' => 1,
            'message' => 'Comment successfully registered!'
        ]);
    }

    public function getBookComments($bookId = 0)
    {
        $bookId = $this->validateParamId($bookId);
        $comments = (new CommentDB)->getAllCommentsByBookId($bookId);
        return responseJson($comments);
    }

    private function validate(int $bookId, $userId, string $comment): bool
    {
       if ($bookId <= 0) 
            return false;

        if ($userId <= 0) 
            return false;

        if (strlen($comment) < 10 || strlen($comment) > 500) 
            return false;

        return true;
    }
    
    private function validateParamId($bookId): int
    {
        if ($bookId === []) 
            echo $this->error('Book id invalid!', [], 400, 'dashboard');

        $bookId = filter_var($bookId[0], FILTER_SANITIZE_NUMBER_INT);

        if ($bookId <= 0) 
            echo $this->error('Book id invalid!', [], 400, 'dashboard');

        return $bookId;
    }
}