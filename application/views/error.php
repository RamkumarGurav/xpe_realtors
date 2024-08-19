<style>
  .error-section {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
  }

  .error-card {
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    padding: 30px;
    border-radius: 8px;
    text-align: center;
    max-width: 500px;
    width: 100%;
  }

  .error-card h1 {
    color: #dc3545;
  }

  .error-card p {
    margin: 20px 0;
    color: #6c757d;
  }

  .error-card a {
    text-decoration: none;
    color: #ffffff;
    background-color: #dc3545;
    padding: 10px 20px;
    border-radius: 4px;
  }

  .error-card a:hover {
    background-color: #c82333;
  }
</style>
<div class="error-section">
  <div class="error-card">
    <h1>Error Occurred</h1>
    <p>Something went wrong. Please try again later.</p>
    <a href="<?= MAINSITE ?>">Go to Home</a>
  </div>
</div>