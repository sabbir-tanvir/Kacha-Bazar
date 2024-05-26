<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="reg.css">
</head>
<body>
    <section class="admin">
        <h1>Create Account</h1>
        <div class="admin-input">
            <!-- Added form element with method and action -->
            <form method="post" action="register.php">
                <div class="username">
                    <input type="text" name="u_name" placeholder="Username" required>
                </div>
                
                <div class="password">
                    <input type="password" name="u_pass"  placeholder="Password" required>
                </div>
                <div class="number">
                    <input type="number" name="p_num" placeholder="Phone Number" required>
                </div>
                <div class="email">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="location">
                    <input type="text" name="location" placeholder="Location" required>
                </div>
                <br>
                <div>
                    <button type="submit" name="submit" class="button-89">Submit</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
