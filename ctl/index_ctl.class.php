<?

class index_ctl {

  public function index() {

    global $fb;

    $users = array();
    foreach (user::find() as $user) {
      $users[] = (new user($user))->data();
    }

    jade::c('index', ['users' => $users]); 

  }

}
