<?php
	$filepath = realpath(dirname(__FILE__));
	//echo $filepath;die;
	include_once ($filepath.'/../lib/Database.php');

 
/**
 * CardDetails
 */
class CardDetail 
{
	
	private $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	public function cardInsert($data){
		$cardName         = mysqli_real_escape_string($this->db->link, $data['cardName']);
		$cardNumber       = mysqli_real_escape_string($this->db->link, $data['cardNumber']);
		$CardHolder       = mysqli_real_escape_string($this->db->link, $data['CardHolder']);
	
		if (empty($cardName)) {
			$msg = "<span class='error'>CardDeatils field must be not empty!</span>";
			return $msg;
		}else{
			$query = "INSERT INTO carddetail(cardName, cardNumber, CardHolder) VALUES('$cardName', '$cardNumber', '$CardHolder')";
			$cardinsert = $this->db->insert($query);
			if ($cardinsert) {
				$msg = "<span class='success'>CardDeatils Inserted successfully!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>CardDeatils Not!</span>";
				return $msg;
			}
		}
	}

	public function getAllCard(){
		$query = "SELECT * FROM carddetail ORDER BY cardId DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getCardById($id){
		$query = "SELECT * FROM carddetail WHERE cardId='$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function cardUpdate($data, $id){
		$cardName         = mysqli_real_escape_string($this->db->link, $data['cardName']);
		$cardNumber       = mysqli_real_escape_string($this->db->link, $data['cardNumber']);
		$CardHolder       = mysqli_real_escape_string($this->db->link, $data['CardHolder']);
		if (empty($cardName)) {
			$msg = "<span class='error'>CardDeatils field must be not empty!</span>";
			return $msg;
		}else{
			$query = "UPDATE carddetail SET cardName = '$cardName', cardNumber = '$cardNumber' , CardHolder = '$CardHolder'
			WHERE cardId = '$id'";
			$updated_row = $this->db->update($query);
			if ($updated_row) {
				$msg = "<span class='success'>CardDeatils updated successfully!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>CardDeatils Not Updated!</span>";
				return $msg;
			}
		}
	}

	public function delCardByID($id){
		$query = "DELETE FROM carddetail WHERE cardId = '$id'";
		$deldata = $this->db->delete($query);
		if ($deldata) {
			$msg = "<span class='success'>CardDeatils Deleted  successfully!</span>";
				return $msg;
		}else{
			$msg = "<span class='error'>CardDeatils Not Deleted!</span>";
				return $msg;
		}
	}


}