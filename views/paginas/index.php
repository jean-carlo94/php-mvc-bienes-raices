<main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <?php include "iconos.php"; ?>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Departamentos en Venta</h2>
        <!-- ANUNCIOS -->
        <?php
            $limite = 3;
            include 'listado.php';
        ?>
        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario dde contacto y un asesor se pondrá en contacto con tigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contáctenos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="public/img/blog1.webp" type="image/webp">
                        <source srcset="public/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="public/img/blog1.jpg" alt="Texto entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para terraza</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>

                        <p>
                            Consejos para construis una terraza en el techo de tu casa con lo mejores materiales y ahorrando dinero
                        </p>
                    </a>
                </div>

            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="public/img/blog2.webp" type="image/webp">
                        <source srcset="public/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="public/img/blog2.jpg" alt="Texto entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoración en tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>

                        <p>
                            Consejos para construis una terraza en el techo de tu casa con lo mejores materiales y ahorrando dinero
                        </p>
                    </a>    
                </div>

            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque molestiae quod a modi eveniet, ducimus aspernatur, qui illum odio tempore quam numquam. Veniam, placeat rem mollitia autem neque fuga tempore!
                </blockquote>
                <p>Jean Carlo</p>
            </div>
        </section>
    </div>