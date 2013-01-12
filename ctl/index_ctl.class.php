<?

class index_ctl {

  public function index() {

    global $fb;

    jade::c('index', array('options' => range(1, 500))); 

  }

}
