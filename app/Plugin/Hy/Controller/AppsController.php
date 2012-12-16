<?php
App::uses('HyAppController', 'Hy.Controller');

/**
 * App Controller
 *
 */
class AppsController extends HyAppController {


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



    //公司概况
    public function about($page = 301) {
        $_info = array('301' => '公司簡介', '302' => '企業文化', '303' => '榮譽資質');
        $this->layout = "website";

        $this->set('title_for_layout', '公司概况');
        $this->set('title_for_content', $_info[$page]);

        $this->set('page', $page);

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

        $info = array('601' => '在線咨訊', '602' => '代理商加盟', '603' => '銷售網絡');
        $this->set('page', $page);

        $this->set('title_for_content', $info[$page]);

    }

    //专业知识
    public function knowledge($id = 701) {
        $this->layout = "website";
        $this->set('title_for_layout', '專業知識');

        $info = array('701' => '濾鏡百科全書', '702' => '濾鏡使用展示', '703' => '精品對比圖');
        $this->set('page', $id);

        $this->_posts($id);

    }

    //联系我们
    public function contact() {
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
