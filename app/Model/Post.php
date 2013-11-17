<?php
class Post extends AppModel {

	var $name = 'Post';

	var $hasOne = array(
			'Meta' => array('className' => 'PostMeta',
								'foreignKey' => 'id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

	var $belongsTo = array(
			'User' => array('className' => 'User',
								'foreignKey' => 'post_author',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

	var $hasAndBelongsToMany = array(
			'Module' => array('className' => 'Module',
						'joinTable' => 'posts_modules',
						'foreignKey' => 'post_id',
						'associationForeignKey' => 'module_id',
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

	var $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'post_id',
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
	);

	function afterSave($created, $options = Array()){
		App::import('Vendor', '/utils/file');

		$post_id = $this->getLastInsertID();

		if ($post_id && !empty($this->data['Post']['post_content'])){

			$this->Meta->create();
			$data['Meta']['id'] = $post_id;
			//$data['Meta']['category'] = $this->data['']['category'];
			if(!empty($this->data['Meta']['author'])) {
				$data['Meta']['author'] = $this->data['Meta']['author'];
			}
			if(!empty($this->data['Post']['type'])) {
				$data['Meta']['type'] = $this->data['Post']['type'];
            }
			if(!empty($this->data['Post']['tag'])) {
				//$data['Meta']['tag'] = $this->data['Post']['tag'];
            }
        /*

			$reg = "/<img[^>]+src=(['\"])(.+)\\1/isU"; //过滤规则
			preg_match_all($reg, $this->data['Post']['post_content'], $matches);
            foreach($matches[2] as $i => $filename){
                if(0 == $i){
                    $data['Meta']['picture'] = $filename;
                }
				$this->create();
				$data_file['Post']['post_title'] = $filename;
				$data_file['Post']['post_parent'] = $post_id;
				$data_file['Post']['post_status'] = 'inherit';
				$data_file['Post']['post_type'] = 'attachment';
				$data_file['Post']['post_mime_type'] = getFileMime(getFileExtension($filename));
				$this->save($data_file);
            }
         */

            $this->Meta->save($data);

		}
	}

	//查询文章
	function findPostByModule($id, $type, $limit = 30) {
		switch($type) {
		case 'single':
			$sql = "select Post.*
					 from posts as Post, modules as Module, posts_modules as PM
					   where Post.id = PM.post_id and Post.elite = 1 and Post.post_type = 'post'
					     and Module.id = PM.module_id and Module.parent_id in($id)
						   order by Post.post_date desc";
			break;
		case 'list':
			$sql = "select Post.*
					 from posts as Post, modules as Module, posts_modules as PM
					   where Post.id = PM.post_id and Post.post_type = 'post'
					     and Module.id = PM.module_id and Module.parent_id in($id)
					       order by Post.post_date desc
						     limit 0,$limit";
			break;
		case 'parents':
			$sql = "select Post.*
					 from posts as Post, modules as Module, posts_modules as PM
					   where Post.id = PM.post_id and Post.post_type = 'post'
					     and Module.id = PM.module_id and Module.parent_id in($id)
					       order by Post.post_date desc
						     limit 0,$limit";
			break;
		case 'third':
			$sql = "select Post.*
					 from posts as Post, modules as Module, posts_modules as PM
					   where Post.id = PM.post_id and Post.post_type = 'post' and Module.id = PM.module_id and Module.id = $id
					     order by Post.post_date desc
							limit 0,$limit";
			break;
		}
		return $this->query($sql);
	}

	//查询图片
	function findPictureByModule($id, $type, $limit = 7) {
		switch($type) {
		case 'single':
			$sql = "select Post.id, Post.post_title, Parent.post_title
					 from posts as Post, modules as Module, posts as Parent, posts_modules as PM
					   where Parent.id = PM.post_id and Post.post_parent = Parent.id
					     and Parent.post_status = 'publish'
					     and (Post.post_mime_type = 'image/jpeg' or Post.post_mime_type = 'image/gif')
					       and Module.id = PM.module_id and Module.parent_id in($id)
						     order by Post.post_date desc limit 0,$limit";
			break;
		case 'list':
			$sql = "select Post.id, Post.post_title, Parent.post_title
					 from posts as Post, modules as Module, posts as Parent, posts_modules as PM
					   where Parent.id = PM.post_id and Post.post_parent = Parent.id
					     and Parent.post_status = 'publish'
					     and (Post.post_mime_type = 'image/jpeg' or Post.post_mime_type = 'image/gif')
					       and Module.id = PM.module_id and Module.parent_id in($id)
						     order by Post.post_date desc limit 0,$limit";
			break;
		case 'third':
			$sql = "select Post.id, Post.post_title, Parent.post_title
					 from posts as Post, modules as Module, posts as Parent, posts_modules as PM
					   where Parent.id = PM.post_id and Post.post_parent = Parent.id
					     and Parent.post_status = 'publish'
					     and (Post.post_mime_type = 'image/jpeg' or Post.post_mime_type = 'image/gif')
					       and Module.id = PM.module_id and Module.id in($id)
						     order by Post.post_date desc limit 0,$limit";
			break;
		}
		return $this->query($sql);
	}

}
?>
