<?php 

namespace Source\App;

use Source\App\Controller;
use Source\Classes\Security;
use Source\Models\Category;
use Source\Business\CategoryDB;

class CategoryController extends Controller
{    
    /**
     * Render the Category Page
     *
     * @return void
     */
    public function index(): void
    {
        echo $this->view('client/category/main');
    }

    /**
     * Render the List of categories page
     *
     * @return void
     */
    public function list(): void
    {
        echo $this->view('client/category/list');
    }

    /**
     * Render the page for creating a new category
     *
     * @return void
     */
    public function new(): void
    {
        Security::protect();
        echo $this->view('client/category/new');
    }

    /**
     * Render the page for edit a category
     *
     * @return void
     */
    public function edit(): void
    {
        Security::protect();
        echo $this->view('client/category/edit');
    }

    public function create(): void 
    {
        $filters = [
            'name' => FILTER_SANITIZE_STRING,
            'slug' => FILTER_SANITIZE_STRING,
        ];

        $data = postAll($filters);
        $data = array_map('strip_tags', $data);
        $data =  array_map('trim', $data);
        $categoryData = (object) $data;

        $category = new Category(
            null,
            $categoryData->name,
            $categoryData->slug,
        );

        $errors = $this->validate($category);

        if ($errors !== [])
            echo $this->error('Form data invalid!', $errors, 400, 'category');
        
        $categoryId = (new CategoryDB)->insert($category);

        if (!$categoryId) {
            echo $this->error('Category register failed!', [
                "Something was wrong on category registration, please try again in 5 minutes"
            ], 500);
        }
    
        redirect(BASE . 'category/edit/' . $categoryId);
    }

    /**
     * Validate all Category data
     *
     * @param  Category $category Category data to be validated
     * @return array
     */
    public function validate(Category $category, bool $validateId = false): array 
    {
        $errors = [];

        if ($validateId && $category->getId() <= 0)
            $errors[] = 'Id is invalid';

        if (strlen($category->getName()) < 2 || $category->getName() === '')
            $errors[] = 'Category name is invalid';

        if (strlen($category->getSlug()) < 2 || $category->getSlug() === '')
            $errors[] = 'Slug is invalid';

        return $errors;
    }
}