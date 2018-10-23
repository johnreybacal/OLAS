<ol class="breadcrumb">	
	<?php 
		$url = explode('/', uri_string());//boom
		$str = '';
		for($i = 0; $i < count($url); $i++){
			$str .= $url[$i].'/';
			if($i != count($url) - 1){
				echo '<li class="breadcrumb-item"><a href="'.base_url($str).'">'.$url[$i].'</a></li>';
			}else{
				echo '<li class="breadcrumb-item active">'.$url[$i].'</li>';
			}
		}
	?>	
</ol>