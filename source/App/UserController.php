<?php 

namespace Source\App;

use Source\App\Controller;
use Source\Models\User;

class UserController extends Controller
{
    public function create(): void
    {
        $filters = [
            'name' => FILTER_SANITIZE_STRING,
            'email' => FILTER_SANITIZE_EMAIL,
            'password' => FILTER_SANITIZE_STRING,
            'confirmPassword' => FILTER_SANITIZE_STRING,
        ];
        
        $data = postAll($filters);
        $data = array_map('strip_tags', $data);
        $data =  array_map('trim', $data);
        $userData = (object) $data;

        $user = new User(
                get('id', FILTER_SANITIZE_NUMBER_INT),
                $userData->name,
                $userData->email,
                $userData->password,
                1,
                null);

        $errors = $this->validate($user);

        if ($errors === []) {
            $user->setPassword(passwordHash($user->getPassword()));
            dd($user);
            //$user->insert($user);
            dd('Can insert');
        } else {
            echo $this->error('Form data invalid!', $errors, 400);
            dd("Can't insert");
        }
    }
    
    /**
     * Validate all User data
     *
     * @param  User $data User data to be validated
     * @return array
     */
    public function validate(User $user): array
    {
        $emailRegex = '/^([a-zA-Z0-9\.\+\-\_]{5,60})\@([a-zA-Z0-9\.\+\-\_]{2,10})\.([a-zA-Z0-9]{2,10}).+$/';
        $passwordRegex = '/([a-zA-Z0-9]){2,60}/';
        $nameRegex = '/([a-zA-Z]){2,60}/';
        $errors = [];

        if (!preg_match($nameRegex, $user->getName()))
            $errors[] = 'Name is invalid';

        if (!preg_match($emailRegex, $user->getEmail()))
            $errors[] = 'Email is invalid';

        if (!preg_match($passwordRegex, $user->getPassword()))
            $errors[] = 'Password is invalid';

        // if ($user->password !== $user->confirmPassword)
        //     $errors[] = 'Password must be equals is invalid';
            
        return $errors;
    }
}