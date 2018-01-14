<?php // Create a customer using a Stripe token

// If you're using Composer, use Composer's autoload:
require_once('vendor/autoload.php');

// Be sure to replace this with your actual test API key
// (switch to the live key later)
\Stripe\Stripe::setApiKey("pk_live_i6rCk9nSrnKPhsuw3La8ajgV");

try
{
  $customer = \Stripe\Customer::create(array(
    'email' => $_POST['stripeEmail'],
    'source'  => $_POST['stripeToken'],
    'plan' => 'basic-mo'
  ));

  header('Location: thankyou.html');
  exit;
}
catch(Exception $e)
{
  header('Location:oops.html');
  error_log("unable to sign up customer:" . $_POST['stripeEmail'].
    ", error:" . $e->getMessage());
}