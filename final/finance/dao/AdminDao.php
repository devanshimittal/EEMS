<?php
class AdminDao {
	function __construct($db) {
		$this->pdo = $db;
	}

	public function allTripList() {
		  $query = "SELECT
					T.trip_id AS Trip_ID,
					T.date_of_journey AS DOJ,
					T.date_of_return AS DOR,
					T.place AS place,
                    T.user_id AS user_id
					FROM trip T";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	
	public function allAboutById($id) {
		  $query = "SELECT
					A.trip_id AS Id,
					A.date_of_journey AS DOJ,
					A.date_of_return AS DOR,
					A.place AS place,
					A.user_id AS user_id,
					A.lodging AS lodging,
					A.travel AS travel,
					A.allowance AS allowance
					FROM trip A where A.trip_id='$id' ";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function EmployeeById($id) {
		  $query = "SELECT
					E.user_id AS id,
					E.name AS name,
					E.email_id AS email,
					E.password AS password,
					E.department AS department,
					E.designation AS designation,
					E.account_no AS account,
					E.city AS city,
					E.country AS country,
					E.dob AS DOB,
					E.pic AS pic
					FROM firm E where E.user_id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function EmployeeByEg($eg) {
		  $query = "SELECT
					E.user_id AS eg,
					E.name AS name,
					E.email_id AS email,
					E.password AS password,
					E.department AS department,
					E.designation AS designation,
					E.account_no AS account,
					E.city AS city,
					E.country AS country,
					E.dob AS DOB,
					E.pic AS pic
					FROM firm E where E.user_id='$eg'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function saveTrip($id,$allowance) {
		  $query = "UPDATE trip SET
					allowance=:allowance
					WHERE trip_id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue (':allowance', $allowance, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function Travel( $new_filename, $id) {
		$query = "	UPDATE trip SET
					travel='" . $new_filename . "'
					WHERE trip_id= '$id' ";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function Lodging( $new_filename, $id) {
		$query = "	UPDATE trip SET
					lodging='" . $new_filename . "'
					WHERE trip_id= '$id' ";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
		public function allPendingList() {
		  $query = "SELECT
					P.trip_id AS Trip_ID,
					P.place AS place,
                    P.user_id AS user_id,
                    P.bills AS bills,
                    P.amount AS amount,
					P.pay_status AS pay_status,
                    P.allowance AS allowance
					FROM pending_requests P
					where status='1'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function updatePayStatus ( $status, $id) {
		$query = "	UPDATE pending_requests SET
					pay_status='" . $status . "'
					Where trip_id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function bannerById($id) {
		$query = "	SELECT
					B.id AS Id,
					B.pic AS Image,
					B.pic1 AS NewsImage,
					B.text1 AS Text1,
					B.text2 AS Text2,
					B.link AS Link,
					B.date AS Date
					FROM banner B where B.id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function PhoneByEg($eg) {
		  $query = "SELECT
					P.phone_no1 AS p1,
					P.phone_no2 AS p2
					FROM phone P where P.user_id='$eg'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
}