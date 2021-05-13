<?php
// Check for empty input login
function emptyInputLogin($email, $pwd) {
	$result;
	if (empty($email) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}


// Check if username is in database, if so then return data
function emailExists($conn, $email) {
  $sql = "SELECT * FROM admins WHERE adminEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../adminLogin.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);

	// "Get result" returns the results from a prepared statement
	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}





function loginAdmin($conn, $email, $pwd) {
	$emailExists = emailExists($conn, $email);

	if ($emailExists === false) {
		header("location: ../adminLogin.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $emailExists["adminPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if ($checkPwd === false) {
		header("location: ../adminLogin.php?error=wronglogin");
		exit();
	}
	elseif ($checkPwd === true) {
		session_start();
		$_SESSION["adminSession"] = $emailExists["adminId"];
		header("location: ../adminDash.php?error=none");
		exit();
	}
}
?>
