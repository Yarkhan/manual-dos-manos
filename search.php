<?php 
ini_set('max_execution_time',1);
define('DOCPATH','docs/');

//Perform search using glob
function search($val)
{
	//in case $val contains internal links. Filter it out.
	$val = explode('#',$val);
	$val = strtolower(str_replace('_','-',is_array($val) ? $val[0]: $val));
	return glob(DOCPATH."*$val*");
}

//Perform search() according to $_GET['val']
if(!empty($_GET['val']))
{
	$results = search($_GET['val']);
	if(count($results) == 0)
	{
		echo 'No results';

	}else if(count($results) == 1){

		echo file_get_contents(array_pop($results));

	}else if($results ==2){
		//two files? Resolve which one by text similarity
		foreach($results as $result)
		{
			similar_text($result, DOCPATH.$_GET['val'],$percent);
			if($percent == 100)
			{
				echo file_get_contents($result);

				//though I don't expect two files with exactly 100% similarity,
				//I'm breaking anyway
				break;
			}
		}
	}else{
		echo json_encode($results);
	}
}