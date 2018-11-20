    <body>
        <header>
            <a href="index.php"><img id="logo" alt="Spark logo" src="img/logo.jpg"></a>
            <div class="top_header">
                <form action="resultado_busqueda.php" method="GET">
                    <!-- Busqueda -->
                    <input type="text" name="busqueda_top" placeholder="Search..." autofocus>
                    <button type="submit" id="busqueda">Busqueda</button>
                    <a href="formulario_busqueda.php">Avanzada</a>
                </form>
                <div id="user_status">
                    <!-- Botones segun estado sesion usuario -->

                    <?php echo '<a href="mi_perfil.php">'.$_SESSION["user"].'</a>'; ?>
                    <a href="cerrar_sesion.php">Salir</a>
                </div>
            </div>
        </header>
