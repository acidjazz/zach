<?

require_once 'ajax.php';
$json = array();

foreach ($_FILES as $name=>$data) {

  $upload = new upload();
  $grid = upload::grid();

  if (empty($data['tmp_name'])) {
    return true;
  }

  $file = file_get_contents($data['tmp_name']);
  $info = pathinfo($data['name']);
  $im = imagecreatefromstring($file);

  $width = 730;
  $height = 700;
  $o_width = imagesx($im);
  $o_height = imagesy($im);
  $resize = false;

  $ratio_orig = $o_width/$o_height;

  if ($o_width > $width || $o_height > $height) {

    $resize = true;

    if ($width/$height > $ratio_orig) {
      $width = $height*$ratio_orig;
    } else {
      $height = $width/$ratio_orig;
    }

    $nimg = imagecreatetruecolor($width, $height);
    imagecopyresampled($nimg, $im, 0, 0, 0, 0, $width, $height, $o_width, $o_height);

  }

  if ($resize == true) {

    ob_start();
    imagepng($nimg);
    $file = ob_get_contents();
    ob_end_clean();

    $upload->ext = '.png';
    $upload->width = $width;
    $upload->height = $height;

  } else {

    $upload->ext = '.'.$info['extension'];
    $upload->width = imagesx($im);
    $upload->height = imagesy($im);

  }

  $upload->file = $grid->storeBytes($file);
  $upload->size = strlen($upload->file);

  $upload->save();
  $json[] = array(
    'id' => $upload->file->{'$id'},
    'path' => G_URL.'img/uploads/'.$upload->file.$upload->ext,
    'width' => $upload->width,
    'height' => $upload->height
  );

}

echo json_encode(array( 'success' => true, 'files' => $json));


?>
