<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 21.08.15
 * Time: 14:02
 */

class CabinetController extends HomeController {

    /*
* Construct
* @author Tremor
*/
    public function __construct(){

        parent::__construct();

        $this->check();

        $this->data['user'] = User::find(Auth::id());
    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function index(){

        $this->data['user'] = User::find(Auth::id());
        $this->data['orderList'] = PackStatistic::where('user_id', $this->data['user']->id)->orderBy('created_at', 'desc')->get();

        return View::make('my_account')->with($this->data);
    }

    /**
     *
     * @return nothing
     * @author Tremor
     */
    public function editUser(){

        if(Request::isMethod('post')){

            $post = Input::all();

            $rules = [
                'login'           => 'required|alpha_num',
                'nickname'        => 'required',

                'email'           => 'required|email',
                'name'            => 'required',
                'url'             => 'required',
                'company_name'    => 'required',
                'company_address' => 'required',
                'vat_no'          => 'required',
                'phone'           => 'required',
                'skype'           => 'required',
                'qq_number'       => 'required',

            ];

            $validator = Validator::make($post, $rules);

            if($validator->fails()){

                $this->setMessage($validator->messages()->all(), 'error');

                return Redirect::to($_SERVER['REQUEST_URI'])->withInput();

            }else{
                $user = $this->data['user'];

                $user->login = $post['login'];
                $user->nickname = $post['nickname'];
                $user->email = $post['email'];
                $user->name = $post['name'];
                $user->url = $post['url'];
                $user->company_name = $post['company_name'];
                $user->company_address = $post['company_address'];
                $user->vat_no = $post['vat_no'];
                $user->phone = $post['phone'];
                $user->skype = $post['skype'];
                $user->qq_number = $post['qq_number'];

                $user->save();

                return Redirect::to($_SERVER['REQUEST_URI'])->withInput();

            }

        }else{

            return View::make('cabinet/editUser')->with($this->data);
        }

    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function order($orderId){

        $this->data['packStatistic'] = PackStatistic::where('id', $orderId)->where('user_id', Auth::id())->first();
        $this->data['packStatistic']->win_cards =  json_decode($this->data['packStatistic']->win_cards);
        $win_cards_list = $this->data['packStatistic']->win_cards;

        $this->data['basicList'] = [];
        $this->data['specialList'] = [];

        foreach($win_cards_list as $win_card){

            $cardPlayer = CardPlayer::find($win_card);
            $card = $cardPlayer->card()->first();

            if($card->type_id == 1){ // basic
                $this->data['basicList'][] = $cardPlayer;
            }elseif($card->type_id == 2){ // special
                $this->data['specialList'][] = $cardPlayer;
            }
        }

        echo '<pre>';
        var_dump($this->data['basicList'] );
        var_dump($this->data['specialList'] );
        echo '</pre>';
        return;

    }
    
    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */ 
    public function withdraw(){

        if(Request::isMethod('post')){

            $post = Input::all();

            $rules = [
                'coins'     => 'required|integer|max:'.$this->data['user']->coins['coins'],
            ];

            $validator = Validator::make($post, $rules);

            if($validator->fails()){

                $this->setMessage($validator->messages()->all(), 'error');

                return Redirect::to('cabinet/withdraw')->withInput();

            }else{

                $exchangeRate = ExchangeRate::find(1);

                $coins = $post['coins'];
                $points = $coins / $exchangeRate->course;

                // transactions
                $transaction = new Transaction();

                $transaction->user_id = $this->data['user']->id;
                $transaction->type_id = 2;
                $transaction->value = $post['coins'];
                $transaction->currency = 'coins';
                $transaction->save();

                $transaction = new Transaction();

                $transaction->user_id = $this->data['user']->id;
                $transaction->type_id = 3;
                $transaction->value = $points;
                $transaction->currency = 'points';
                $transaction->save();

                // user coins

                $userCoins = UserCoins::where('user_id', $this->data['user']->id)->first();
                $userCoins->coins = $userCoins->coins - $coins;
                $userCoins->points = $points;
                $userCoins->save();
            }
        }

        return View::make('cabinet/withdraw')->with($this->data);
    }

}