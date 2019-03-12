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
					FROM trip A where A.trip_id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function TripByAll($id) {
		  $query = "SELECT
					T.trip_id AS Trip_ID,
					T.date_of_journey AS DOJ,
					T.date_of_return AS DOR,
					T.place AS place,
					T.user_id AS id,
					T.lodging AS lodging,
					T.travel AS travel,
					T.allowance AS allowance
					FROM trip T where T.user_id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetchAll ( PDO::FETCH_CLASS );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function TripById($id) {
		  $query = "SELECT
					T.trip_id AS Trip_ID,
					T.date_of_journey AS DOJ,
					T.date_of_return AS DOR,
					T.place AS place,
					T.user_id AS id,
					T.lodging AS lodging,
					T.travel AS travel,
					T.allowance AS allowance
					FROM trip T where T.user_id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function TripAsId($id) {
		  $query = "SELECT firm.user_id, trip.user_id,trip.place
                    FROM firm
                    INNER JOIN trip
                    ON firm.user_id = trip.user_id";
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
					E.DOB AS DOB,
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
					E.DOB AS DOB,
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
	
	public function saveRequest( $id,$place,$date_of_journey,$date_of_return) {
		  $query = "INSERT INTO trip SET
		            user_id=:id,
					place=:place,
					date_of_journey=:date_of_journey,
					date_of_return=:date_of_return ";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue ( ':id', $id, PDO::PARAM_STR );
		$stmt->bindValue ( ':place', $place, PDO::PARAM_STR );
		$stmt->bindValue ( ':date_of_journey', $date_of_journey, PDO::PARAM_STR );
		$stmt->bindValue ( ':date_of_return', $date_of_return, PDO::PARAM_STR );	
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function isEmployeeUser ( $id ){
		$query = "  SELECT
					U.user_id AS id,
					U.trip_id AS trip_id
					FROM trip U
					WHERE U.user_id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function saveBill($id,$user_id,$total) {
		  $query = "INSERT INTO bills SET
					trip_id=:id,
					user_id=:user_id,
					amount=:total";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue (':id', $id, PDO::PARAM_STR );
		$stmt->bindValue (':user_id', $user_id, PDO::PARAM_STR );
		$stmt->bindValue (':total', $total, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function Bill( $new_filename, $id) {
		$query = "	UPDATE bills SET
					bills='" . $new_filename . "'
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
	
	public function saveAudit($id ,$place, $user_id, $allowance,$total,$bills) {
		  $query = "INSERT INTO pending_requests SET
					trip_id=:id,
					place=:place,
					user_id=:user_id,
					allowance=:allowance,
					amount=:total,
					bills=:bills";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->bindValue (':id', $id, PDO::PARAM_STR );
		$stmt->bindValue (':place', $place, PDO::PARAM_STR );
		$stmt->bindValue (':user_id', $user_id, PDO::PARAM_STR );
		$stmt->bindValue (':allowance', $allowance, PDO::PARAM_STR );
		$stmt->bindValue (':total', $total, PDO::PARAM_STR );
		$stmt->bindValue (':bills', $bills, PDO::PARAM_STR );
		$stmt->execute ();
		$recordId = $this->pdo->lastInsertId ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	public function Audit( $new_filename, $id) {
		$query = "	UPDATE pending_requests SET
					bills='" . $new_filename . "'
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
	
	public function BillbyPen($pen) {
	 $query = "SELECT
			  B.trip_id AS pen,
			  B.user_id AS user_id,
			  B.bills AS bills,
			  B.amount AS amount
			  FROM bills B where B.trip_id='$pen'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function updatPasswordBy($id,$opassword,$npassword,$rpassword) {
			  $query ="UPDATE INTO firm SET
					   PA.rpassword AS Password
					   WHERE PA.user_id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function updateImage( $new_filename, $id) {
		$query = "	UPDATE firm SET
					pic='" . $new_filename . "'
					WHERE user_id='$id'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$recordId = $stmt->rowCount ();
		if ($recordId > 0) {
			return $recordId;
		} else {
			return false;
		}
	}
	
	
}