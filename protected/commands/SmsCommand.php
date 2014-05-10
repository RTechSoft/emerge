<?php
class SmsCommand extends CConsoleCommand{
	public function run($args){
		$unrepliedMessage = Messagein::listMessageIn();
		foreach($unrepliedMessage as $val){
			$num = str_replace("+63", "0", $val['MessageFrom']);
			$checkNumberIfExist = Users::model()->findByAttributes(array("primary_username" => $num));
			if(strpos($val['MessageText'],'REG') !== false && !$checkNumberIfExist){
				$chunks = explode(" ", $val['MessageText']);
				$arrayHolder['number'] = $num;
				$arrayHolder['fname'] = $chunks[1];
				$arrayHolder['lname'] = $chunks[2];
				Messagein::signUpUserFromMobile($arrayHolder);
				echo "Successfully registered.";
				// Messagein::sendSms("Successfully%20registered.",$num);
				Messagein::updateSmsStatus($val['Id']);
			}
			else{
				echo $num." is already registered.";
				// Messagein::sendSms($num."%20is%20already%20registered.",$num);
				Messagein::updateSmsStatus($val['Id']);
			}
		}
	}
}