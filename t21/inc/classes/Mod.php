<?php
class Mod
{
    function __construct()
    {
    }
    function auth($username, $password)
    {
        global $con;
        $username = mysqli_escape_string($con, $username);
        $password = mysqli_escape_string($con, $password);
        $qAuthMod = $con->query("SELECT * FROM mods WHERE username='$username' and password='$password'");
        return $qAuthMod->fetch_assoc();
    }
    function getById(int $id)
    {
        global $con;
        $qMod = $con->query("SELECT * FROM mods WHERE id=$id");
        if (!$qMod) return false;
        return $qMod->fetch_assoc();
    }
    function getByUsername(string $username)
    {

        global $con;
        $username = mysqli_escape_string($con, $username);
        $qMod = $con->query("SELECT * FROM mods WHERE username='$username'");
        if (!$qMod) return false;
        return $qMod->fetch_assoc();
    }
    function list()
    {
        global $con;
        $res = [];
        $qMods = $con->query("SELECT * FROM mods ORDER BY id DESC");
        if (!$qMods) return false;
        while ($mod = $qMods->fetch_assoc()) array_push($res, $mod);
        return $res;
    }
    function alreadyVoted(int $id, int $challengeId)
    {
        global $con;
        $qVote = $con->query("SELECT * FROM votes WHERE mod_id=$id AND challenge_id=$challengeId");
        return $qVote->num_rows;
    }
    function update(int $id, array $data)
    {
        global $con;
        $formated = formatQuery(['master', 'name', 'username', 'password'], $data);
        $query = "UPDATE mods SET $formated WHERE id=$id";
        $qUpdateMod = $con->query($query);
        return $qUpdateMod;
    }
    function create($name, $username, $password)
    {
        global $con;
        $name = mysqli_real_escape_string($con, $name);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);
        $qCreateMod = $con->query("INSERT INTO mods (name, username, password) VALUES ('$name', '$username', '$password')");
        return $qCreateMod;
    }
    function delete(int $id)
    {
        global $con;
        $qDeleteMod = $con->query("DELETE FROM mods WHERE id=$id");
        return $qDeleteMod;
    }
}
