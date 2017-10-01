<?php
return array(
	//'配置项'=>'配置值'
    'THINK_PLUGIN_ON'      => true,
     
    //smarty配置	 
    'TMPL_ENGINE_CONFIG'=>array( 
    'caching'=>false,
	'template_dir' => 'Admin/View',
	'compile_dir' => TEMP_PATH.'Admin',
	'cache_dir' => CACHE_PATH.'Admin',
	'left_delimiter' => '<{',
	'right_delimiter' => '}>',
    )
);