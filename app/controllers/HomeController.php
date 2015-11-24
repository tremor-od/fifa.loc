<?php

class HomeController extends BaseController {

    /*
    * Construct
    * @author Tremor
    */
    public function __construct(){

        $this->data['messages'] = View::make('block.messages')->with('messages', $this->getMessage())->render();

    }

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index(){

        $this->data['packList'] = Pack::all();
        return View::make('cards')->with($this->data);
	}

    public function openedPack($packId){

        $this->data['pack'] = Pack::find($packId);
        $this->data['packCardType'] = $this->data['pack']->more()->where('percent', '>', 0)->get();

        return View::make('opened_pack')->with($this->data);
    }



    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function contact(){

        if(Request::isMethod('post')) {

            // send mail

            $arrayData = [
                'name' => Input::get('name'),
                'email' => Input::get('email'),
                'subject' => Input::get('subject', 'Ticket'),
                'text' => Input::get('text'),
            ];


            $this->data['content'] = View::make('emails.contact_us')->with($arrayData)->render();
//            $this->sendMail($this->data, Config::get('app.adminMail'), $subject);

            $headers = 'Content-type: text/html; charset=utf8';
            $to  = Config::get('app.adminMail');
            $subject = $arrayData['subject'];


            mail($to, $subject, $this->data['content'], $headers);

        }

        return View::make('contact')->with($this->data);
    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function faq(){

        $this->data['faqList'] = Faq::where('active', 1)->get();
        return View::make('faq')->with($this->data);
    }



    /**
     * Set a message
     * @param $message - string
     * @param $type - string [error or success]
     * @return view in session
     * @author Tremor
     **/
    public function setMessage($message, $type){

        if(is_array($message)){

            foreach ($message as $mess) {
                $this->system_messages[$type][] = $mess;
            }

        }else{
            $this->system_messages[$type][] = $message;
        }

        Session::flash('system.messages', $this->system_messages);
    }

    /**
     * Get the messages
     * @return array of messages
     * @author Tremor
     **/
    public function getMessage(){

        return Session::get('system.messages', false);

    }

    /**
     * Send mail
     * @param $text  array (Шаблон сообщения)
     * @param $to  string (Почта кому отсылаем письмо)
     * @param $subject  string (Почта кому отсылаем письмо)
     * @param $attach  array (Прикрипленные файлы)
     * @return nothing
     * @author Tremor
     **/
    public function sendMail($text = array('content' => ''), $to, $subject, $attach = array()){

        Mail::send('emails.layout', $text, function($message) use ($to, $subject, $attach) {

            $message->from('tremor.oleg@gmail.com', 'Ninja');

            $message->to($to)->subject($subject);;

            if(!empty($attach)){

                if(is_array($attach)){

                    foreach($attach as $pathToFile){
                        $message->attach($pathToFile);
                    }

                }else{
                    $message->attach($attach);
                }

            }

        });
    }


    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function check(){

        if(!Auth::check()){

            $this->setMessage('Log in or register to open this page', 'error');
            return Redirect::to('auth/login')->send();
        }

    }

}
