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
        $categories = (new CategoryDB)->getAll();
        echo $this->view('client/category/list', [
            'categories' => $categories,
        ]);
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
    public function edit($id): void
    {
        Security::protect();
        $id = $this->validateParamId($id);

        $category = (new CategoryDB)->getById($id);

        if (!$category) 
            echo $this->error('Category not exists!', [], 400, 'category');

        echo $this->view('client/category/edit', [
            'category' => $category,
        ]);
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

    public function update($id): void 
    {
        $id = $this->validateParamId($id);

        $filters = [
            'name' => FILTER_SANITIZE_STRING,
            'slug' => FILTER_SANITIZE_STRING,
        ];

        $data = postAll($filters);
        $data = array_map('strip_tags', $data);
        $data =  array_map('trim', $data);
        $categoryData = (object) $data;

        $category = new Category(
            $id,
            $categoryData->name,
            $categoryData->slug,
        );

        $errors = $this->validate($category, true);

        if ($errors !== [])
            echo $this->error('Form data invalid!', $errors, 400, 'category');
        
        $updatedCategory = (new CategoryDB)->update($category);

        if (!$updatedCategory) {
            echo $this->error('Category update failed!', [
                "Something was wrong on category update, please try again in 5 minutes"
            ], 500);
        }
    
        redirect(BASE . 'category/list');
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

    public function validateParamId($id): int
    {
        if ($id === []) 
            echo $this->error('Category id invalid!', [], 400, 'category');

        $id = filter_var($id[0], FILTER_SANITIZE_NUMBER_INT);

        if ($id <= 0) 
            echo $this->error('Category id invalid!', [], 400, 'category');

        return $id;
    }
}