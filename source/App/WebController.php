<?php 

namespace Source\App;

class WebController 
{
    public function __construct()
    {
        $this->home();
    }
    
    /**
     * home
     *
     * @return void
     */
    public function home(): void
    {
        echo 'Home from web controller';
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