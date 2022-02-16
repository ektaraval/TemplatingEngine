<?php
/*Generate Page*/
include_once 'header.php';
if(isset($_REQUEST['Mode'])){
	$Mode = $_REQUEST['Mode'];
}else{
	$Mode="";
}
switch($Mode){
	case "Display":
		ShowForm();
		ShowResult();
		break;
	default:
		ShowForm();
		break;
}
include_once 'footer.php';

/*To Show Form*/
function ShowForm(){
?>
	<form name="frm1" id="frm1" method="post" action="index.php?Mode=Display">
		<div class="row">	
			<div class="col-12 left"> Enter Name:</div>
		</div>
		<div class="row">
			<div class="col-12 left"> 
				<input type="text" class="ctrlSm" name="Name" id="Name" value="" size="50" placeholder="Enter Name">
			</div>
		</div>
		<div class="row">	
			<div class="col-12 left"> Is it week day?
				<input type="radio" name="isWeekDay" value=True checked="checked"> Yes
				<input type="radio" name="isWeekDay" value=false> No 
			</div>
		</div>
		<div class="row">	
			<div class="col-12 left"> Provide YAML:</div>
		</div>
		<div class="row">
			<div class="col-4 left"> 
				<textarea id="taYAML" name="taYAML" rows="10" cols="50" placeholder="Provide data input in YAML"></textarea>
			</div>
			<div class="col-8 left"> 
				 <b>For example:</b><br>#yaml<br>---<br>Name: !mytag Ekta<br>isWeekDay: !mytag True<br>	...
			</div>
		</div>
		<div class="row">
			<div class="col-12 left">
			<button type="submit" class="btnBlack" OnClick="SubmitForm();">Submit</button>
			<button type="button" class="btnBlack"  onclick="this.form.reset();">Cancel</button>
			</div>
		</div>
	</form>		
<?php
}

/* To show output*/
function ShowResult(){
	include_once 'template.php';
	$template = new Template;
	if(strlen(trim($_REQUEST['taYAML'])) > 0){
		$yamldata = yaml_parse($_REQUEST['taYAML'], 0);
		if(isset( $yamldata['Name']) && isset( $yamldata['isWeekDay'])){
			if(strlen(trim($yamldata['Name'])) > 0 && strlen(trim($yamldata['isWeekDay'])) > 0 ){
				$template->set('Name', $yamldata['Name']);
				$template->set('isWeekDay', $yamldata['isWeekDay']);
			}
		}
	}else{
		if(isset( $_REQUEST['Name']) && isset( $_REQUEST['isWeekDay'])){
			if(strlen(trim($_REQUEST['Name'])) > 0 && strlen(trim($_REQUEST['isWeekDay'])) > 0 ){
				$template->set('Name', $_REQUEST['Name']);
				$template->set('isWeekDay', $_REQUEST['isWeekDay']);
			}
		}
	}	
	echo("<p><div class='row'><div class='col-6 left'>");
	$template->render('template.html');
	echo("</div></div></p>");
}
?>
