<?php /* Template Name: AboutUs Template */ ?>
<!-- Page Content -->
<a  name="recruitment"></a>
<div class="banner2">
<?php
    //Query posts to select all posts with this page's title category
    query_posts( 'category_name=recruitment_title' );
	
	//Start the loop
	while ( have_posts() ) : the_post();
		$htmlString = ' <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>' . get_the_title() . '</h2>
                    <h3>' . get_the_content() . '</h3>
                </div>
            </div>
        </div>
        <!-- /.container -->';
	
	endwhile;
	
	echo $htmlString;
	$htmlString = "";
	?>
</div>
<!-- /.banner -->


    <!-- BEGIN Description -->
<?php

//Get this pages description
query_posts( 'category_name=recruitment_description' );

//Start the loop
while ( have_posts() ) : the_post();
    $htmlString = '<div class="content-section-a">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pageDescription">
                        <span>' . get_the_content() . '</span>
                    </div>
                </div>
            </div>
            <!-- /.container -->
            </div>';

endwhile;

echo $htmlString;
$htmlString = "";
?>

    <!-- END Description -->

    <!-- BEGIN  Recruitment Schedule -------------------------------------------------------->
<?php

//Get the Recruitment Schedule Title
query_posts( 'category_name=recruitment_events_title' );
$htmlString = "";
while(have_posts() ) : the_post();
    $htmlString = '<div class="content-section-a"><div class="container text-center"><div class="row"><div class="col-md-12"><h2>'. get_the_content() .'</h2></div></div>';
endwhile;
echo $htmlString;


//Get the Recruitment Schedule
query_posts( 'category_name=recruitment_event' );

$array = array();

//Start the loop
while ( have_posts() ) : the_post();
    $htmlString = "";
    $htmlString = '<hr />
                    <div class="row">
                        <div class="col-md-6">
                            <span>' . get_field('event_name')  . ' - ' .  get_field('event_date')  . '</span>
                        </div>
                        <div class="col-md-6">
                            <span>' . get_field('event_time') . '</span>
                            <p>' . get_field('event_description') . '</p>
                        </div>
                    </div>';

    //ADD EVENT TO ARRAY WITH INDEX = TAG ---------
    //Get event's tags
    $posttags = get_the_tags();
    if ($posttags) {
        foreach($posttags as $tag) {
            //Check if the tag length is 1
            //Posts are ordered by a number tag
            //IMPORTANT: There should only be one 1 digit tag per post and no more than 9 posts per category...
            //if there are more than 9 posts per category only 9 can show up (those should be tagged 1-9 accordingly...
            //all other posts not tagged or with a tag greater than 9 will not be shown.
            if(strlen($tag->name) == 1)
            {
                //Convert the tag to an integer and assign its value to $key
                $key = intval($tag->name);
            }
        }
    }
    //Add post's htmlString to array with an index equal to the tag (the tag that is a single digit)
    $array[$key] = $htmlString;

endwhile;
//Sort array by keys/index in ascending order (1-9)
ksort($array);

//Print each post's html
foreach($array as $k => $v)
{
    echo $v;
}
echo '</div></div>';

?>

    <!-- END Recruitment Schedule -------------------------------------------------------->

<?php
query_posts( 'category_name=recruitment' );

//Init variables that exist outside of the loop
$count = 1;
$array = array();

//Start the loop
while ( have_posts() ) : the_post();

    //Wipe these variables on each iteration
    $htmlString = "";
    $key = 0;

    //Declare Classes for Alternating Sections
    if($count%2 == 0)
    {
        $contentClasses = ["content-section-b", "sameHeight col-lg-6 col-sm-push-6  col-sm-6"];
        $imageClasses = ["imageContainer sameHeight col-lg-5 col-sm-pull-6  col-sm-6"];
    }
    else
    {
        $contentClasses = ["content-section-a", "sameHeight col-lg-6 col-sm-6"];
        $imageClasses = ["imageContainer sameHeight col-lg-5 col-lg-offset-1 col-sm-6"];
    }

    //Start Composing Sub-Section HTML with Alternating Classes
    $htmlString = '<div class="'. $contentClasses[0] .'"><div class="container"><div class="row"><div class="'. $contentClasses[1] .'">';
    //Add Sub-Section Heading (same for both styles)
    $htmlString .= '<div class="clearfix"></div><h2 class="section-heading text-center text-capitalize">' . get_the_title() . '</h2>';

    //Get And Format Sub-Section Content
    $contentArray = explode(PHP_EOL, get_the_content());
    //OPEN subsection content div
    $htmlString .= '<div class="subsection_content">';
    foreach ($contentArray as $c)
    {
        $htmlString .= '<p class="lead">'  . $c . '</p>';
    }
    //CLOSE subsection content and outer divs
    $htmlString .= '</div></div>';

    //Compose Image HTML
    $htmlString .= '<div class="'. $imageClasses[0] .'">';
    $htmlString .= '<img class="img-responsive" src="' . get_field("Image") .'" alt="' . get_the_title() . '"></div></div></div><!-- /.container --></div><!-- /.content-section-a -->';


    //ADD POST TO ARRAY WITH INDEX = TAG ------------------------------------------------------------------------------------------------------
    //Get post's tags
    $posttags = get_the_tags();
    if ($posttags) {
        foreach($posttags as $tag) {
            //Check if the tag length is 1
            //Posts are ordered by a number tag
            //IMPORTANT: There should only be one 1 digit tag per post and no more than 9 posts per category...
            //if there are more than 9 posts per category only 9 can show up (those should be tagged 1-9 accordingly...
            //all other posts not tagged or with a tag greater than 9 will not be shown.
            if(strlen($tag->name) == 1)
            {
                //Convert the tag to an integer and assign its value to $key
                $key = intval($tag->name);
            }
        }
    }
    //Add post's htmlString to array with an index equal to the tag (the tag that is a single digit)
    $array[$key] = $htmlString;

    //Increment $count (used to trigger alternating layouts)
    $count = $count + 1;

endwhile;

//Sort array by keys/index in ascending order (1-9)
ksort($array);

//Print each post's html
foreach($array as $k => $v)
{
    echo $v;
}


?>