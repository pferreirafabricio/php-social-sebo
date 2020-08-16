<?php 

namespace Source\App;
use Source\App\Controller;
use Source\Business\BookDB;

class HomeController extends Controller
{    
    /**
     * Render the home view
     *
     * @return void
     */
    public function index(): void
    {
        $books = (new BookDB)->getLastsBooks();
    
        echo $this->view('client/home', [
            'booksArray' => arrayTree($books, 3),
        ]);
    }
}