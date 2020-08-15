<?php

namespace Source\App;

use Source\App\Controller;
use Source\Business\CategoryDB;
use Source\Classes\Security;
use Source\Models\User;
use Source\Models\Category;
use Source\Classes\Session;


class BookController extends Controller
{
    /**
     * Render the page for creating a new category
     *
     * @return void
     */
    public function new(): void
    {
        Security::protect();
        echo $this->view('client/book/new', [
            'categories' => (new CategoryDB)->getAll(),
        ]);
    }

    /**
     * Render the List of categories page
     *
     * @return void
     */
    public function see(string $slug = ''): void
    {
        echo $this->view('client/book/see');
    }

    public function create(): void 
    {
        dd('Create a new book');
    }

}