<?php

namespace Source\App;

use Source\App\Controller;
use Source\Business\BookDB;
use Source\Business\CategoryDB;
use Source\Classes\Security;
use Source\Models\User;
use Source\Models\Category;
use Source\Classes\Session;
use Source\Models\Book;

class BookController extends Controller
{
    /**
     * Render the List of categories page
     *
     * @return void
     */
    public function index(): void
    {
        echo $this->error("Oopss! This page doesn't exist");
    }

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
    public function edit($bookId = 0): void
    {
        Security::protect();
        $bookId = $this->validateParamId($bookId);

        $book = (new BookDB)->getByBookIdAndUserId($bookId, Session::getValue('id'));

        if (!$book) 
            echo $this->error('This book was not found!', [], 422, 'category');

        echo $this->view('client/book/edit', [
            'book' => $book,
            'categories' => (new CategoryDB)->getAll(),
        ]);
    }

    /**
     * Render the List of categories page
     *
     * @return void
     */
    public function see($slug = ''): void
    {
        $slug = filter_var($slug[0], FILTER_SANITIZE_STRING);

        dd($slug);
        echo $this->view('client/book/see');
    }

    public function create(): void
    {
        $filters = [
            'title' => FILTER_SANITIZE_STRING,
            'slug' => FILTER_SANITIZE_STRING,
            'price' => FILTER_SANITIZE_STRING,
            'synopsis' => FILTER_SANITIZE_SPECIAL_CHARS,
            'status' => FILTER_SANITIZE_STRING,
            'category' => FILTER_SANITIZE_NUMBER_INT,
            'user' => FILTER_SANITIZE_NUMBER_INT,
        ];

        $data = postAll($filters);
        $data =  array_map('trim', $data);
        $bookData = (object) $data;

        $book = new Book(
            null,
            $bookData->title,
            $bookData->slug,
            $bookData->price,
            '',
            $bookData->synopsis,
            getCurrentDate(),
            $bookData->status,
            new Category(
                $bookData->category,
            ),
            new User(
                Session::getValue('id'),
            )
        );

        $errors = $this->validate($book);

        if ($errors !== [])
            echo $this->error('Form data invalid!', $errors, 400, 'category');

        $bookId = (new BookDB)->insert($book);

        if (!$bookId) {
            echo $this->error('Book register failed!', [
                "Something was wrong on book registration, please try again in 5 minutes"
            ], 500);
        }

        redirect(BASE . 'book/edit/' . $bookId);
    }

    public function update($bookId = 0): void
    {
        $bookId = $this->validateParamId($bookId);

        $filters = [
            'title' => FILTER_SANITIZE_STRING,
            'slug' => FILTER_SANITIZE_STRING,
            'price' => FILTER_SANITIZE_STRING,
            'synopsis' => FILTER_SANITIZE_SPECIAL_CHARS,
            'status' => FILTER_SANITIZE_STRING,
            'category' => FILTER_SANITIZE_NUMBER_INT,
        ];

        $data = postAll($filters);
        $data =  array_map('trim', $data);
        $bookData = (object) $data;

        $book = new Book(
            $bookId,
            $bookData->title,
            $bookData->slug,
            $bookData->price,
            null,
            $bookData->synopsis,
            null,
            $bookData->status,
            new Category(
                $bookData->category,
            ),
            new User(
                Session::getValue('id'),
            )
        );

        $errors = $this->validate($book, true);

        if ($errors !== [])
            echo $this->error('Form data invalid!', $errors, 400, 'category');

        $updatedSuccessfully = (new BookDB)->update($book);

        if (!$updatedSuccessfully) {
            echo $this->error('Book update failed!', [
                "Something was wrong on book update, please try again in 5 minutes"
            ], 500);
        }

        redirect(BASE . 'book/edit/' . $bookId);
    } 

    public function validate(Book $book, bool $validateId = false): array
    {
        $errors = [];

        if ($validateId && $book->getId() <= 0)
            $errors[] = 'Id is invalid';

        if (strlen($book->getTitle()) < 2 || $book->getTitle() === '')
            $errors[] = 'Book name is invalid';

        if (strlen($book->getSlug()) < 2 || $book->getSlug() === '')
            $errors[] = 'Slug is invalid';

        if (strlen($book->getPrice()) < 1)
            $errors[] = 'Price invalid';

        if ($book->getCategory()->getId() <= 0 || $book->getCategory()->getId() == null)
            $errors[] = 'Invalid category';

        if ($book->getStatus() < 1 || $book->getStatus() > 2)
            $errors[] = 'Invalid status';

        if ($book->getUser()->getId() <= 0 || $book->getUser()->getId() == null)
            $errors[] = 'Invalid user';

        return $errors;
    }

    public function validateParamId($bookId): int
    {
        if ($bookId === []) 
            echo $this->error('Book id invalid!', [], 400, 'category');

        $bookId = filter_var($bookId[0], FILTER_SANITIZE_NUMBER_INT);

        if ($bookId <= 0) 
            echo $this->error('Book id invalid!', [], 400, 'category');

        return $bookId;
    }
}
