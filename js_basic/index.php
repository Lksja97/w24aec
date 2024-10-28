
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Mein Profil</title>
    <link rel="stylesheet" href="styles.css">
    <script src="js.js"></script>
</head>
<body>
    <header>
        <h1>Willkommen auf meiner Profilseite</h1>
        <nav>
            <a href="#about">Über mich</a>
            <a href="#projects">Projekte</a>
            <a href="#contact">Kontakt</a>
        </nav>
    </header>
    <!-- comment-->
    <section id="about">
        <h2>Über mich</h2>
        <p>Ich bin ein Webentwickler und lerne HTML und CSS.</p>
    </section>

    <section>
        <label>first number</label>
        <input  id="first_number" type="number" >
        <label>second number</label>
        <input  id="second_number" type="number" >
        <br><br>
        <button onclick="my_add()">add</button>
        <button onclick="my_minus()">minus</button>
        <button onclick="my_multiple()">multiple</button>
        <button onclick="my_divide()">divide</button>
        <br>
    </section>

    <section id="projects">
        <h2 >Projekte Header</h2>
        <div class="project">
            <h3>Projekt 1</h3>
            <p>Beschreibung des Projekts.</p>
            <a href="google.com">googli </a>
        </div>
        <div class="project">
            <h3>Projekt 2</h3>
            <p>Beschreibung des Projekts.</p>
            <button>ohne funktionalität</button>
        </div>
    </section>

    <footer>
        <p>Kontakt: <a  href="mailto:example@example.com">example@example.com</a>
            <a  href="mailto:example@example.com">rrrrrrr@example.com</a>
        </p>
    </footer>

</body>
</html>
