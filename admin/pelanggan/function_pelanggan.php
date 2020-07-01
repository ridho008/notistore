<?php
require_once 'config/koneksi.php';

function ubah_pelanggan($data) {
	global $conn;
	$id = $_GET['id'];
	$nama_pelanggan = htmlspecialchars($data['nama_pelanggan']);
	$email = htmlspecialchars($data['email_pelanggan']);
	$password = htmlspecialchars($data['password_pelanggan']);
	$telepon = htmlspecialchars($data['telepon']);

	$query = $conn->query("UPDATE tb_pelanggan SET email_pelanggan = '$email', password_pelanggan = '$password', nama_pelanggan = '$nama_pelanggan', telepon_pelanggan = '$telepon' WHERE id_pelanggan = $id") or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}