<?

class index_ctl {

  public function index() {

    $_SESSION['test'] = 'ing';
    $_GET['other'] = [1,2,3,4 => [4,5,6]];


    jade::c('index'); 

  }

}
