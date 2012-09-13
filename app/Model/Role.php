<?php
class Role extends AppModel {

	var $name = 'Role';

/* 	var $hasMany = array(
			'User' => array('className' => 'UserMeta',
								'foreignKey' => 'role_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			)
	); */

	var $hasAndBelongsToMany = array(
			'Module' => array('className' => 'Module',
						'joinTable' => 'roles_modules',
						'foreignKey' => 'role_id',
						'associationForeignKey' => 'module_id',
						'unique' => true,
						'conditions' => '',
						'fields' => '',
						'order' => 'module_id',
						'limit' => '',
						'offset' => '',
						'finderQuery' => '',
						'deleteQuery' => '',
						'insertQuery' => ''
			)
	);
	
	function outlook($role_id){
	
	    $role = $this->read(null, $role_id);
		$_m = "(";
		foreach ($role['Module'] as $module){
		   $_m .= $module['id'] . ',';
		}
		$_m .= '99999999)';
		
	
	    $outlook  = '	     var _menus = {"menus":[' ."\n";
		
		$modules = $this->Module->find('all', array('conditions' => "Module.parent_id is NULL AND (Module.type = 'system' OR Module.type = 'website') AND Module.id IN $_m"));
		
		$_i = sizeof($modules) - 1;
		
		foreach($modules as $i=>$m){
		    $outlook .= '						';
			$outlook .= ' {"menuid":"'. $m['Module']['id'] .'","icon":"'.$m['Module']['module_image'].'","menuname":"'.$m['Module']['name'].'",'."\n";
			
			$outlook .= '							';
			$outlook .= ' "menus":['."\n";
			
			//$trees = $this->children($m['Module']['id'], true);
			
			$trees = $this->Module->find('all', array('conditions' => "Module.parent_id = ".$m['Module']['id']." AND (Module.type = 'system' OR Module.type = 'website') AND Module.id IN $_m  ORDER BY Module.lft"));
			
			$_j = sizeof($trees) - 1;
			foreach($trees as $j=>$t){
			
			   $outlook .= '									';
			   if($t['Module']['type'] == 'website'){
			       $outlook .= ' {"menuid":"'.$t['Module']['id'].'","menuname":"'.$t['Module']['name'].'","icon":"'.$t['Module']['module_image'].'","url":"/admin/posts/manage/'.$t['Module']['id'].'/'.$t['Module']['name'].'"}';
			   }else{
			       $outlook .= ' {"menuid":"'.$t['Module']['id'].'","menuname":"'.$t['Module']['name'].'","icon":"'.$t['Module']['module_image'].'","url":"'.$t['Module']['url'].'"}';
			   }
			   
			   if($j != $_j){
			       $outlook .= ",\n";
			   }else{
			       $outlook .= "\n";
			   }
			   
			}
			
			$outlook .= '								';
			$outlook .= " ]\n";
			
			$outlook .= '						';
			if($i != $_i){
			    $outlook .= " },\n";
			}else{
			    $outlook .= " }\n";
			}

		}

		$outlook .= '				';
	    $outlook .= ' ]};';
		
		return $outlook;
	}		

}
?>