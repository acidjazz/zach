<?

// initiate facebook
$fb = new fb();

// create or grab the user
if($fb->added() && !($user = user::findOne(array('user_id' => $fb->uid()))) ) {
  $user = new user();
  $user->created = time();
  $user->user_id = $fb->uid();
  $user->me = $fb->api('/me');
  $user->save(); 
} elseif ($fb->added()) {
  $user = new user($user);
}

