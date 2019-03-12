<?php
class LoginDao {
	function __construct($db) {
		$this->pdo = $db;
	}
	public function isEmployeeUser ( $email_id, $password){
		$query = "  SELECT
					U.user_id AS id,
					U.name AS Name,
					U.email_id AS Email,					U.password AS password,					U.department AS type
					FROM firm as U
					WHERE 1=1
					AND U.email_id='" . $email_id . "'
					AND U.password='" . $password . "'					AND U.department='Employee'";
		$stmt = $this->pdo->prepare ( $query );
		$stmt->execute ();
		$result = $stmt->fetch ( PDO::FETCH_OBJ );
		if (! empty ( $result )) {
			return $result;
		} else {
			return false;
		}
	}		public function isFinanceUser ( $email_id, $password){		$query = "  SELECT					U.user_id AS UserId,					U.name AS Name,					U.email_id AS Email,					U.password AS password,					U.department AS type					FROM firm as U					WHERE 1=1					AND U.email_id='" . $email_id . "'					AND U.password='" . $password . "'					AND U.department='Finance'";		$stmt = $this->pdo->prepare ( $query );		$stmt->execute ();		$result = $stmt->fetch ( PDO::FETCH_OBJ );		if (! empty ( $result )) {			return $result;		} else {			return false;		}	}    public function isAuditUser ( $email_id, $password){		$query = "  SELECT					U.user_id AS UserId,					U.name AS Name,					U.email_id AS Email,					U.password AS password,					U.department AS type					FROM firm as U					WHERE 1=1					AND U.email_id='" . $email_id . "'					AND U.password='" . $password . "'					AND U.department='Audit'";		$stmt = $this->pdo->prepare ( $query );		$stmt->execute ();		$result = $stmt->fetch ( PDO::FETCH_OBJ );		if (! empty ( $result )) {			return $result;		} else {			return false;		}	}	
}?>
