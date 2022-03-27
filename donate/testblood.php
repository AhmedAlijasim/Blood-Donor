<?php 
	session_start();
	//Convert Html Tag to String And Call protected function.
	@$donate = filter_var(test_input($_GET['givenBlG']), FILTER_SANITIZE_STRING);
	@$sick   = filter_var(test_input($_GET['receiveBlG']), FILTER_SANITIZE_STRING);
	// where A+ => A1 , A- => A2 
	$mainArray  = array(
		"A1"	=>	array('A1', 'AB1'),
		'A2'	=>	array('A2', 'A1', 'AB2', 'AB1'),
		"B1"	=>	array('B1','AB1'),
		'B2'	=>	array('B2','B1' ,'AB2' ,'AB1'),
		"AB1"	=>	array('AB1'),
		'AB2'	=>	array('AB2','AB1'),
		"O1"	=>	array('O1','A1','B1','AB1'),
		'O2'	=>	array('A1','A2' ,'B1' ,'B2', 'AB1','AB2' ,'O1' ,'O2')
	);
	if(@$_SESSION['lang']=='ltr') { $result="Sorry, There is no match in the blood"; }
	else { $result="<bdi>عذرا لا يوجد تطابق في الدم</bdi><br>"; }
	foreach($mainArray as $key => $subArray){ 
		foreach($subArray as $value){ 
			if ($donate === $key){
				if ($sick === $value){
					if(@$_SESSION['lang']=='ltr')
						{$result="<bdi>Good, There is match in the blood</bdi><br>";} 
					else {$result="<bdi>حسنا , يوجد تطابق في الدم</bdi><br>";}
				}
			}
		}
	}
	echo $result;

	function test_input($data) // create protected function.
	{
		@$data = trim($data);
		@$data = stripcslashes($data);
		@$data = htmlspecialchars($data);
		return $data;
	}
?>