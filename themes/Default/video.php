<?php
/***                                                                        ***\
	video.php                               Last Updated: 2003.08.19 (xris)

\***                                                                        ***/

class Theme_video extends Theme {

	function print_page() {
	// Print the main page header
		parent::print_header("MythWeb - Videos");
	// Print the page contents
		global $All_Shows;
?>

<table width="100%" border="0" cellpadding="4" cellspacing="2" class="list small">
<tr class="menu">
<?php	if (show_recorded_pixmap) { ?>
	<td>cover</td>
<?php	} ?>
	<td><a href="video.php?sortby=title">title</a></td>
	<td><a href="video.php?sortby=director">director</a></td>
	<td>plot</td>
	<td>rating</a></td>
	<td>IMDB</a></td>
	<td><a href="video.php?sortby=length">length</a></td>
	<td><a href="video.php?sortby=userrating">imdb&nbsp;rating</a></td>
	<td><a href="video.php?sortby=year">year</a></td>
</tr><?php
	$row = 0;
	foreach ($All_Shows as $show) {
	?><tr class="recorded">
	<td><?php
		if (show_recorded_pixmaps) {
			if (file_exists(video_img_path.'/'.basename($show->coverfile)))
				echo '<img id="'.$show->filename."\" src=\"".video_img_path.'/'.basename($show->coverfile).'" width="'.video_img_width.'" height="'.video_img_height.'">';
			else
				echo '&nbsp;';
		}
	?></td>
	<td><?php echo $show->title?></td>
	<td><?php echo $show->director?></td>
	<td><?php echo $show->plot?></td>
	<td><?php echo $show->rating?></td>
	<td><a href="http://www.imdb.com/Title?<?php echo $show->inetref?>"><?php echo $show->inetref?></a></td>
	<td nowrap><?php echo nice_length(($show->length*60))?></td>
	<td nowrap><?php echo $show->userrating?></td>
	<td nowrap><?php echo $show->year?></td>
<?php
		$row++;
	}
?>

</table>
<?php
	echo '<p align="right" style="padding-right: 75px">'.$row.' videos</p>';

	// Print the main page footer
		parent::print_footer();
	}

	function print_menu_content() {
		echo 'MythVideo';
	}
}

?>