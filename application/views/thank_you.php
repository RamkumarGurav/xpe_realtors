<?php
if (!empty($_SESSION['is_thank_you_page']) && $_SESSION['is_thank_you_page'] == 1) {
  $_SESSION['is_thank_you_page'] = 0;
  unset($_SESSION['is_thank_you_page']);
} else {
  $mainsite = MAINSITE;
  echo "<script>location.href='{$mainsite}'</script>";
  die();
}

?>

<style>
  .thank-you-section {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
  }

  .thank-you-card {
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    padding: 30px;
    border-radius: 8px;
    text-align: center;
    max-width: 500px;
    width: 100%;
  }

  .thank-you-card h1 {
    color: green;
  }

  .thank-you-card p {
    margin: 20px 0;
    color: #6c757d;
  }

  /* .thank-you-card a {
    text-decoration: none;
    color: #ffffff;
    background-color: #0069d9;
    padding: 10px 20px;
    border-radius: 4px;
  }

  .thank-you-card a:hover {
    background-color: #0056b3;
  } */
</style>

<div class="thank-you-section">
  <div class="thank-you-card">
    <h1>Thank You!</h1>
    <p>Thank you for your enquiry. We have received your message and will get back to you shortly.</p>
    <a class="thm-btn" href="<?= MAINSITE ?>">Go to Home</a>
  </div>
</div>