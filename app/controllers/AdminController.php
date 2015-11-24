<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 03.02.15
 * Time: 15:19
 */

class AdminController  extends BaseController {

    public $data = array();


    /*
 * Construct
 * @author Tremor
 */
    public function __construct(){


        $this->data['messages'] = View::make('block.messages')->with('messages', $this->getMessage())->render();
        $this->data['course'] = ExchangeRate::find(1)->course;
        $this->check();
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
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function check(){

        $check = Auth::check() ;

        if($check == false || Auth::user()->is_admin != 1){

            return Redirect::to('auth/login')->send();
        }

    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function index(){


        return View::make('admin.main')->with('data', $this->data);
    }

    /** __________________________________________________________________Pages _________________________________________________________________________________ */

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function page($pageId = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($pageId) && !empty($pageId) && is_numeric($pageId)){

            $this->data['page'] = Page::find($pageId);

            return View::make('admin.page.one')->with($this->data);

        }else{

            $this->data['pageList'] = Page::paginate(20);

            return View::make('admin.page.list')->with($this->data);
        }
    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function pageAction($action, $pageId = 0){

        if(isset($pageId) && !empty($pageId) && !is_numeric($pageId)){
            return Redirect::to('admin/page');
        }

        switch($action){
            case 'add' :

                $page = new Page;
                $page->save();

                $newId = $page->pag_id;

                return Redirect::to('admin/page/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');
                $affectedRows = Page::where('pag_id', $pageId)->update($post);

                return Redirect::to('admin/page/'.$pageId);
                break;
            case 'delete' :

                $page = Page::find($pageId);
                $page->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/page');
    }

    /** __________________________________________________________________End Pages _________________________________________________________________________________ */

    /** __________________________________________________________________ Transactions _____________________________________________________________________________ */

    /**
     *
     * @return nothing
     * @author Tremor
     */
    public function transaction(){

        $this->data['transactionList'] = Transaction::orderBy('id', 'desc')->orderBy('type_id', 'desc')->paginate(20);

        return View::make('admin.transaction.list')->with($this->data);
    }

    /** __________________________________________________________________End Transactions __________________________________________________________________________ */


    /** _________________________________________________________________ Transaction Type _________________________________________________________________________________ */

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function transactionType($typeId = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($typeId) && !empty($typeId) && is_numeric($typeId)){

            $this->data['transactionType'] = TransactionType::find($typeId);

            return View::make('admin.transactionType.one')->with($this->data);

        }else{

            $this->data['transactionTypeList'] = TransactionType::paginate(20);

            return View::make('admin.transactionType.list')->with($this->data);
        }
    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function transactionTypeAction($action, $typeId = 0){

        if(isset($typeId) && !empty($typeId) && !is_numeric($typeId)){
            return Redirect::to('admin/transactionType');
        }

        switch($action){
            case 'add' :

                $transactionType = new TransactionType;
                $transactionType->save();

                $newId = $transactionType->id;

                return Redirect::to('admin/transactionType/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');
                $affectedRows = TransactionType::where('id', $typeId)->update($post);

                return Redirect::to('admin/transactionType/'.$typeId);
                break;
            case 'delete' :

                $page = TransactionType::find($typeId);
                $page->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/transactionType');
    }

    /** __________________________________________________________________End Transaction Type _____________________________________________________________________________ */

    /** __________________________________________________________________ Pack _____________________________________________________________________________________ */

    /**
     *
     * @param $packId
     * @return nothing
     * @author Tremor
     */
    public function pack($packId = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($packId) && !empty($packId) && is_numeric($packId)){

            $this->data['pack'] = Pack::find($packId);

            $array = [];
            foreach(CardType::orderBy('sort', 'desc')->get() as $type){
                $array[$type->name] = Pack::find($packId)->more()->where('cardType_id' , $type->id)->get();
            }

            $this->data['percentList'] = $array;

            return View::make('admin.pack.one')->with($this->data);

        }else{

            $this->data['packList'] = Pack::paginate(20);

            $array = [];
            foreach($this->data['packList'] as $pack){

                foreach(CardType::orderBy('sort', 'desc')->get() as $type){
                    $array[$type->name] = Pack::find($pack->id)->more()->where('cardType_id' , $type->id)->get();
                }
                $pack->pctList = $array;
            }
//            $this->data['pctList'] = $array;



            return View::make('admin.pack.list')->with($this->data);
        }
    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function packAction($action, $packId = 0){

        if(isset($packId) && !empty($packId) && !is_numeric($packId)){
            return Redirect::to('admin/pack');
        }

        switch($action){
            case 'add' :

                $pack = new Pack;
                $pack->save();

                $newId = $pack->id;


                $cardList = Card::all();

                foreach($cardList as $card){

                    PackCardType::create(array('pack_id' => $newId, 'card_id' => $card->id, 'cardType_id' => $card->type_id));
                }

                return Redirect::to('admin/pack/'.$newId);
                break;
            case 'edit' :

                $pack = Input::except('_token', 'pct');

                $packPercent = Input::only('pct');
                $percentList = $packPercent['pct'];

                foreach($percentList as $key => $percent){

                    $pct = PackCardType::find($key);

                    $pct->percent = $percent;
                    $pct->save();
                }


                $affectedRows = Pack::where('id', $packId)->update($pack);

                return Redirect::to('admin/pack/'.$packId);
                break;
            case 'delete' :

                $pack = Pack::find($packId);

                PackCardType::where('pack_id', $packId)->delete();

                $pack->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/pack');
    }

    /** __________________________________________________________________ End Pack _________________________________________________________________________________ */

    /** __________________________________________________________________Card _________________________________________________________________________________ */

    /**
     *
     * @param $cardId
     * @return nothing
     * @author Tremor
     */
    public function card($cardId = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($cardId) && !empty($cardId) && is_numeric($cardId)){

            $this->data['card'] = Card::find($cardId);
            $this->data['cardType'] = CardType::lists('name', 'id');
            $this->data['cardRole'] = CardRole::lists('name', 'id');

            return View::make('admin.card.one')->with($this->data);

        }else{

            $this->data['cardList'] = Card::paginate(20);

            return View::make('admin.card.list')->with($this->data);
        }
    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function cardAction($action, $cardId = 0){

        if(isset($cardId) && !empty($cardId) && !is_numeric($cardId)){
            return Redirect::to('admin/card');
        }

        switch($action){
            case 'add' :

                $card = new Card;
                $card->save();

                $newId = $card->id;

                return Redirect::to('admin/card/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');
                $affectedRows = Card::where('id', $cardId)->update($post);

                return Redirect::to('admin/card/'.$cardId);
                break;
            case 'delete' :

                $card = Card::find($cardId);
                $card->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/card');
    }

    /** __________________________________________________________________End Card ________________________________________________________________________________ */

    /** __________________________________________________________________Card Type _________________________________________________________________________________ */

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function cardType($typeId = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($typeId) && !empty($typeId) && is_numeric($typeId)){

            $this->data['cardType'] = CardType::find($typeId);

            return View::make('admin.cardType.one')->with($this->data);

        }else{

            $this->data['cardTypeList'] = CardType::paginate(20);

            return View::make('admin.cardType.list')->with($this->data);
        }
    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function cardTypeAction($action, $typeId = 0){

        if(isset($typeId) && !empty($typeId) && !is_numeric($typeId)){
            return Redirect::to('admin/cardType');
        }

        switch($action){
            case 'add' :

                $cardType = new CardType;
                $cardType->save();

                $newId = $cardType->id;

                return Redirect::to('admin/cardType/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');
                $affectedRows = CardType::where('id', $typeId)->update($post);

                return Redirect::to('admin/cardType/'.$typeId);
                break;
            case 'delete' :

                $page = CardType::find($typeId);
                $page->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/cardType');
    }

    /** __________________________________________________________________End Card Type _____________________________________________________________________________ */

    /** __________________________________________________________________Card Role _________________________________________________________________________________ */

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function cardRole($roleId = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($roleId) && !empty($roleId) && is_numeric($roleId)){

            $this->data['cardRole'] = CardRole::find($roleId);

            return View::make('admin.cardRole.one')->with($this->data);

        }else{

            $this->data['cardRoleList'] = CardRole::paginate(20);

            return View::make('admin.cardRole.list')->with($this->data);
        }
    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function cardRoleAction($action, $roleId = 0){

        if(isset($roleId) && !empty($roleId) && !is_numeric($roleId)){
            return Redirect::to('admin/cardRole');
        }

        switch($action){
            case 'add' :

                $cardRole = new CardRole;
                $cardRole->save();

                $newId = $cardRole->id;

                return Redirect::to('admin/cardRole/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');
                $affectedRows = CardRole::where('id', $roleId)->update($post);

                return Redirect::to('admin/cardRole/'.$roleId);
                break;
            case 'delete' :

                $page = CardRole::find($roleId);
                $page->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/cardRole');
    }

    /** __________________________________________________________________End Card Role _________________________________________________________________________________ */



    /** __________________________________________________________________Opened Packs _________________________________________________________________________________ */


    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function openedPacks(){

        $this->data['orderList'] = PackStatistic::orderBy('id', 'desc')->paginate(20);

        return View::make('admin.openedPack.list')->with($this->data);
    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function packStatistic(){

        $date = new DateTime('today -3 days');

        // general statistic
        $statisticList = PackStatistic::all();
        $generalCountOpened = $statisticList->count();

        $generalSumValue = $statisticList->sum('value');
        $generalSumPrice = $statisticList->sum('price') * $this->data['course'];
        $generalSum = $generalSumPrice - $generalSumValue;

        $generalCountWins = 0;
        foreach($statisticList as  $packStatistic){

            if($packStatistic->value < $packStatistic->price * $this->data['course']){
                $generalCountWins ++;
            }
        }
        $generalWinPercent = round(($generalCountWins * 100) / $generalCountOpened, 2);

        $this->data['general'] = array(
            'sum' => $generalSum,
            'winPercent' => $generalWinPercent,
            'countPack' => $generalCountOpened,
            'avg' => PackStatistic::avg('value'),
        );

        $this->data['packList'] = PackStatistic::groupBy('pack_id')->paginate(20);
        $this->data['statistic'] = [];

        // statistic for each packs
        foreach($this->data['packList'] as $pack){

            $stat = PackStatistic::where('pack_id', $pack->pack_id)->get();
            $countOpened = $stat->count();

            $sumValue = $stat->sum('value');
            $sumPrice = $stat->sum('price') * $this->data['course'];
            $sum = $sumPrice - $sumValue;

            $countWins = 0;
            foreach($stat as  $statistic){

                if($statistic->value < $statistic->price * $this->data['course']){
                    $countWins ++;
                }
            }
            $winPercent = round(($countWins * 100) / $countOpened, 2);

            $recentPacks = PackStatistic::where('pack_id', $pack->pack_id)->where('created_at', '>', $date)->count();

            $avgValue =  PackStatistic::where('pack_id', $pack->pack_id)->avg('value');
            $min = $stat->min('value');
            $max = $stat->max('value');

            $this->data['statistic'][$pack->pack_id] = array(
                'countOpened' => $countOpened,
                'sum' => $sum,
                'winPercent' => $winPercent,
                'recentPacks' => $recentPacks,
                'avg' => $avgValue,
                'min' => $min,
                'max' => $max
            );

        }


        return View::make('admin.packStatistic.list')->with($this->data);
    }

        /** __________________________________________________________________User _________________________________________________________________________________ */

        /**
         *
         * @param $userId int, user id
         * @return nothing
         * @author Tremor
         */
        public function user($userId = 0){

            $this->data['active'] = __FUNCTION__;

            if(isset($userId) && !empty($userId) && is_numeric($userId)){

                $this->data['user'] = User::find($userId);
                //Stock, Points, Withdrew, Packs, Withdraw, Last Activity Date

                return View::make('admin.user.one')->with($this->data);

            }else{

                $this->data['userList'] = User::paginate(20);

                return View::make('admin.user.list')->with($this->data);
            }
        }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function userTransactions($userId){

        $this->data['transactionList'] = Transaction::where('user_id', $userId)->orderBy('id', 'desc')->orderBy('type_id', 'desc')->get();

        return View::make('admin.user.transactions')->with($this->data);
    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function userOrders($userId){

//        $this->data['orderList'] = PackStatistic::where('user_id', $userId)->orderBy('id', 'desc');

        $this->data['orderList'] = PackStatistic::where('user_id', $userId)->orderBy('id', 'desc')->get();

        return View::make('admin.user.orders')->with($this->data);
    }

        /**
         *
         * @param $action string, action name
         * @param $userId int, user id
         * @return redirect
         * @author Tremor
         */
        public function userAction($action, $userId = 0){

            if(isset($userId) && !empty($userId) && !is_numeric($userId)){
                return Redirect::to('admin/user');
            }

            switch($action){
                case 'add' :

                    $user = new User;
                    $user->save();

                    $newId = $user->id;

                    return Redirect::to('admin/user/'.$newId);
                    break;
                case 'edit' :

                    $post = Input::except('_token');
                    $affectedRows = User::where('id', $userId)->update($post);

                    return Redirect::to('admin/user/'.$userId);
                    break;
                case 'delete' :

//                    $page = User::find($userId);
//                    $page->delete();

                    break;
                default :
                    break;
            }

            return Redirect::to('admin/user');
        }

        /** __________________________________________________________________ End User ________________________________________________________________________ */


    /** __________________________________________________________________ Faq _________________________________________________________________________________ */

    /**
     *
     * @param $faqId int, faq id
     * @return nothing
     * @author Tremor
     */
    public function faq($faqId = 0){

        $this->data['active'] = __FUNCTION__;

        if(isset($faqId) && !empty($faqId) && is_numeric($faqId)){

            $this->data['faq'] = Faq::find($faqId);

            return View::make('admin.faq.one')->with($this->data);

        }else{

            $this->data['faqList'] = Faq::paginate(20);

            return View::make('admin.faq.list')->with($this->data);
        }
    }

    /**
     *
     * @param $action string, action name
     * @param $faqId int, faq id
     * @return redirect
     * @author Tremor
     */
    public function faqAction($action, $faqId = 0){

        if(isset($faqId) && !empty($faqId) && !is_numeric($faqId)){
            return Redirect::to('admin/faq');
        }

        switch($action){
            case 'add' :

                $faq = new Faq;
                $faq->save();

                $newId = $faq->id;

                return Redirect::to('admin/faq/'.$newId);
                break;
            case 'edit' :

                $post = Input::except('_token');
                $affectedRows = Faq::where('id', $faqId)->update($post);

                return Redirect::to('admin/faq/'.$faqId);
                break;
            case 'delete' :

                $faq = Faq::find($faqId);
                $faq->delete();

                break;
            default :
                break;
        }

        return Redirect::to('admin/faq');
    }

    /** __________________________________________________________________End Faq _________________________________________________________________________________ */


    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function exchange(){

        $this->data['exchange'] = ExchangeRate::find(1);

        if(Request::isMethod('post')) {

            $post = Input::only('course');
            $this->data['exchange']->course = $post['course'];
            $this->data['exchange']->save();
        }

        return View::make('admin.exchange.one')->with($this->data);
    }

}