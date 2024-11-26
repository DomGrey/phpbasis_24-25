<?php

// print '<pre>';
// print_r($_POST);
// print '</pre>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulieren</title>
</head>

<body>
    <main>
        <section>
            <header>
                <h1>Subscribe</h1>
            </header>
            <p>Register using the form below!</p>
            <form action="index.php" methode="">
                <label for="firstname">Firstname:</label>
                <input type="text" name="firstname" id="firstname" placeholder="type your firstname" />

                <label for="lastname">Lastname:</label>
                <input type="text" name="lastname" id="lastname" placeholder="type your lastname" />

                <label for="lastname">E-mailadress:</label>
                <input type="text" name="email" id="email" placeholder="type your email" />

                <label for="lastname">Geslacht:</label>
                <input type="radio" name="gender" id="gender" value="male" /><label for="genderMale">Man</label><br />
                <input type="radio" name="gender" id="gender" value="female" /><label for="genderFemale">Female</label><br />
                <input type="radio" name="gender" id="gender" value="X" /><label for="genderX">X</label><br />
                <label for="cars">Choose your ride:</label>
                <select name="cars" id="cars">
                    <option>Select</option>
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                </select>

                <label for="Message">Your message:</label>
                <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
                <input type="submit" name="submit" id="submit" value="send">

            </form>
        </section>
    </main>
</body>
</body>

</html>