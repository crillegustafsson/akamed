<?php 
session_start();


if(isset($_SESSION['till']) xor isset($_SESSION['from'])){

			if(isset($_SESSION['till'])){
				/*
				$till = $_SESSION['till'];


					$query =<<<END
					SELECT * FROM `resa` WHERE `till`= '{$till}'


END;
*/
	echo "till";
			}else{	
/*
				$from = $_SESSION['from'];

					$query =<<<END
					SELECT * FROM `resa` WHERE `fran`= '{$from}'

END;
*/
	echo "från";
			}

}else{


			$till = $_SESSION['till'];
			$from = $_SESSION['from'];

/*
				$query =<<<END
				SELECT * FROM `resa` WHERE `till`= '{$till}' AND `fran` = '{$from}'

END;
*/

	echo $till . $from ."till och från";
}




 ?>

 