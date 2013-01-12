<?

class user extends kcol {

  protected $_types = [
    'created' => 'date'
  ];

  protected $_ols = [
    'created_readable',
    'created_diff'
  ];

  public function __get($name) {

    switch ($name) {

      case 'created_readable' :
        return date('Y-m-d h:i:s', parent::__get('created')->sec);
        break;


      case 'created_diff' :
        return clock::duration(parent::__get('created')->sec);
        break;

    }

    return parent::__get($name);

  }

}
