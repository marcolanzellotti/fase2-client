<?php
class Image
{
    function getById(int $id)
    {
        global $con;
        $qImage = $con->query("SELECT * FROM images WHERE id=$id");
        if (!$qImage) return false;
        return $qImage->fetch_assoc();
    }
    function create(int $participantId, int $challengeId, int $challengePhase, $file)
    {
        global $con;
        $file = mysqli_escape_string($con, $file);
        $userId = getParticipantById($participantId)['user_id'];
        $qCreateImage = $con->query("INSERT INTO images (user_id, participant_id, challenge_id, challenge_phase, path) VALUES ('$userId', '$participantId', '$challengeId', '$challengePhase', '$file')");
        return $qCreateImage;
    }
    function upload(array $photos, int $participantId, int $challengeId)
    {
        for ($index = 0; $index < count($photos["name"]); $index++) {
            $ext = end(explode(".", $photos["name"][$index]));
            $name = $photos["name"][$index];
            $tmp_name = $photos["tmp_name"][$index];

            $newName = md5($name) . ".$ext";
            $path = "./assets/img/challenges/$challengeId";
            $dest = "$path/$newName";
            if (!is_dir($path))
                mkdir($path);
            if (!move_uploaded_file($tmp_name, $dest)) return false; // ok i know
            else createImage($participantId, $challengeId, getChallengeById($challengeId)['phase'], $dest);
        }
        return true;
    }
    function valid(array $photos)
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
    function list()
    {
        global $con;
        $res = [];
        $qImages = $con->query("SELECT * FROM images");
        if (!$qImages) return false;
        while ($image = $qImages->fetch_assoc()) array_push($res, $image);
        return $res;
    }
    function compress(string $source, string $destination, int $quality)
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
}
