<?php 

namespace Source\App;

use Source\App\Controller;

class AboutController extends Controller
{    
    /**
     * Render the Category Page
     *
     * @return void
     */
    public function index(): void
    {
        echo $this->view('client/category');
    }
}