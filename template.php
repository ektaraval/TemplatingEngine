<?php
/*Class to set template data and to render template file*/
class Template
{
	private $data = array();
	/*To set template data*/
	public function set($key, $value){
		$this->data[$key] = $value;		
	}
	/*to render the template*/
	public function render($t_name){
		$path = 'template/' . $t_name;
		if(file_exists($path)){
			if(count($this->data) > 0){
				$content = file_get_contents($path);
				foreach($this->data as $key => $value){
					$content = preg_replace('/\{\{' . $key . '\}\}/', $value, $content);
					$content = preg_replace('/\{\{\#' . $key . '\}\}/', '<?php if(strtoupper($value)==\'TRUE\'){ ?> ', $content);	
					$content = preg_replace('/\{\{end\}\}/', '<?php } ?>', $content);
				}
				eval(' ?>' . $content . '<?php ');
			}else{
				echo("<div class='alert alert-danger'> Please provide all the information.</div>");
			}
		}else{
			echo("<div class='alert alert-danger'> File missing..</div>");
		}
	}
}
?>