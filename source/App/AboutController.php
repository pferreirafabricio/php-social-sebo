<?php 

namespace Source\App;
use Source\App\Controller;

class AboutController extends Controller
{    
    /**
     * Render the About Us Page
     *
     * @return void
     */
    public function index(): void
    {
        echo $this->view('client/about');
    }
}