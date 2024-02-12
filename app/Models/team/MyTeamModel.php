<?php

class MyTeamModel {
    /*____________________________________*/
    /*_______________ TEAM _______________*/

    public function getTeamInfo($database, $teamId) {
        $teamQuery = $database->prepare("SELECT TeamID, TeamName, Email FROM team WHERE TeamId = ?");
        $teamQuery->execute([$teamId]);
     
        if ($teamQuery) {
            $teamData = $teamQuery->fetch(PDO::FETCH_ASSOC);

            return ($teamData) ? $teamData : false;
        } else {
            new AlertModel('error', 'Erreur : ' . $database->errorInfo());

            return false;
        }
    }






    /*_______________________________________*/
    /*_______________ MEMBERS _______________*/
    public function getMembers($database, $teamId) {
        $memberQuery = $database->prepare("SELECT Member1, Member2, Member3, Member4, Member5, Member6, Member7, Member8 FROM team WHERE TeamId = ?");
        $memberQuery->execute([$teamId]);
     
        if ($memberQuery) {
            $members = $memberQuery->fetch(PDO::FETCH_ASSOC);
            return ($members) ? $members : false;
        } else {
            new AlertModel('error', 'Erreur : ' . $database->errorInfo());

            return false;
        }
    }

    public function updateMembers($database, $teamId, $newMembers): void {
        // Update members
        $updateMembers = $database->prepare("UPDATE team SET Member1 = ?, Member2 = ?, Member3 = ?, Member4 = ?, Member5 = ?, Member6 = ?, Member7 = ?, Member8 = ? WHERE TeamId = ?");
        $updateMembers = $updateMembers->execute(array_merge($newMembers, [$teamId]));

        if ($updateMembers) {
            new AlertModel('success', 'La modification des membres a été effectuée.');

            header('Location: ' . ROOT.'mon-equipe');
            exit();
        } else {
            new AlertModel('error', 'La modification des membres a échoué.');
        }
    }




    /*_____________________________________*/
    /*_______________ VIDEO _______________*/

    public function getVideo($database, $teamId) {
        $videoQuery = $database->prepare("SELECT * FROM video LEFT JOIN team ON video.TeamID = team.TeamID WHERE video.TeamId = ?");
        $videoQuery->execute([$teamId]);

        if ($videoQuery) {
            $video = $videoQuery->fetch(PDO::FETCH_ASSOC);
            return ($video) ? $video : false;
        } else {
            new AlertModel('error', 'Erreur : ' . $database->errorInfo());

            return false;
        }
    }

    public function uploadVideo($database, $teamId, $data): void {
        $videoTitle = sanitizeFormData($data['videoTitle']);
        $videoDescription = sanitizeFormData($data['videoDescription']);
        $videoURL = sanitizeFormData($data['videoURL']);
        
        require('app/utilities/Patterns.php');

        if (preg_match($pattern_youtube, $videoURL)) {
            if (!empty($videoTitle) && !empty($videoDescription) && !empty($videoURL) && strlen($videoDescription) <= 255) {
                // Your code here
                $uploadVideoQuery = $database->prepare("INSERT INTO video (TeamID, VideoTitle, Description, VideoURL) VALUES (?, ?, ?, ?)");
                $uploadVideoQuery->execute([$teamId, $videoTitle, $videoDescription, $videoURL]);
    
                if ($uploadVideoQuery) {
                    new AlertModel('success', 'La vidéo ' . $videoTitle . ' a été téléchargée avec succès.');
                    header('Location: ' . ROOT . 'mon-equipe');
                    exit();
                } else {
                    new AlertModel('error', 'Le téléchargement de la vidéo a échoué.');
                }
            } else {
                new AlertModel('error', 'Veuillez renseigner tous les champs. La description ne doit pas dépasser les 255 caractères.');
            }
        } else {
            new AlertModel('error', 'Veuillez fournir une URL de vidéo valide.');
        }
    }


    public function updateVideo($database, $teamId, $data): void {
        $videoURL = sanitizeFormData($data['videoURL']);
        $videoTitle = sanitizeFormData($data['videoTitle']);
        $videoDescription = sanitizeFormData($data['videoDescription']);
        $videoId = sanitizeFormData($data['videoID']);

        $updateVideoQuery = $database->prepare("UPDATE video SET VideoTitle = ?, Description = ? WHERE TeamID = ? AND VideoID = ?");
        $updateVideoQuery->execute([$videoTitle, $videoDescription, $teamId, $videoId]);

        if ($updateVideoQuery) {
            new AlertModel('success', 'Les informations de la vidéo ' . $videoTitle . ' ont étés mises à jour');
            $_SESSION['video']['title'] = $videoTitle;
            $_SESSION['video']['id'] = $videoId;
            $_SESSION['video']['description'] = $videoDescription;
            $_SESSION['video']['url'] = $videoURL;
            $_SESSION['video']['teamId'] = $teamId;
            header('Location: ' . ROOT.'mon-equipe');
            exit();
        } else {
            new AlertModel('error', 'Impossible de mettre à jour la vidéo ' . $videoTitle . '.');
        }
    }
       

    public function deleteVideo($database, $teamId, $videoId): void {
        $deleteVideoQuery = $database->prepare("DELETE FROM video WHERE TeamID = ? AND VideoID = ?");
        $deleteVideoQuery->execute([$teamId, $videoId]);

        if ($deleteVideoQuery) {
            new AlertModel('success', 'La suppression de la vidéo a effectuée.');
            unset($_SESSION['video'], $video);
            header('Location: ' . ROOT.'mon-equipe');
            exit();
        } else {
            new AlertModel('error', 'La suppression de la vidéo a échoué.');
        }
    }
}

?>
