<?php
if (!defined("CONF")) require_once("conf.inc.php");

session_start();
function requiredNotUserLogin()
{
    if (isset($_SESSION['logged_e_user'])) die(header("Location: /"));
}

function requiredNotLogin()
{
    if (isset($_SESSION['logged_e_user'])) die(header("Location: /"));
}


function issetPostFields(array $fields)
{
    foreach ($fields as $field)
        if (!in_array($field, array_keys($_POST)))
            return false;
    return true;
}
function requiredModLogin()
{
    if (!isset($_SESSION['logged_mod'])) die(header("Location: /t21/admin/login"));
}

function requiredLogin()
{
    if (!isset($_SESSION['logged_e_user'])) die(header("Location: /t21/login"));
}
function dateNow()
{
    return date("d/m/Y");
}
function timeNow()
{
    return date("h:i:s");
}
function dumpError($query)
{
    global $con;
    var_dump(mysqli_error($con, $query));
}

function authMod($username, $password)
{
    global $con;
    $username = mysqli_escape_string($con, $username);
    $password = mysqli_escape_string($con, $password);
    $qAuthMod = $con->query("SELECT * FROM mods WHERE username='$username' and password='$password'");
    return $qAuthMod->fetch_assoc();
}

function authUser($phone, $password)
{
    global $con;
    $phone = mysqli_escape_string($con, $phone);
    $password = mysqli_escape_string($con, $password);
    $qAuthUser = $con->query("SELECT * FROM users WHERE phone='$phone' AND password='$password'");
    return $qAuthUser->fetch_assoc();
}

///////////////////////// GETTERS /////////////////////////////////////
function getUserById(int $id)
{
    global $con;
    $qUser = $con->query("SELECT * FROM users WHERE id=$id");
    if (!$qUser) return false;

    return $qUser->fetch_assoc();
}

function searchUsers(string $query)
{
    global $con;
    $query = mysqli_escape_string($con, $query);
    $res = [];
    $qSearchUsers = $con->query("SELECT * FROM users WHERE name LIKE '%$query%' OR phone LIKE '%$query%'");

    while ($user = $qSearchUsers->fetch_assoc()) array_push($res, $user);

    return $res;
}

function searchParticipants(int $challengeId, string $query)
{
    global $con;
    $query = mysqli_escape_string($con, $query);
    $res = [];
    $qSearchUsers = $con->query("SELECT p.user_id, u.name, p.id, p.votes FROM users u LEFT JOIN participants p ON u.id = p.user_id WHERE name like '%$query%' AND p.challenge_id=$challengeId");

    while ($user = $qSearchUsers->fetch_assoc()) array_push($res, $user);

    return $res;
}


function userExists(string $phone)
{
    global $con;
    $phone = mysqli_escape_string($con, $phone);
    $qUser = $con->query("SELECT * FROM users WHERE phone='$phone'");
    return $qUser->num_rows;
}

function getParticipantById(int $id)
{
    global $con;
    $qParticipant = $con->query("SELECT * FROM participants WHERE id=$id");
    if (!$qParticipant) return false;
    return $qParticipant->fetch_assoc();
}

function isParticipating(int $userId, int $challengeId, int $phase = 1)
{
    global $con;
    $qParticipant = $con->query("SELECT * FROM participants WHERE user_id=$userId AND challenge_id=$challengeId");
    if (!$qParticipant) return false;
    if ($qParticipant->num_rows == 0) return false;
    return $qParticipant->fetch_assoc();
}
function isParticipant(int $userId)
{
    global $con;
    $qParticipant = $con->query("SELECT * FROM participants WHERE user_id=$userId");
    if (!$qParticipant) return false;
    return $qParticipant->num_rows;
}


function getChallengeById(int $id)
{
    global $con;
    $qChallenge = $con->query("SELECT * FROM challenges WHERE id=$id");
    if (!$qChallenge) return false;
    return $qChallenge->fetch_assoc();
}

function getWinnerById(int $id)
{
    global $con;
    $qWinner = $con->query("SELECT * FROM winners WHERE id=$id");
    if (!$qWinner) return false;
    return $qWinner->fetch_assoc();
}

function getModById(int $id)
{
    global $con;
    $qMod = $con->query("SELECT * FROM mods WHERE id=$id");
    if (!$qMod) return false;
    return $qMod->fetch_assoc();
}


function getModByUsername(string $username)
{

    global $con;
    $username = mysqli_escape_string($con, $username);
    $qMod = $con->query("SELECT * FROM mods WHERE username='$username'");
    if (!$qMod) return false;
    return $qMod->fetch_assoc();
}

function getImageById(int $id)
{
    global $con;
    $qImage = $con->query("SELECT * FROM images WHERE id=$id");
    if (!$qImage) return false;
    return $qImage->fetch_assoc();
}

function getUserImages(int $userId, int $challengeId, int $challengePhase)
{

    global $con;
    $qImages = $con->query("SELECT DISTINCT * FROM images WHERE user_id=$userId AND challenge_id=$challengeId AND challenge_phase=$challengePhase GROUP BY path ORDER BY ordem ASC");
    $res = [];
    if (!$qImages) return false;
    while ($image = $qImages->fetch_assoc()) array_push($res, $image);
    return $res;
}
function getParticipantImages(int $id, int $challengeId, int $challengePhase = 1)
{
    global $con;
    $res = [];
    $qImages = $con->query("SELECT DISTINCT * FROM images WHERE participant_id=$id AND challenge_id=$challengeId AND challenge_phase=$challengePhase GROUP BY path ORDER BY ordem ASC");

    if (!$qImages) return false;
    while ($image = $qImages->fetch_assoc()) array_push($res, $image);
    return $res;
}

function getChallenges()
{
    global $con;
    $res = [];
    $qChallenges = $con->query("SELECT * FROM challenges ORDER BY id DESC");
    if (!$qChallenges) return false;
    while ($challenge = $qChallenges->fetch_assoc()) array_push($res, $challenge);
    return $res;
}

function getChallengesClients()
{
    global $con;
    $res = [];
    $qChallenges = $con->query("SELECT * FROM challenges WHERE type = 1 ORDER BY id DESC");
    if (!$qChallenges) return false;
    while ($challenge = $qChallenges->fetch_assoc()) array_push($res, $challenge);
    return $res;
}

function getChallengesInitial($idUser)
{
    global $con;
    $res = [];
    $qChallenges = $con->query("SELECT * FROM challenges ORDER BY id DESC");
    if (!$qChallenges) return false;
    while ($challenge = $qChallenges->fetch_assoc()) array_push($res, $challenge);
    return $res;
}


function getActiveChallenges()
{
    global $con;
    $res = [];
    $qChallenges = $con->query("SELECT * FROM challenges WHERE active=1 ORDER BY id DESC");
    if (!$qChallenges) return false;
    while ($challenge = $qChallenges->fetch_assoc()) array_push($res, $challenge);
    return $res;
}


function getUsers()
{
    global $con;
    $res = [];
    $qUsers = $con->query("SELECT * FROM users ORDER BY id DESC");
    if (!$qUsers) return false;
    while ($user = $qUsers->fetch_assoc()) array_push($res, $user);
    return $res;
}

function getMods()
{
    global $con;
    $res = [];
    $qMods = $con->query("SELECT * FROM mods ORDER BY id DESC");
    if (!$qMods) return false;
    while ($mod = $qMods->fetch_assoc()) array_push($res, $mod);
    return $res;
}




function getChallengeParticipants(int $id, bool $strict)
{
    global $con;
    $res = [];
    $query = ($strict ?
        "SELECT DISTINCT p.id, p.user_id, p.votes FROM participants p, images i WHERE p.id = i.participant_id AND i.challenge_phase = 2 AND p.challenge_id = $id"
        :
        "SELECT * FROM participants WHERE challenge_id=$id ORDER BY id DESC");
    $qParticipants = $con->query($query);
    if (!$qParticipants) return false;
    while ($participant = $qParticipants->fetch_assoc()) array_push($res, $participant);
    return $res;
}

function excludeChallengeParticipant(int $id, int $modId, int $challengeId)
{
    global $con;
    $qExclude = $con->query("INSERT INTO mod_participant_excludes (mod_id, participant_id, challenge_id) VALUES ($modId, $id, $challengeId)");
    return $qExclude;
}

function getChallengeModWinner(int $id, int $modId)
{
    global $con;
    $qChallengeModWinner = $con->query("SELECT * FROM mod_participant_winners WHERE mod_id=$modId and challenge_id=$id");
    return $qChallengeModWinner ? $qChallengeModWinner->fetch_assoc() : false;
}

function setChallengeModWinner(int $id, int $modId, int $participantId)
{
    global $con;
    $qChallengeModWinner = $con->query("INSERT INTO mod_participant_winners (challenge_id, mod_id, participant_id) VALUES ($id, $modId, $participantId)");
    return $qChallengeModWinner;
}

function getChallengeWinners(int $id)
{
    global $con;
    $res = [];
    $qWinners = $con->query("SELECT w.id, u.name, w.participant_id FROM mod_participant_winners w LEFT JOIN participants p ON p.id = w.participant_id LEFT JOIN users u ON p.user_id = u.id WHERE w.challenge_id=$id");
    if (!$qWinners) return false;
    while ($winner = $qWinners->fetch_assoc()) array_push($res, $winner);
    return $res;
}

function getVote(int $modId, int $participantId)
{
    global $con;
    $qVote = $con->query("SELECT * FROM votes WHERE mod_id=$modId and participant_id=$participantId");
    return $qVote->num_rows;
}

///////////////////////// END GETTERS /////////////////////////////////////

function modAlreadyVoted(int $id, int $challengeId)
{
    global $con;
    $qVote = $con->query("SELECT * FROM votes WHERE mod_id=$id AND challenge_id=$challengeId");
    return $qVote->num_rows;
}
function formatQuery(array $validKeys, array $data)
{
    global $con;
    foreach (array_keys($data) as $key) {

        if (!in_array($key, $validKeys)) {

            return false;
        }
    }
    $formated = "";
    foreach ($data as $key => $value) {

        $value = mysqli_real_escape_string($con, $value);
        $key = mysqli_real_escape_string($con, $key);
        $formated .= " $key='$value'";
        if ($key != array_key_last($data)) {
            $formated .= ", ";
        }
    }
    return $formated;
}

function updateUser(int $id, array $data)
{
    global $con;
    $formated = formatQuery(['name', 'phone', 'password'], $data);
    $query = "UPDATE users SET $formated WHERE id=$id";
    $qUpdateUser = $con->query($query);
    return $qUpdateUser;
}

function updateChallenge(int $id, array $data)
{
    global $con;
    $formated = formatQuery(['title', 'description', 'phase', 'participants', 'active'], $data);
    $query = "UPDATE challenges SET $formated WHERE id=$id";
    $qUpdateChallenge = $con->query($query);
    return $qUpdateChallenge;
}

function updateMod(int $id, array $data)
{
    global $con;
    $formated = formatQuery(['master', 'name', 'username', 'password'], $data);
    $query = "UPDATE mods SET $formated WHERE id=$id";
    $qUpdateMod = $con->query($query);
    return $qUpdateMod;
}


function updateParticipant(int $id, array $data)
{
    global $con;
    $formated = formatQuery(['votes'], $data);
    $query = "UPDATE participants SET $formated WHERE id=$id";
    $qUpdateParticipant = $con->query($query);
    return $qUpdateParticipant;
}

/////////////////////////////////////////////////////////////////////////////

function createUser($name, $phone, $password)
{
    global $con;
    $name = mysqli_real_escape_string($con, $name);
    $phone = mysqli_real_escape_string($con, $phone);
    $password = mysqli_real_escape_string($con, $password);
    $qCreateUser = $con->query("INSERT INTO users (name, phone, password) VALUES ('$name', '$phone', '$password')");
    if (!$qCreateUser) return false;
    return $con->insert_id;
}

function createMod($name, $username, $password)
{
    global $con;
    $name = mysqli_real_escape_string($con, $name);
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);
    $qCreateMod = $con->query("INSERT INTO mods (name, username, password) VALUES ('$name', '$username', '$password')");
    return $qCreateMod;
}

function createChallenge($title, $description)
{
    global $con;
    $date = dateNow();
    $title = mysqli_real_escape_string($con, $title);
    $description = mysqli_real_escape_string($con, $description);
    $qCreateChallenge = $con->query("INSERT INTO challenges (title, description, start_date) VALUES ('$title', '$description', '$date')");
    return $qCreateChallenge;
}


function createParticipant(int $userId, int $challengeId)
{
    global $con;
    $date = dateNow();
    $qCreateParticipant = $con->query("INSERT INTO participants (user_id, challenge_id, start_date) VALUES ($userId, $challengeId, '$date')");
    $id = $con->insert_id;
    if (!$qCreateParticipant) return false;

    $qUpdateChallenge = $con->query("UPDATE challenges SET participants = participants + 1 WHERE id=$challengeId");
    if (!$qUpdateChallenge) {

        return false;
    }
    return $id;
}

function createWinner(int $userId, int $challengeId, int $position)
{
    global $con;
    $qCreateWinner = $con->query("INSERT INTO winners (user_id, challenge_id, position) VALUES ($userId, $challengeId, $position)");
    return $qCreateWinner;
}

function createImage(int $participantId, int $challengeId, int $challengePhase, $file, $file2, $ordem)
{
    global $con;
    $file = mysqli_escape_string($con, $file);
    $userId = getParticipantById($participantId)['user_id'];
    $qCreateImage = $con->query("INSERT INTO images (user_id, participant_id, challenge_id, challenge_phase, path, path2, ordem, created_by) VALUES ('$userId', '$participantId', '$challengeId', '$challengePhase', '$file', '$file2', $ordem, $userId)");
    return $qCreateImage;
}

function createVote(int $modId, int $participantId)
{
    global $con;
    $challengeId = getParticipantById($participantId)['challenge_id'];
    $qCreateVote = $con->query("INSERT INTO votes (mod_id, participant_id, challenge_id) VALUES ('$modId', '$participantId', '$challengeId')");
    $participant = getParticipantById($participantId);
    $updateParticipant = updateParticipant($participantId, [
        'votes' => intval($participant['votes']) + 1,
    ]);
    if (!$updateParticipant) return false;
    return $qCreateVote;
}

function deleteChallenge(int $challengeId)
{
    global $con;
    $qDeleteChallenge = $con->query("DELETE FROM challenges WHERE id=$challengeId");
    // $con->query("DELETE FROM votes WHERE challenge_id=$challengeId");
    // $con->query("DELETE FROM participants WHERE challenge_id=$challengeId");
    // $con->query("DELETE FROM images WHERE challenge_id=$challengeId");
    return $qDeleteChallenge;
}

function deleteMod(int $modId)
{
    global $con;
    $qDeleteMod = $con->query("DELETE FROM mods WHERE id=$modId");
    return $qDeleteMod;
}

function deleteUser(int $userId)
{
    global $con;
    $qDeleteUser = $con->query("DELETE FROM users WHERE id=$userId");
    $qDeleteParticipant = $con->query("DELETE FROM participants WHERE user_id=$userId");
    return $qDeleteUser && $qDeleteParticipant;
}
function validImages(array $photos)
{
    $validExts = ["png", "jpg", "jpeg"];
    $validTypes = ["image/png", "image/jpeg"];

    for ($index = 0; $index < count($photos["name"]); $index++) {
        $ext = end(explode(".", $photos["name"][$index]));
        $type = $photos["type"][$index];

        if (!in_array($type, $validTypes) || !in_array($ext, $validExts)) {
            return false;
        }
    }
    return true;
}

function uploadImages(array $photos, int $participantId, int $challengeId, int $challengePhase = 1)
{   
    if($challengePhase == 1){
        $initialCounter = 0;
  
        for ($index = $initialCounter; $index < count($photos["name"]); $index++) {
            $ext = end(explode(".", $photos["name"][$index]));
            $name = $photos["name"][$index];
            $tmp_name = $photos["tmp_name"][$index];
    
    
            $newName = md5($tmp_name) . ".$ext";
            $path = "./assets/img/challenges/$challengeId";
            $path2 = "https://fase2.planosecagordura.com.br/t21/assets/img/challenges/$challengeId";
            $dest = "$path/$newName";
            $dest2 = "$path2/$newName";
            if (!is_dir($path))
                mkdir($path);
            if (!move_uploaded_file($tmp_name, $dest)) return false; // ok i know
            else createImage($participantId, $challengeId, $challengePhase, $dest, $dest2, $index+1);
        }
        return true;
    } else if ($challengePhase == 2) {
        $initialCounter = 4;
  
        for ($index = 0; $index < count($photos["name"]); $index++) {
            $ext = end(explode(".", $photos["name"][$index]));
            $name = $photos["name"][$index];
            $tmp_name = $photos["tmp_name"][$index];
    
    
            $newName = md5($tmp_name) . ".$ext";
            $path = "./assets/img/challenges/$challengeId";
            $path2 = "https://fase2.planosecagordura.com.br/t21/assets/img/challenges/$challengeId";
            $dest = "$path/$newName";
            $dest2 = "$path2/$newName";
            if (!is_dir($path))
                mkdir($path);
            if (!move_uploaded_file($tmp_name, $dest)) return false; // ok i know
            else createImage($participantId, $challengeId, $challengePhase, $dest, $dest2, $initialCounter);
            $initialCounter++;
        }
        return true;
    }
    
}

function updateAuthorizesShowingPhotos($authorizes_showing_photos, int $participantId, int $challengeId)
{
    global $con;
    $qUpdateParticipants = $con->query("UPDATE participants SET authorizes_showing_photos = $authorizes_showing_photos WHERE id=$participantId AND challenge_id=$challengeId");
    if (!$qUpdateParticipants) {
        return false;
    }
    return true;
}

function getAllImages()
{
    global $con;
    $res = [];
    $qImages = $con->query("SELECT * FROM images");
    if (!$qImages) return false;
    while ($image = $qImages->fetch_assoc()) array_push($res, $image);
    return $res;
}

/////////////////////////////// SETTERS ////////////////////////////////////


/////////////////////////////// END SETTERS /////////////////////////////////

function compressImage(string $source, string $destination, int $quality)
{
    if (strpos($source, ".compressed")) return;
    $info = getimagesize($source);

    switch ($info['mime']) {
        case "image/jpeg":
            $image = imagecreatefromjpeg($source);
            break;
        case "image/gif":
            $image = imagecreatefromgif($source);
            break;
        case "image/png":
            $image = imagecreatefrompng($source);
            break;
        default:
            $image = imagecreatefromjpeg($source);
            break;
    }

    if (!imagejpeg($image, $destination, $quality)) {
        echo "ERROR $source -> $destination<br />";
    } else {
        echo "SUCCESS $source -> $destination<br />";
    }
}
