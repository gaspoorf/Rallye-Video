<?php
//____________ ADMIN MODEL ____________
class AdminModel {

    //____________ GET DATA ____________
    public function getData($database) {
        $query = "SELECT team.*, video.VideoTitle, video.Description, video.VideoURL, video.UploadDate, video.VideoID  
                  FROM team 
                  LEFT JOIN video ON team.TeamID = video.TeamID";

        $statement = $database->prepare($query);
        $statement->execute();
        $teamsData = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $teamsData;
    }

    //____________ DELETE TEAM ____________
    public function deleteTeam($database, $teamId): void {
        $deleteTeamQuery = $database->prepare("DELETE FROM team WHERE TeamID = ?");
        $deleteTeamQuery->execute([$teamId]);

        if ($deleteTeamQuery) {
            new AlertModel('success', 'La suppression de l\'équipe ' . $teamId . ' a été effectuée.');

            header('Location: ' . ROOT.'admin');
            exit();
        } else {
            new AlertModel('error', 'La suppression de l\'équipe ' . $teamId . ' a échoué.');
        }
    }
}

?>