<?php 

namespace Source\App;
use Source\App\Controller;

class HomeController extends Controller
{    
    /**
     * Render the home view
     *
     * @return void
     */
    public function index(): void
    {
        echo $this->view('client/home');
    }
}