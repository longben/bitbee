<?php
class Module extends AppModel {

	public $name = 'Module';
	
    public $actsAs = array('Tree');

	var $belongsTo = array(
			'Parent' => array('className' => 'Module',
								'foreignKey' => 'parent_id',
								'conditions' => 'Parent.id <> Module.id',
								'fields' => 'Module.id, Module.name',
								'order' => ''
			)
	);

	var $hasAndBelongsToMany = array(
			'Post' => array('className' => 'Post',
						'joinTable' => 'posts_modules',
						'foreignKey' => 'module_id',
						'associationForeignKey' => 'post_id',
						'unique' => true,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'finderQuery' => '',
						'deleteQuery' => '',
						'insertQuery' => ''
			),
			'Role' => array('className' => 'Role',
						'joinTable' => 'roles_modules',
						'foreignKey' => 'module_id',
						'associationForeignKey' => 'role_id',
						'unique' => true,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'finderQuery' => '',
						'deleteQuery' => '',
						'insertQuery' => ''
			)
	);


	/**
	 * 根据当前ID得到下级栏目
	 */
	function getChildModule($id) {
		$conditions = array(
			'conditions' => array('Module.parent_id' => $id, 'Module.type' => 'website', 'Module.flag' => 1),
			'recursive' => -1, //int
			'fields' => array('Module.id', 'Module.name', 'Module.display_style', 'Module.remark'),
			'order' => 'Module.ordering'
	    );
		return $this->find('all', $conditions);
	}
	
	
	function afterSave($created){
	    if($created){
			$module_id = $this->getLastInsertID();
		   
		    if(empty($this->data['Module']['parent_id'])){
				$sql = 'select count(*) as cnt 
						  from modules as Module
							  where Module.parent_id IS NULL ';
			}else{
				$sql = 'select count(*) as cnt 
						  from modules as Module
							  where Module.parent_id = '. $this->data['Module']['parent_id'];			
			}
						  
			$_data = $this->query($sql);

			if(empty($this->data['Module']['parent_id'])){
			   $_id = $_data[0][0]['cnt'] ;
			}else{
			   $_id = $this->data['Module']['parent_id']. str_pad($_data[0][0]['cnt'], 2 , "0", STR_PAD_LEFT);
			}
			
			$this->id = $this->data['Module']['parent_id'];
			$_hierarchy = $this->field('hierarchy') + 1;

			$this->query("update modules set id = $_id, hierarchy = $_hierarchy  where id =$module_id");
			
			if(!empty($this->data['Module']['parent_id'])){
				$this->query('update modules set node = 1 where id ='.$this->data['Module']['parent_id']);
			}
		}
	}
	
	function adminSave($data){

        $sql = 'select max(Module.id)+1 as id, count(*)+1 as cnt 
		          from modules as Module
    				  where Module.parent_id = '. $data['Module']['parent_id'];
		$_data = $this->query($sql);

		
		if(empty($data['Module']['parent_id'])){
		   $data['Module']['id'] = $_data[0][0]['id'];
		}else{
		   $data['Module']['id'] = $data['Module']['parent_id']. str_pad($_data[0][0]['cnt'], 2 , "0", STR_PAD_LEFT);
		}
		
		//$this->id = $data['Module']['parent_id'];
		//$data['Module']['hierarchy'] = $this->field('hierarchy') + 1;
		//$data['Module']['parent_id'] = $this->field('id');
		
		
		//$this->query('update modules set node = 1 where id ='.$data['Module']['parent_id']);
		
	    return $this->save($data);
    }

    function subject(){
        $subject = '';
        $modules = $this->find('all', array('conditions' => "Module.parent_id is NULL AND Module.type = 'subject'"));
        foreach($modules as $m){
            $subject .= "<div><span><a herf='javascirpt:void(0)' onClick='window.location=\"/app/teaching/".$m['Module']['id']. "/" . $m['Module']['name'] ."\"'>".$m['Module']['name']."</a></span>";
            $subject .= '  <div style="width:80px;">';
            if(0 == $m['Module']['node']){
                $subject .= "    <div><a href='/app/entry/".$m['Module']['id']. "01/教研信息'>教研信息</a></div>";
				$subject .= "    <div><a href='/app/entry/".$m['Module']['id']. "02/资料库'>资料库</a></div>";
				$subject .= "    <div><a href='/app/entry/".$m['Module']['id']. "03/网上教研'>网上教研</a></div>";
            }else{
                $trees = $this->children($m['Module']['id'], true);
                foreach($trees as $t){
                    $subject .= "<div><span><a herf='javascirpt:void(0)' onClick='window.location=\"/app/teaching/".$t['Module']['id']. "/" . $t['Module']['name'] ."\"'>".$t['Module']['name']."</a></span>";
                    $subject .= '  <div style="width:80px;">';
					$subject .= "    <div><a href='/app/entry/".$t['Module']['id']. "01/教研信息'>教研信息</a></div>";
					$subject .= "    <div><a href='/app/entry/".$t['Module']['id']. "02/资料库'>资料库</a></div>";
					$subject .= "    <div><a href='/app/entry/".$t['Module']['id']. "03/网上教研'>网上教研</a></div>";					
                    $subject .= '  </div>';
                    $subject .= '</div>';
                }
            }
            $subject .= '  </div>';
            $subject .= '</div>';
        }
        return $subject;
    }
	
	function outlook(){
	    
	    $outlook  = '	     var _menus = {"menus":[' ."\n";
		
		$modules = $this->find('all', array('conditions' => "Module.parent_id is NULL AND (Module.type = 'system' OR Module.type = 'website') ORDER BY Module.lft"));
		
		$_i = sizeof($modules) - 1;
		
		foreach($modules as $i=>$m){
		    $outlook .= '						';
			$outlook .= ' {"menuid":"'. $m['Module']['id'] .'","icon":"'.$m['Module']['module_image'].'","menuname":"'.$m['Module']['name'].'",'."\n";
			
			$outlook .= '							';
			$outlook .= ' "menus":['."\n";
			
			$trees = $this->children($m['Module']['id'], true);
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
