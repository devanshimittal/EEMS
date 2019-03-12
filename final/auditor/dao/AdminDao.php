<?php
class AdminDao {
	function __construct($db) {
		$this->pdo = $db;
	}

	public function allPendingList() {
		  $query = "SELECT
					P.trip_id AS Trip_ID,
					P.place AS place,
                    P.user_id AS user_id,
                    P.bills AS bills,
                    P.amount AS amount,
                    P.allowance AS allowance
					FROM pending_requests P
					where status='0'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function PendingByphone($phone) {
		  $query = "SELECT
					E.trip_id AS phone,
					E.place AS place,
                    E.user_id AS user_id,
                    E.bills AS bills,
                    E.amount AS amount,
                    E.allowance AS allowance,
					E.status AS status
					FROM pending_requests E where E.trip_id='$phone'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
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
	
	public function allAboutByBottle($bottle) {
		  $query = "SELECT
					A.trip_id AS bottle,
					A.date_of_journey AS DOJ,
					A.date_of_return AS DOR,
					A.place AS place,
					A.user_id AS user_id,
					A.lodging AS lodging,
					A.travel AS travel,
					A.allowance AS allowance
					FROM trip A where A.trip_id='$bottle' ";
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
	
	public function updateTripStatus ($id,$status) {
		$query = "	UPDATE pending_requests SET
					status='" . $status . "'
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