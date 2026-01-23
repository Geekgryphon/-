<?php 

Class VendingMachine {

  protected $Coins = 0;


    public function ShowInputCoin(){
      echo "目前一共投入". $this->Coins ."元";
    }

    public function InsertCoins($Coin){
      $this->Coins += $Coin;
    }

    public function showDrinkingNum(){

    }

    public function RefundConins(){
      if($this->Coins > 0){
        echo "退你已投入的" . $this->Coins . "元";
      }else{
        echo "無任何硬幣，無法退幣";
      }
    }


  -判斷金額
  -加總投入的錢
  -退幣
  -退幣要給那些銅板
  -飲料種類
  -附吸管
  -附湯匙
  -是否完售
  -現在投幣多少
}
