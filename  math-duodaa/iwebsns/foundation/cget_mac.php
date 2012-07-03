<?php
//��ȡ������mac��ַ
class GetMacAddr{

	var $return_array = array(); // ���ش���MAC��ַ���ִ�����
	var $mac_addr;

	function GetMacAddr($os_type){
		switch (strtolower($os_type)){
			case "linux":
			$this->forLinux();
			break;

			case "solaris":
			break;

			case "unix":
			break;

			case "aix":
			break;

			default:
			$this->forWindows();
			break;
		}

		$temp_array = array();

		foreach ( $this->return_array as $value ){

			if(preg_match("/[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f]/i",$value,$temp_array)){
				$this->mac_addr = $temp_array[0];
				break;
			}

		}
	    unset($temp_array);
	    return $this->mac_addr;
	}

	//windowsϵͳ�ӿ�
	function forWindows(){
	    @exec("ipconfig /all", $this->return_array);
	    if ( $this->return_array )
				return $this->return_array;
	    else{
				$ipconfig = $_SERVER["WINDIR"]."\system32\ipconfig.exe";
				if ( is_file($ipconfig) ){
					@exec($ipconfig." /all", $this->return_array);
				}else{
					@exec($_SERVER["WINDIR"]."\system\ipconfig.exe /all", $this->return_array);
				}
				return $this->return_array;
	    }
	}

	//linuxϵͳ�ӿ�
	function forLinux(){
		@exec("ifconfig -a", $this->return_array);
		return $this->return_array;
	}

}
//ʹ�÷���
//$mac = new GetMacAddr(PHP_OS);
//echo $mac->mac_addr;
?>