<?php
class SmsCommand extends CConsoleCommand{
	public function run($args){
		$unrepliedMessage = Messagein::listMessageIn();
		foreach($unrepliedMessage as $val){
			$num = str_replace("+63", "0", $val['MessageFrom']);
			$message = $val['MessageText'];
			echo $message;
		}
	}
}