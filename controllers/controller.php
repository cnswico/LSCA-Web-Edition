<?php
	class controller {
		private $db;

		public function __construct(MySQLHandler $db) {
			$this -> db = $db;
		}
		
		public function login($email, $password) {
            $logindb = $this -> db;
			$sql = "SELECT * FROM `tblAdmins` WHERE Email = '$email' AND Password = '$password' LIMIT 1";
			$result = $logindb -> Select($sql);

			if (count($result) > 0) $x = "true";
            else $x = "false";
			
			return $x;
        }

		public function getStudents() {
			$studentsDb = $this -> db;
			$sql = "SELECT A.Id, A.Name, A.StudentNumber, B.Level, A.Age, A.Guardian, A.GuardianContact FROM tblstudents AS A INNER JOIN tbllevels AS B ON A.LevelId = B.Id
";
			$result = $studentsDb -> Select($sql);

			return $result;
		}

		public function getPhases() {
			$phasesDb = $this -> db;
			$sql = "";

			$result = $phasesDb -> Select($sql);

			return $result;
		}
	}
?>