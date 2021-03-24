<?php

require_once('../../../wp-config.php');

function i_denude($variable) 
{
  return(eregi_replace( "<br>", "\n", $variable)); 
} 

function i_denudef($variable)
{ 
  return(eregi_replace("<[^>]*>", "", $variable));
}

if ( $_GET['output'] == 'txt' ) 
{
	$my_id = $_GET['idx'];
	$cont_post = get_post($my_id); 
	$url = get_permalink($my_id);
	
	$title = $cont_post->post_title;
	$content = $cont_post->post_content;
		
	$value = "Exported from ".$url."\r\n";
	$value .= "Export date : ". date("D, j-M-Y G:i:s") ."\r\n";
	$value .= "___________________________________________________\r\n";
	$value .= "Title : ". $title."\r\n";
	$value .= "---------------------------------------------------\r\n";
	$value .= $content."\r\n";
	$value .= "---------------------------------------------------\r\n";    
	
	$PHPrint = ("$value"); 
	$PHPrint = i_denude("$PHPrint"); 
	$PHPrint = i_denudef("$PHPrint");
	$PHPrint = str_replace( "</font>", "", $PHPrint ); 
	$PHPrint = stripslashes("$PHPrint"); 
	
	$titletxt = preg_replace(array('/[ ]+/','/[^a-zA-Z0-9-]/'),
				array('-',''),trim(get_option('blogname') . '-' . $title));
	$length = strlen($PHPrint);
	
	header ("Content-Type: text/plain"); 
	header ("Content-Length: {$length}"); 
	header ("Content-Disposition: attachment;filename={$titletxt}.txt");
	
	echo $PHPrint; 
	exit;
}
else if ( $_GET['output'] == 'htm' ) 
{
  	$my_id = $_GET['idx'];
	$cont_post = get_post($my_id); 
	$url = get_permalink($my_id);
		
	$title = $cont_post->post_title;
	$content = $cont_post->post_content;
	
	$titlehtm = preg_replace(array('/[ ]+/','/[^a-zA-Z0-9-]/'),
				array('-',''),trim(get_option('blogname') . '-' . $title));
	
	$value =
		'
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<title>'.$titlehtm.'</title>
		<style type="text/css" media="all">
			body { 
				margin: 30px 30px 30px 30px; 
			}
			img {
				border:hidden;
				float:left;
			}
		</style>
		<style media="print" type="text/css">
			#hidden_{
				display:none;
			}
		</style>
		</head>
		<body>
		<div align="center">
		<table width="595" style="width:595px;" border="0"  bgcolor="#FFFFFF" cellspacing="1" cellpadding="5" >
			<tr>
				<td bgcolor="#FFFFFF" style="font-size:14px; color:#000000;">
					<p><h2>'.$title.'</h2></p>
				</td>
			</tr>
			<tr>
				<td  bgcolor="#FFFFFF" style="font-size:14px; color:#000000;">
					'.$content.'
				</td>
			</tr>
			<tr>
				<td bgcolor="#FFFFFF" style="font-size:12px; color:#000000">
	 				<div id="hidden_">
						<h3>
						<a href="javascript:window.print()">
							Print this Post
						</a>
						</h3>
					</div>
				</td>
			</tr>
			<tr>
				<td  bgcolor="#FFFFFF" style="font-size:12px; color:#000000;">
					<br>Export date : '. date("D, j M Y G:i:s") .'
					<br>Exported from [&nbsp;<a href="'.$url.'" target="_blank">'.$url.'</a>&nbsp;]<hr/>
				</td>
		  	</tr>
		</table>
		</div><br>
		</body>
		</html>
		';

    $PHPrint = ("$value"); 
    $length = strlen($PHPrint);

    header ("Content-Type: text/html"); 
    header ("Content-Length: {$length}"); 
	
    echo $PHPrint; 	
	exit;
}
else if ( $_GET['output'] == 'pdf' ) 
{
  	$my_id = $_GET['idx'];
	$cont_post = get_post($my_id); 
	$url = get_permalink($my_id);
	
	$title = $cont_post->post_title;
	$content = $cont_post->post_content;
	
	$titlepdf = preg_replace(array('/[ ]+/','/[^a-zA-Z0-9-]/'),
				array('-',''),trim(get_option('blogname') . '-' . $title));
	
  	$html = '
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>	
		<style type="text/css" media="all">
		body { 
		  background-color: transparent;
		  color: black;
		  font-family: "verdana", "sans-serif";
		  margin: 0px;
		  padding-top: 0px;
		  font-size: 1em;
		}
		table {
		  border-collapse: collapse;
		  border: 1pt solid black; 
		  margin-top: 2em; 
		}		
		table td {
		  border: 1pt solid black;
		}	
		thead {
		  background-color: #eeeeee;
		}		
		tbody {
		  background-color: #ffffee;
		}
		th,td {
		  padding: 3pt;
		}
		table.collapse {
		  margin-top: 2em;  
		  border:none;
		}		
		table.collapse td {
		  padding: 3pt;
		  border:none;
		}
		</style>
		</head>
		<body>
		<div id="body">
			<div id="content" style="padding: 0.2em 1% 0.2em 1%; min-height: 15em;">
				<table class="collapse">
					<tr>
						<td><img style="width: 120px; height:30px;" src="'.get_bloginfo('template_url').'/includes/logo.gif"/><td>
					</tr>
				</table>
				<table class="collapse" style="width: 100%; border-top: 1px solid black; border-bottom: 1px solid black; font-size: 8pt;">
					<tr>
						<td style="text-align: left">
							<strong>Exported from '.$url.'</strong>
						</td>
						<td style="text-align: right">
							<strong>export date : '.date("D, j M Y G:i:s").'</strong>
						</td>
					</tr>					
				</table>
				<br><br>
				<div class="title" style="font-size: 12pt">
					<strong>'.$title.'</strong>
				</div>
				<div class="page" style="font-size: 12pt">
					'.$content.'
				</div>
			</div>
		</div>
		</body>
		</html>
		';
		require_once("includes/dompdf/dompdf_config.inc.php");
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream($titlepdf, array("Attachment" => 0));
}
else if ( $_GET['output'] == 'doc' ) 
{  
    require_once('includes/html2doc.php');
	
 	$my_id = $_GET['idx'];
	$cont_post = get_post($my_id); 
	$url = get_permalink($my_id);
	
	$title = $cont_post->post_title;
	$content = $cont_post->post_content;
	
	$titledoc = preg_replace(array('/[ ]+/','/[^a-zA-Z0-9-]/'),
				array('-',''),trim(get_option('blogname') . '-' . $title));
    
	$objAuthor = get_userdata( $cont_post->post_author );
	$strPermalink = get_permalink( $cont_post->ID );
    
	if( $objAuthor->first_name || $objAuthor->last_name )
	{
		$strAuthor = $objAuthor->first_name .' '. $objAuthor->last_name . ' ' . $objAuthor->user_email;
	}
	else
	{
		$strAuthor = $objAuthor->user_nicename . ' ' . $objAuthor->user_email;
	}

	$strHtml = preg_replace("/<img[^>]+\>/i","",$strHtml); 
	$strHtml = '<p><img src="'.get_bloginfo('template_url').'/includes/logo.gif"/><br><br>';
	$strHtml .= 'Exported from ['.$url.']<br>';
	$strHtml .= 'Export date : '. date("D, j M Y G:i:s") .'</p><br>'; 
    $strHtml .= '<h1>' . $title . '</h1>' . wpautop( $content, true );

    $htmltodoc = new HTML_TO_DOC();
	$htmltodoc->setTitle($strAuthor);
	$htmltodoc->createDoc($strHtml,$titledoc . '.doc',$download=true);
}
	
?>