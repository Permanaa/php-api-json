<?php
	$koneksi = mysqli_connect("localhost","root","","php-api");

	$id = isset($_GET["id"]) ? $_GET['id'] : '';

	$qry = mysqli_query($koneksi,"SELECT * FROM siswa");

	if($id != null){
		$qry = mysqli_query($koneksi,"SELECT * FROM siswa WHERE id='$id'");

		$respon = array();
		$respon["success"] = true;
		$respon["data"] = array();
		$respon["message"] = "Show data user succes";
		$respon["code"] = 200;

		while($row = mysqli_fetch_assoc($qry)){
			$data['id'] = $row["id"];
			$data['username'] = $row["username"];
			$data['password'] = $row["password"];
			$data['level'] = $row["level"];
			$data['fullname'] = $row["fullname"];

			array_push($respon["data"],$data);
		}

		echo json_encode($respon);
	}
	else if (mysqli_num_rows($qry) > 0) {


		$respon = array();
		$respon["success"] = true;
		$respon["data"] = array();
		$respon["message"] = "Show data user succes";
		$respon["code"] = 200;

		while($row = mysqli_fetch_assoc($qry)){
			$data['id'] = $row["id"];
			$data['username'] = $row["username"];
			$data['password'] = $row["password"];
			$data['level'] = $row["level"];
			$data['fullname'] = $row["fullname"];

			array_push($respon["data"],$data);
		}

		echo json_encode($respon);
	}
	else {
		$respon = array();
		$respon["success"] = true;
		$respon["data"] = array();
		$respon["message"] = "Data user not found";
		$respon["code"] = 204;
		echo json_encode($respon);
	}

  // $array = array();
	// while($data = mysqli_fetch_array($qry)){
	// 	$array[] = $data;
	// }
	//
	// echo json_encode($array);
 ?>
