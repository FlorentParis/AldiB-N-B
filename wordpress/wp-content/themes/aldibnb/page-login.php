<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <div class="card-group">
        <?php while (have_posts()) : ?>

            <?php the_post(); ?>

            <div>
                <h2 class="card-title"><?php the_title(); ?></h2>

                <!-- formulaire de connexion avec redirection a la page contenant les articles -->
                <h3>Sign in</h3>
                <form action="<?= home_url('wp-login.php');?>" method="post">
                    <div class="mb-3">
                        <label for="InputEmail1" class="form-label">Email or Username</label>
                        <input type="text" class="form-control" id="InputEmail1" aria-describedby="emailHelp" name="log">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="InputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="InputPassword1" name="pwd">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="Check1" name="rememberme">
                        <label class="form-check-label" for="Check1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="">Submit</button>
                    <input type="hidden" name="redirect_to" value="http://localhost:5555/">
                </form>

                <!-- creer utilisateur -->
                <h3>Sign up</h3>
                <form method="post" action ="http://localhost:5555/wp-admin/admin-post.php"  enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="InputEmail2" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="InputEmail2" aria-describedby="emailHelp" name="log">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="InputPassword2" class="form-label">Password</label>
                        <input type="password" class="form-control" id="InputPassword2" name="pwd">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="manager" name="manager">
                        <label class="form-check-label" for="manager">Modérateur</label>
                    </div>

                    <input type="hidden" name="action" value="insert_user">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        <?php endwhile; ?>
    </div>

<?php endif; ?>

<?php get_footer(); ?>