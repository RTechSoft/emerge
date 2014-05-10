<?php
class SmsCommand extends CConsoleCommand{
	public function run($args){
		$unrepliedMessage = Messagein::listMessageIn();
		foreach($unrepliedMessage as $val){
			$num = str_replace("+63", "0", $val['MessageFrom']);
			$checkNumberIfExist = Users::model()->findByAttributes(array("primary_username" => $num));
			$chunks = explode(" ", $val['MessageText']);
			if(strpos($val['MessageText'],'REG') !== false){
				if(!$checkNumberIfExist){
					$arrayHolder['number'] = $num;
					$arrayHolder['fname'] = $chunks[1];
					$arrayHolder['lname'] = $chunks[2];
					Messagein::signUpUserFromMobile($arrayHolder);
					echo "Successfully registered.";
					// Messagein::sendSms("Successfully%20registered.",$num);
				}
				else{
					echo $num." is already registered.";
					// Messagein::sendSms($num."%20is%20already%20registered.",$num);
				}
			}else if(strpos($val['MessageText'],'HELP') !== false){
				if(count($chunks)==1){
					if($checkNumberIfExist){
						if($checkNumberExist['user_address']){
							$arrayHolder['number'] = $checkNumberExist['number'];
							$arrayHolder['sender_location'] = $checkNumberExist['user_address'];
							$arrayHolder['alt_location'] = "";
							$arrayHolder['location_scope'] = "";
							Messagein::addHelpRequest($arrayHolder);
							echo "Help request sent.";
							// Messagein::sendSms("Help%20request%20sent.",$num);
						}
						else{
							// Messagein::sendSms("Address%20Required.%20Please%20follow%20this%20format:%20HELP%20[address]",$num);
							echo "Address Required. Please follow this format: HELP [address]";
						}
					}
					else{
						// Messagein::sendSms("Register%20first.%20Please%20follow%20this%20format:%20REG%20[firstname]%20[lastname]",$num);
						echo "Register first. Please follow this format: REG [firstname] [lastname]";
					}
				}
				else{
					if($checkNumberIfExist){
						$arrayHolder['number'] = $checkNumberExist['number'];
						$arrayHolder['alt_location'] = $chunk[1];
						$arrayHolder['location_scope'] = "";
						Messagein::addHelpRequest($arrayHolder);
						echo "Help request sent.";
						// Messagein::sendSms("Help%20request%20sent.",$num);
					}
					else{
						// Messagein::sendSms("Register%20first.%20Please%20follow%20this%20format:%20REG%20[firstname]%20[lastname]",$num);
						echo "Register first. Please follow this format: REG [firstname] [lastname]";
					}
				}
			}else if(strpos($val['MessageText'],'COMPLETE') !== false){
				$checkLogsExists = HelpLogs::model()->findByPk($chunks[1]);
				if($checkLogsExists){
					Messagein::completeHelpLog($chunks[1]);
					echo "Log ".$chunks[1]." is complete.";
					// Messagein::sendSms("Log%20".$chunks[1]."%20is%20complete.",$num);
				}
				else{
					// Messagein::sendSms("Log%20".$chunks[1]."%20not%20found.",$num);
					echo "Log ".$chunks[1]." not found.";
				}
			}
			Messagein::updateSmsStatus($val['Id']);
		}
	}
}