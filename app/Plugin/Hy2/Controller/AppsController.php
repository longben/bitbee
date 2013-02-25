<?php
App::uses('Hy2AppController', 'Hy2.Controller');

/**
 * App Controller
 *
 */
class AppsController extends Hy2AppController {


    public $uses = array('Post', 'User', 'Attachment', 'Guestbook', 'Code', 'Hy.Product');

    //跳转
    public function sw(){
        $locale = Configure::read('Config.language');
        switch ( $locale ) {
        case 'zh-cn':
            $this->redirect('/zh');
            break;
        case 'zh-TW':
            $this->redirect('/zh');
            break;
        case 'eng':
            $this->redirect('/en');
            break;
        }
    }  

    //首页
    public function index() {
        $this->layout = "website";

        
        $this->set('title_for_layout', '歡迎您！');

        //大图轮换(201)
        $covers = $this->Attachment->find('all', array('conditions' => array('Attachment.type_id' => 201), 'limit' => 6));
        $this->set('covers', $covers);

        //产品特性(202)
        $conditions = array(
            'conditions' => 'Meta.category = 202', 
            'recursive' => 0, //int
            'order' => 'Meta.elite, Post.post_date desc',
            'limit' => 6
        );
        $this->set('features', $this->Post->find('all', $conditions));

        //新闻资讯(203)
        $conditions = array(
            'conditions' => 'Meta.category IN (501,502)', 
            'recursive' => 0, //int
            'order' => 'Post.post_date desc',
            'limit' => 4
        );
        $this->set('news', $this->Post->find('all', $conditions));

    }


    //产品
    public function product($code_id = 1) {
        $this->layout = "website";

        $this->set('title_for_layout', '產品展示');

        $conditions = array(
            'conditions' => array('Code.locale' => 'zh'), 
            'recursive' => 0, //int
            'order' => 'Code.id asc',
        );
        $this->set('codes', $this->Code->find('all', $conditions));

        $this->set('code_id', $code_id);


        $conditions = array(
            'conditions' => array('Product.code_id' => $code_id), 
            'recursive' => 0, //int
            'order' => 'Product.id asc',
        );
        $this->set('products', $this->Product->find('all', $conditions));

    }

    //产品详情
    public function product_detail($id) {
        $this->layout = "website";


        $product = $this->Product->read(null, $id);
        $this->set('product', $product);

        $conditions = array(
            'conditions' => array('Code.locale' => $product['Product']['locale']), 
            'recursive' => 0, //int
            'order' => 'Code.id asc',
        );
        $this->set('codes', $this->Code->find('all', $conditions));

        $this->set('title_for_layout', $product['Product']['name']);

    }



    //关于H&Y
    public function about() {
        $this->layout = "website";

        $this->set('title_for_layout', '公司概况');

    }

    //商業合作
    public function cooperation(){

        $this->layout = "website";

        $this->set('title_for_layout', '商業合作');

    }

    //新闻中心
    public function news($id = 501) {
        $this->layout = "website";

        $this->set('title_for_layout', '新聞中心');

        $info = array('501' => '公司新聞', '502' => '行業動態');
        $this->set('page', $id);

        $this->_posts($id);
    }

    //客户中心
    public function service($page = 601) {
        $this->layout = "website";

        $this->set('title_for_layout', '客服中心');

        $info = array('601' => '在線咨訊', '602' => '代理商加盟', '603' => '銷售網絡', '604' => '信息反饋');
        $this->set('page', $page);

        $this->set('title_for_content', $info[$page]);

        if($page == 604){
            $this->paginate = array(
                'conditions' => array('Guestbook.flag' => 1, 'Guestbook.type_id' => 1), 
                'recursive' => 0, //int
                'order' => 'Guestbook.created desc',
                'limit' => 11
            );
            $this->set('guestbooks', $this->paginate('Guestbook'));
        }
    }


	public function add_guestbook($type_id = 1) {
        if (!empty($this->data)) {
            $_msg = '';
            $_url = '';
            switch ($type_id) {
            case 1:
                $_msg = '您的信息反饋已經提交！';
                $_url = '/zh/service/604';
                break;
            case 2:
                $_msg = '您的试听申请已提交，我们将在1-2个工作日内联系您！';
                $_url = '/app/main';
                break;
             case 3:
                $_msg = '您的加盟申请已提交，我们将在1-2个工作日内联系您！';
                $_url = '/app/joinus';
                break;
            }
            $this->Guestbook->create();
            if ($this->Guestbook->save($this->request->data)) {
                $this->Session->setFlash($_msg, true);
                $this->redirect($_url);
            } else {
                $this->Session->setFlash(__('保存失败！', true));
            }
        }
    }


    //专业知识
    public function knowledge($id = 701) {
        $this->layout = "website";
        $this->set('title_for_layout', '專業知識');

        $info = array('701' => '濾鏡百科全書', '702' => '濾鏡使用展示', '703' => '精品對比圖');
        $this->set('page', $id);

        $this->_posts($id);

        if(702 == $id){
            //滤镜使用展示(702)
            $covers = $this->Attachment->find('all', array('conditions' => array('Attachment.type_id' => 702), 'limit' => 12));
            $this->set('covers', $covers);
        }

    }

    //联系我们
    public function contact_us() {
        $this->layout = "website";
        $this->set('title_for_layout', '聯繫我們');
    }

    //新闻内容页面
    public function content($id) {
        $this->layout = "website";


        $post = $this->Post->read(null, $id);

        $this->set('title_for_layout', $post['Post']['post_title']);
        $this->set('post', $post);		
    }


}
