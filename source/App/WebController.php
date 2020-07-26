<?php 

namespace Source\App;
use Source\App\Controller;

class WebController extends Controller
{
    public function __construct()
    {
    }
    
    /**
     * Render the home view
     *
     * @return void
     */
    public function home(): void
    {
        echo $this->view('client/home');
    }
    
    /**
     * contact
     *
     * @return void
     */
    public function contact(): void
    {
        
    }
}