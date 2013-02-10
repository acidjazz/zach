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

    $temp = tmpfile();
    $file = tempnam(sys_get_temp_dir(), 'json_');
    $handle = fopen($file, 'w');
    fwrite($handle, $json);
    fclose($handle);

    $cmd = "jade -p ".$path.$template." -P --obj '$file' < ".$path.$template;

    $test = exec($cmd, $results, $code);
    $output = join("\r\n", $results);

    if ($code > 0) {
      exec($cmd.' 2>&1', $results, $code);
      unlink($file);

      if (defined('KDEBUG_HANDLER') && KDEBUG_HANDLER == true) {

        if (preg_match('/(.*)Error: (.*)\:(.*)/i', $results[4], $matches)) {
          foreach ($results as $key=>$value) {
            if ($value == '') {
              $errormessage = $results[$key+1];
            }
          }
          kdebug::handler(E_ERROR, '<b>JADE</b>: '.$errormessage, $matches[2], $matches[3]);
        } else {
          trigger_error("Jade compilation error: <pre>".join("\n", $results)."</pre>");
        }

      } else {
        trigger_error("Jade compilation error: <pre>".join("\n", $results)."</pre>");
      }

      return false;

    }

    if ($return) {
      unlink($file);
      return $output;
    }

    unlink($file);
    echo $output;

  }

}
