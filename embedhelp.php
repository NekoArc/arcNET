<?php
/*
 * This file is part of arcNET
 *
 * arcNET uses core code from Kusaba X and Oneechan
 *
 * tsukihi.me kusabax.cultnet.net oneechan.org
 *
 * arcNET is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * kusaba is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * kusaba; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * credits to jmyeom for improving this
 *
 */
include("config.php");
$options = '';
$embeds = $tc_db->GetAll("SELECT * FROM `" . KU_DBPREFIX . "embeds`");
foreach ($embeds as $embed) {
	if(file_exists(KU_ROOTDIR."inc/embedhelp/" . strtolower($embed['name']) .".jpg")){
		$options .= '<option value="' . $embed['name'] . '">' . $embed['name'] . '</option>\n';
	}
}
echo'
<html>
<head>

<title>How To Embed</title>

</head>
';
if ($options != '') {

echo '<div style= "position: absolute; left: 1px; top: 1px; text-align: center; margin-left: auto; visibility:visible; margin-right: auto; width:300px;">
<br />
<form name="embeds">
<select name="menu" onChange="document.getElementById(\'embedimg\').src=\'' . KU_WEBPATH . '/inc/embedhelp/\' + this.value.toLowerCase() + \'.jpg\';">
' . $options . '
</select>

</form>
<img id="embedimg" src="' . KU_WEBPATH . '/inc/embedhelp/' . strtolower($embeds[0]['name']) .'.jpg">
</div>
';
}
else {
	echo 'No embed help images found!';
}
echo'
</body>
</html>';
?>