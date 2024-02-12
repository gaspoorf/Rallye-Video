<?php
//____________ VIDEOS CONTROLLER ____________
class VideosController {
    //____________ VIDEOS VIEW ____________
    public function videosView() {
        // Utilities
        require('app/utilities/TruncateText.php');
        
        // Models
        require('app/models/Database.php');
        require('app/models/SignOut.php');

        require('app/models/VideosModel.php');
        $videos = new VideosModel();

        $teamsVideos = $videos->getVideosData($database);

        // Views
        require('resources/views/pages/videos_view.php');
    }
}

?>