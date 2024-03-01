<?php
class User
{
    function __construct()
    {
    }
    function auth($phone, $password)
    {
        global $con;
        $phone = mysqli_escape_string($con, $phone);
        $password = mysqli_escape_string($con, $password);
        $qAuthUser = $con->query("SELECT * FROM users WHERE phone='$phone' AND password='$password'");
        return $qAuthUser->fetch_assoc();
    }
    function getById(int $id)
    {
        global $con;
        $qUser = $con->query("SELECT * FROM users WHERE id=$id");
        if (!$qUser) return false;

        return $qUser->fetch_assoc();
    }
    function search(string $query)
    {
        global $con;
        $query = mysqli_escape_string($con, $query);
        $res = [];
        $qSearchUsers = $con->query("SELECT * FROM users WHERE name LIKE '%$query%' OR phone LIKE '%$query%'");

        while ($user = $qSearchUsers->fetch_assoc()) array_push($res, $user);

        return $res;
    }

    function exists(string $phone)
    {
        global $con;
        $phone = mysqli_escape_string($con, $phone);
        $qUser = $con->query("SELECT * FROM users WHERE phone='$phone'");
        return $qUser->num_rows;
    }
    function list()
    {
        global $con;
        $res = [];
        $qUsers = $con->query("SELECT * FROM users ORDER BY id DESC");
        if (!$qUsers) return false;
        while ($user = $qUsers->fetch_assoc()) array_push($res, $user);
        return $res;
    }
    function update(int $id, array $data)
    {
        global $con;
        $formated = formatQuery(['name', 'phone', 'password'], $data);
        $query = "UPDATE users SET $formated WHERE id=$id";
        $qUpdateUser = $con->query($query);
        return $qUpdateUser;
    }
    function create($name, $phone, $password)
    {
        global $con;
        $name = mysqli_real_escape_string($con, $name);
        $phone = mysqli_real_escape_string($con, $phone);
        $password = mysqli_real_escape_string($con, $password);
        $qCreateUser = $con->query("INSERT INTO users (name, phone, password) VALUES ('$name', '$phone', '$password')");
        if (!$qCreateUser) return false;
        return $con->insert_id;
    }
    function delete(int $id)
    {
        global $con;
        $qDeleteUser = $con->query("DELETE FROM users WHERE id=$id");
        $qDeleteParticipant = $con->query("DELETE FROM participants WHERE user_id=$id");
        return $qDeleteUser && $qDeleteParticipant;
    }
}
