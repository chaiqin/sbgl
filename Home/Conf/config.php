<?php
return array(
	//'配置项'=>'配置值'
    'SESSION_AUTO_START' =>false,
    
        //smarty配置	 
    'TMPL_ENGINE_CONFIG'=>array( 
    'caching'=>false,
	'template_dir' => 'Home/View',
	'compile_dir' => TEMP_PATH.'Home',
	'cache_dir' => CACHE_PATH.'Home',
	'left_delimiter' => '<{',
	'right_delimiter' => '}>',
    )
);