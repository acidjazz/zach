<?

class index_ctl {

  public function index() {

    global $fb;

    $data = $fb->data();
    if (isset($data['strip'])) {
      $strip = $data['strip'];
    }
    require_once 'tpl/home.php';
  }

}
