<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'db_connect.php';
    $email = trim($_POST['email']);
    
    // Check if email exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        echo "Check your email to reset your password.";
    } else {
        echo "Email not found!";
    }
}
?>

<form method="POST" style="max-width: 400px; margin: 30px auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); background-color: #fafafa; font-family: Arial, sans-serif;">
    <h2 style="text-align: center; margin-bottom: 20px;">Reset Password</h2>

    <label for="email" style="font-weight: bold; margin-bottom: 5px; display: block;">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required
           style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 20px; font-size: 14px;">

    <button type="submit"
            style="width: 100%; padding: 12px; border: none; border-radius: 5px; background-color: #007BFF; color: white; font-weight: bold; cursor: pointer; transition: 0.3s;">
        Reset Password
    </button>

    <p style="text-align: center; margin-top: 15px;">
        <a href="index.php" style="text-decoration: none; color: #007BFF;">Back to Login</a>
    </p>
</form>

<script>
    // Button hover effect
    const btn = document.querySelector("button[type='submit']");
    btn.addEventListener("mouseover", () => btn.style.backgroundColor = "#0056b3");
    btn.addEventListener("mouseout", () => btn.style.backgroundColor = "#007BFF");
</script>

