<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 29.01.15
 * Time: 14:44
 */

class AuthController extends HomeController {

    /*
     * Construct
     * @author Tremor
     */
    public function __construct(){

        parent::__construct();
    }


    /**
     * Регистрация нового пользователя
     * @return 
     * @author Tremor
     */ 
    public function registration(){

        if(Request::isMethod('post')){

            $post = Input::all();

            $rules = array(
                'email' 	=> 'required|email|unique:users,email',
                'company_name'	=> 'required',
                'company_address'	=> 'required',
                'phone'	=> 'required',
                'pay_id'	=> 'required',
            );

            $validator = Validator::make($post, $rules);

            if($validator->fails()){

                $this->setMessage($validator->messages()->all(), 'error');
                return Redirect::to('auth/registration')->withInput();

            }else{

                $password = $this->generatePassword();

                $user = new User;
                $user->email = Input::get('email');
                $user->company_name = Input::get('company_name');
                $user->company_address = Input::get('company_address');
                $user->phone = Input::get('phone');
                $user->pay_id = Input::get('pay_id');
                $user->password = Hash::make($password);
                $user->save();

                Auth::loginUsingId($user->id);


                $arrayData = array(
                    'email'    => $user->email,
                    'password' => $password,
                );
                $subject = "Registration";
                $this->data['content'] = View::make('emails.auth.registration')->with($arrayData)->render();
                $this->sendMail($this->data, Input::get('email'), $subject);

                return Redirect::intended('/');
                
            }

        }

        $this->data['paymentList'] = Payment::all();

        return View::make('sign_up')->with($this->data);
    }


    /**
     *
     * @return nothing
     * @author Tremor
     */
    public function login(){

        if(Request::isMethod('post')){

            $post = Input::all();

            $rules = [
                'email'     => 'required|email',
                'password'  => 'required',
            ];

            $validator = Validator::make($post, $rules);

            if($validator->fails()){

                $this->setMessage($validator->messages()->all(), 'error');

                return Redirect::to('auth/login')->withInput();

            }else{

                $email = trim(Input::get('email'));
                $password = trim(Input::get('password'));
                $remember = (Input::get('remember') == 1) ? true : false;


                if (Auth::attempt(array('email' => $email, 'password' => $password, 'is_admin' => 1))) {

                    Auth::user()->last_login = new DateTime();
                    Auth::user()->save();
                    return Redirect::to('admin');
                } elseif (Auth::attempt(array('email' => $email, 'password' => $password))) {

                    Auth::user()->last_login = new DateTime();
                    Auth::user()->save();
                    return Redirect::intended('/');
                } else {
                    $this->setMessage('failed login', 'error');
                    return Redirect::to('auth/login')->withInput();
                }
            }
        }

        $this->data['paymentList'] = Payment::all();
        return View::make('sign_up')->with($this->data);

    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function generatePassword(){

        // Символы, которые будут использоваться в пароле.
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";

        // Количество символов в пароле.
        $max = 10;

        // Определяем количество символов в $chars
        $size = StrLen($chars)-1;

        // Определяем пустую переменную, в которую и будем записывать символы.
        $password = null;

        // Создаём пароль.
        while($max--)
            $password .= $chars[rand(0, $size)];


        return $password;
    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function test(){

        $arrayData = array(
            'email'    => 'tremor.oleg@gmail.com',
            'password' => $this->generatePassword(),
        );
        $subject = "Registration";
        $this->data['content'] = View::make('emails.auth.registration')->with($arrayData)->render();
        $this->sendMail($this->data, $arrayData['email'], $subject);
    }

    /**
     * Logout
     * @return
     * @author Tremor
     */
    public function logout(){

        Session::flush();
        Auth::logout();
        return Redirect::to('/');
    }



}