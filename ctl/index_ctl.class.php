<?

class index_ctl {

  public function index() {

    global $fb;

    $_SESSION['test'] = 'ing';
    $_GET['other'] = 'test';

    jade::c('index'); 

  }

}
