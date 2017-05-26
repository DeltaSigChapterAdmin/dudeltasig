<?php /* Template Name: AboutUs Template */ ?>
<!-- Page Content -->
<a  name="brothers"></a>
<div class="banner2">
<?php
    //Query posts to select all posts with this page's title category
    query_posts( 'category_name=brothers_title' );
	
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
query_posts( 'category_name=brothers_description' );

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


<?php
//Gather brothers information
//Declare array to store all brothers final slider HTML
$brotherArray = array();


//Path to brothers list download from google groups (Groups>Delta Sigma Phi Gamma Chi > Manage > Export)
$brotherListPath = get_bloginfo('template_url') . "/img/brotherSlider/deltasig-rx.csv";

//Used to skip first row of CSV data
$row = 1;

try
{
    //Try to open brothers list csv 
    if (($handle = fopen($brotherListPath, "r")) !== FALSE) {

        //While have brothers data
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            //Filter and format brother data 
            if($row != 1 && strtolower($data[1]) != "nickname" && strtolower($data[1]) != "chapter admin")
            {
                //Clear reused vars just to be safe
                $brotherSingleHTML = "";
                $nameFormatted = "";
                $brotherFirstName = "";
                $brotherLastName = "";

                //Remove bad chars from name (i.e. if email is used for display name)
                if (strpos($data[1], '.') !== FALSE || strpos($data[1], '@') !== FALSE) {
                    $nameFormatted = str_replace(str_split('@.'), ' ', $data[1]);
                    $nameFormatted = preg_replace('/[0-9]+/', '', $nameFormatted);

                }
                else {
                    $nameFormatted = $data[1];
                }

                //Break name into first and last name (Only works if first and last name are separated by a space)
                $nameSplit = explode(' ', $nameFormatted);
                $ct = 0;
                foreach ($nameSplit as $ns) {
                    $nameSplit[$ct] = ucfirst($ns);
                    $ct++;
                }
                $brotherFirstName = $nameSplit[0];
                $brotherLastName = $nameSplit[1];

                //Make unique id for brother HTML 
                $brotherID = strtolower($brotherFirstName . "_" . $brotherLastName);


                //Form brother image path
                if($GLOBALS['IS_PROD'])
                {
                    //FOR PRODUCTION
                    $brotherImgPath =  $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/dudeltasigWP/img/brotherSlider/img/' . strtoupper($brotherFirstName . "_" . $brotherLastName) . ".jpg";

                }
                else
                {
                    //FOR DEV
                    $brotherImgPath =  str_replace('apache2', 'apps/wordpress', $_SERVER['DOCUMENT_ROOT']) . '/wp-content/themes/dudeltasigWP/img/brotherSlider/img/' . strtoupper($brotherFirstName . "_" . $brotherLastName) . ".jpg";

                }

                //Uncomment below for image debug
                //echo $brotherImgPath;
                //var_dump(file_exists($brotherImgPath));

                //Checks if brother image exists, and if not replaces path with place holder path
                if(!file_exists($brotherImgPath))
                {
                    $brotherImgPath = get_bloginfo("template_url"). '/img/brotherSlider/img/man_placeholder.gif';
                }
                else
                {
                    $brotherImgPath = get_bloginfo("template_url"). '/img/brotherSlider/img/' . strtoupper($brotherFirstName . "_" . $brotherLastName) . ".jpg";
                }

                //Brother Slide Descriptions (NEED TO FIND SOLUTION FOR OBTAINING THIS INFO, maybe a google survey on the men page)
                $brotherDescr1 = $brotherFirstName . ' ' . $brotherLastName;
                $brotherDescr2 = $brotherFirstName . ' ' . $brotherLastName . ': Description 2';
                $brotherDescr3 = $brotherFirstName . ' ' . $brotherLastName . ': Description 3';

                //Brother Slide Settings
                $brotherSlideSettings = 'data-rowspan="2"';
                $brotherSlideSettings .= 'data-image-position="fill"';
                $brotherSlideSettings .= 'data-hover-effect="zoomOut"';
                $brotherSlideSettings .= 'data-caption-align="bottom"';
                $brotherSlideSettings .= 'data-caption-effect="fade"';
                $brotherSlideSettings .= 'data-caption-button="true"';

                //Build brother HTML
                $brotherSingleHTML = '<li ' . $brotherSlideSettings . ' >';
                $brotherSingleHTML .= '<a alt="' . $brotherFirstName . ' ' . $brotherLastName . '" href="' . $brotherImgPath . '" data-lightbox-group="gallery1" data-lightbox-thumb="'.  $brotherImgPath .'" title="' . $brotherDescr2 . '"/>';
                $brotherSingleHTML .= '<img src="' . $brotherImgPath . '"/></a>';
                $brotherSingleHTML .= '<div>' . 'PLACE 1' . '</div>';
                $brotherSingleHTML .= '<div  class="gs-content">content:' . $brotherFirstName . ' ' . $brotherLastName . '</div>';
                $brotherSingleHTML .= '<div  class="gs-hover">hover:' . $brotherFirstName . ' ' . $brotherLastName . '</div>';
                $brotherSingleHTML .= '</li>';   

                //Add brother HTML to brother array
                $brotherArray[$brotherID] = $brotherSingleHTML;
            }
            $row++;
        }
        //Close brother list csv
        fclose($handle);

        //Sort brothers alphabetically
        ksort($brotherArray);
    }
}
catch(Exception $e)
{
    //Error handling should be moved to logs for release
    var_dump($e);
}
?>

<div class="content-section-a">
<div class="sliderContainer">
        <!-- BEGIN jQuery Slider -->
    <div class="row">
        <div id="slider1" class="grid-slider">
            <ul class="gs-list">
                 
             <?php
                foreach($brotherArray as $sbHTML)
                {
                    echo $sbHTML;
                }

             ?>               
               
            </ul>
        </div>
    </div>
        <!-- END jQuery Slider -->
</div>
</div>