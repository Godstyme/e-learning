<?php
	class processRequest {
		public function processInput($data): string {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	}	
?>


