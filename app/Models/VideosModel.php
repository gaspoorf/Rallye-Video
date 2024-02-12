<?php
//____________ Videos MODEL ____________
class VideosModel {

    //____________ GET DATA ____________
    public function getVideosData($database) {
        $query = "SELECT Video.*, Team.TeamName FROM video LEFT JOIN team ON video.TeamID = team.TeamID";

        $statement = $database->prepare($query);
        $statement->execute();
        $teamsVideos = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $teamsVideos;
    }
}

?>