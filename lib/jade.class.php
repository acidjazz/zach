<?

class jade {

  public static $templatedir = 'tpl/';

  public static function c($template, $array=array(), $return=false) {

    $path = G_PATH.self::$templatedir;

    $constants = get_defined_constants(true);
    $array['_C'] = $constants['user'];
    $json = json_encode($array);

    if (!is_file($path.$template)) {
      $template = $template.'.jade';
    }

    if (!is_file($path.$template)) {
      trigger_error('Template not found: "'.$template.'"');
    }

    $cmd = "jade -p ".$path.$template." -P -o '$json' < ".$path.$template;

    $test = exec($cmd, $results, $code);
    $output = join("\r\n", $results);

    if ($code > 0) {
      exec($cmd.' 2>&1', $results, $code);
      trigger_error("Jade compilation error: <pre>".join("\n", $results)."</pre>");
      return false;
    }

    if ($return) {
      return $output;
    }

    echo $output;

  }

}
