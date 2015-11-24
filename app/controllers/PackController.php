<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 11.09.15
 * Time: 14:36
 */

class PackController extends HomeController {


    public function __construct(){

        parent::__construct();

        $this->check();
    }

    public function index(){

    }


    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function buy($packId){

        $this->data['user'] = $user = User::find(Auth::id());
        $pack = Pack::find($packId);
        $userCoins = UserCoins::where('user_id', $user->id)->first();

        if($userCoins->points > $pack->price){

            $packCardType = $pack->more()->where('percent', '>', 0)->get();

            $winningSum = 0;
            $winningCard = array();
            $winningCardPlayers = [];
            $info = [];
            foreach($packCardType as $pct){

                $card = $pct->card()->first();

                $winningCard[$card->name] = array(
                    'percentToWin' => $pct->percent,
                    'countCard' => count($card->player()->get()),
                    'countWin' => 0,
                    'winWithPercent' => '',
                    'subType' => '',
                    'player_id' => array(),
                );

                foreach($card->player()->get() as $player){

                    $rand = mt_rand(1, 1000) / 10;
                    if ($rand < $pct->percent) { // 80% случаев

                        $cardCoins = $card->coins;
//                        $winningSum = $winningSum + $cardCoins;

                        $winningCard[$card->name]['countWin'] ++;
                        $winningCard[$card->name]['winWithPercent'] .= $rand.', ';
                        $winningCard[$card->name]['subType'] = $card->subType['name'];
                        $winningCard[$card->name]['player_id'][] = $player->id;

                        $info[$card->subType['name']][] = array(
                            'coins' => $cardCoins,
                            'player_id' => $player->id
                        );
                    }
                }
            }

            // Берем собранную инфу по выигранным карточкам и рандомно выбираем кол-во спешл и басик карточек исходя из данных пака
            foreach($info as $key => $val){

                $list = array_rand($val, $pack->{$key.'_card_number'});

                foreach($list as $player_id){

                    $winningSum += $info[$key][$player_id]['coins'];
                    $winningCardPlayers[] = $info[$key][$player_id]['player_id'];

                }
            }


            // Списываем со счета юзера  стоимость пака
            $userCoins->points = $userCoins->points - $pack->price;
            $userCoins->coins = $userCoins->coins + $winningSum;
            $userCoins->save();

            // Добавляем в транзакцию сумму потраченных поинтов юзера на пак
            $transaction = new Transaction();

            $transaction->user_id = $user->id;
            $transaction->type_id = 1;
            $transaction->value = $pack->price;
            $transaction->currency = 'points';
            $transaction->save();

            // добавляем в транзакцию сумму выиграша от пака  в коинах
            $transaction = new Transaction();

            $transaction->user_id = $user->id;
            $transaction->type_id = 3;
            $transaction->value = $winningSum;
            $transaction->currency = 'coins';
            $transaction->save();

            // Записываем данную операцию в таблицу orders

//            $order = new Order();
//
//            $order->pack_id = $packId;
//            $order->user_id = $user->id;
//            $order->price = $pack->price;
//
            $cards = '';
            foreach($winningCard as $key => $win){
                $cards .=  $key.'('.$win['countWin'].') ';
            }

//            $order->cards = $cards;
//            $order->win_cards = json_encode($winningCardPlayers);
//            $order->save();

            // Запись в таблицу packStatistic
            $statistic = new PackStatistic();

            $statistic->pack_id = $packId;
            $statistic->user_id = $user->id;
            $statistic->value = $winningSum;
            $statistic->price = $pack->price;
            $statistic->cards = $cards;
            $statistic->win_cards = json_encode($winningCardPlayers);
            $statistic->save();

            return Redirect::to('pack/opened/'.$packId)->withInput();

        }else{
            $this->setMessage('not enough points', 'error');
            return Redirect::to('deposit')->send();
        }

    }

    public function opened($packId){

//        $this->data['pack'] = PackStatistic::where('pack_id', $packId)->where('user_id', Auth::id())->orderBy('created_at', 'desc');
        $this->data['packStatistic'] = PackStatistic::where('pack_id', $packId)->where('user_id', Auth::id())->latest('created_at')->first();
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

        return View::make('opened_pack')->with($this->data);
    }
}