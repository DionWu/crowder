<?php
		session_start();
		include 'database.php';
		$insertArray =  array( ':facebook', ':twitter', ':youtube',':googleplus',':wordpress',':instagram',':flickr',':blogger',':tumblr',':pinterest',':linkedinuser',':linkedincompany',':foursquare',':vine',':vimeo',':yelp',':livejournal',':reddit',':github',':stackoverflow',':spotify',':soundcloud',':rss');
	$updateSetArray =  array( 'facebook= :facebook2', 'twitter= :twitter2', 'youtube= :youtube2','googleplus= :googleplus2','wordpress= :wordpress2','instagram= :instagram2','flickr= :flickr2','blogger= :blogger2','tumblr= :tumblr2','pinterest= :pinterest2','linkedinuser= :linkedinuser2','linkedincompany= :linkedincompany2','foursquare= :foursquare2','vine= :vine2','vimeo= :vimeo2','yelp= :yelp2','livejournal= :livejournal2','reddit= :reddit2','github= :github2','stackoverflow= :stackoverflow2','spotify= :spotify2','soundcloud= :soundcloud2','rss= :rss2');
	$updateBindArray =  array( ':facebook2', ':twitter2', ':youtube2',':googleplus2',':wordpress2',':instagram2',':flickr2',':blogger2',':tumblr2',':pinterest2',':linkedinuser2',':linkedincompany2',':foursquare2',':vine2',':vimeo2',':yelp2',':livejournal2',':reddit2',':github2',':stackoverflow2',':spotify2',':soundcloud2',':rss2');


		$sql = "INSERT INTO customerSocial VALUES (:sessionID, ". implode(',',$insertArray) .") ON DUPLICATE KEY UPDATE " . implode(', ',$updateSetArray).")";

	echo $sql;


?>