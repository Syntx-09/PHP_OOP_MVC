<?php



trait Model
{
	use Database;
	protected $limit = 5;
	// protected $order_type = "desc";
	// protected $column_order = "id";
	public $errMsg = [];
	protected $offset = 0;


	public function find_where($data, $data_not=[]) {
		/* method retieves data using PDO statement:
		SELECT * FROM table_name WHERE id(column ) = :id(column )
		Pass the id(column ) as an array..
		Use case 1;
		
		$arr= array('name'=>'Sammsith');
		$arr['id'] = 5;
		$arr['email'] = "samw@sam.titi";

		$result = $user->find_where($arr);
		var_dump($result);

		Use case 2
		SELECT * FROM table_name WHERE column_name = :column_name && column_name != :column_name:
			$arr_not= array('email'=>'ss@eeee.com');
			$arr['name'] = 'anderew';
			$result = $user->find_where($arr, $keys_not);
			
			var_dump($result);

		
		**/
		$keys = array_keys($data);
		$keys_not = array_keys($data_not);
		$query = "SELECT * FROM $this->table WHERE ";foreach ($keys as $key){
			$query .= $key . " = :".$key . " && ";
		}
		foreach ($keys_not as $key) {
			$query .= $key . " != :". $key . " && ";
		}

		$query = trim($query, " && ");

		$query .= " LIMIT $this->limit OFFSET $this->offset";
		// echo $query;
		$data = array_merge($data, $data_not);
		// show($this->query($query, $data));

		
		return $this->query($query, $data);
	}

	public function insert($data) {
		/** Remove unwanted data passed from arrray */
		if(!empty($this->allowedColumns)) {
			foreach ($data as $key=>$value) {
				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}
		$keys = array_keys($data);
		$query = "INSERT INTO $this->table (" . implode(", ", $keys) . ") VALUES (:" . implode(", :", $keys) . ")";
		// show($query);
		$this->query($query, $data);
		
		return false;
	}

	public function update($id, $data, $id_column = 'id') {
		/** Remove unwanted data passed from arrray */
		if(!empty($this->allowedColumns)) {
			foreach ($data as $key) {
				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}
		
		$keys = array_keys($data);
		$query = "UPDATE $this->table SET ";
		foreach ($keys as $key) {
			$query .= $key . " = :" . $key . ", ";
		}
		$query = trim($query, ", ");
		$query .= " WHERE $id_column = :$id_column ";
		$data[$id_column] = $id;
		$this->query($query, $data);

		return false;
	}

	public function delete($id, $id_column = 'id') {
		$data[$id_column] = $id;
		$query = "DELETE FROM $this->table WHERE $id_column = :$id_column";
		// $this->query($query, $data);
		show($query);
		
		return false;
	}

	public function find_any($data, $data_not=[]) {
		/* method retieves data using PDO statement:
		SELECT * FROM table_name WHERE id(column ) = :id(column ) OR column_name != :column_name:
		Pass the id(column ) as an array..
		Use case 1;
		
		$arr= array('name'=>'Sammsith');
		$arr['id'] = 5;
		$arr['email'] = "samw@sam.titi";

		$result = $user->find_where($arr);
		var_dump($result);

		Use case 2
		SELECT * FROM table_name WHERE column_name = :column_name OR column_name != :column_name:
			$arr_not= array('email'=>'ss@eeee.com');
			$arr['name'] = 'anderew';
			$result = $user->find_where($arr, $keys_not);
			
			var_dump($result);

		
		**/
		$keys = array_keys($data);
		$keys_not = array_keys($data_not);
		$query = "SELECT * FROM $this->table WHERE ";
		foreach ($keys as $key){
			$query .= $key . " = :".$key . " OR ";
		}
		foreach ($keys_not as $key) {
			$query .= $key . " != :". $key . " OR ";
		}

		$query = trim($query, " OR ");

		$query .= " LIMIT $this->limit OFFSET $this->offset";
		// echo $query;
		$data = array_merge($data, $data_not);
		// show($this->query($query, $data));
		$result = $this->query($query, $data);
		if($result) {
			return $result[0];
		}

		return false;
	}
}

// $db = new Database;
// $db->connect();

